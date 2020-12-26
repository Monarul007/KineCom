<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\ProductImage;
use App\Company;
use App\Manufacturer;
use App\Category;
use App\Filter;
use App\Seller;
use Image;
use Auth;

class PosBankController extends Controller
{
    
    public function get_bank(Request $req){
        
        $s_text = $req['s_text'];
        
        $get_bank = DB::table('bank_info')->where('name', 'like', '%'.$s_text.'%')->limit(9)->get(); ?>
        
        <ul class='bank-list sugg-list'>
        
        <?php $i = 1;
        
        foreach($get_bank as $row){
            
            $id = $row->id;
            
            $name = $row->name;
            
            $i = $i + 1; ?>
            
            <li tabindex='<?php echo $i; ?>' onclick='selectBank("<?php echo $id; ?>", "<?php echo $name; ?>");' data-id='<?php echo $id; ?>' data-name='<?php echo $name; ?>'><?php echo $name; ?></li>
            
        <?php } ?>
        
        </ul>
        
        <?php 
    }
    
    public function get_bank_account(Request $req){
        
        $s_text = $req['s_text'];
        $bank_id = $req['bank_id'];
        
        $get_bank_acc = DB::table('bank_acc')->where('acc_name', 'like', '%'.$s_text.'%')->where('bank_id', $bank_id)->limit(9)->get(); ?>
        
        <ul class='bank-acc-list sugg-list'>
        
        <?php $i = 1;
        
        foreach($get_bank_acc as $row){
            
            $id = $row->id;
            
            $acc_name = $row->acc_name;
            
            $i = $i + 1; ?>
            
            <li tabindex='<?php echo $i; ?>' onclick='selectAccount("<?php echo $id; ?>","<?php echo $acc_name; ?>");' data-id='<?php echo $id; ?>' data-name='<?php echo $acc_name; ?>'><?php echo $acc_name; ?></li>
            
        <?php } ?>
        
        </ul>
        
        <?php 
    }
    
    public function check_clearance(){
        
        return view('admin.pos.banking.check_clearance');
    }

    public function get_check_clearance(Request $req){
        
        $stdate = $req['stdate'];
        $enddate = $req['enddate'];
        $check_type = $req['check_type'];
        
        $trow = "";
        
        if($check_type == "collection"){
            
            $bank_transactions = DB::table('bank_transactions')->select("bank_transactions.id as transid", "bank_transactions.date as date", "bank_transactions.invoice_no as invoice", "customers.name as name", "customers.address as add", "customers.phone as phone",
            "bank_transactions.clients_bank as bank", "bank_transactions.clients_bank_acc", "bank_transactions.check_no", "bank_transactions.deposit")
            ->join('customers', 'bank_transactions.cid', 'customers.id')->where('bank_transactions.deposit', '>', '0')
            ->where('bank_transactions.status', 'pending')
            ->whereBetween('date', [$stdate, $enddate])
            ->get();
            
            foreach($bank_transactions as $row){
                
                $trow .= "<tr data-transid = '$row->transid'><td>".$row->date."</td><td>".$row->invoice."</td><td>".$row->name."</td><td>".$row->add."<br>".$row->phone."</td><td>".$row->bank."</td><td>".$row->clients_bank_acc."</td>
                <td>".$row->check_no."</td><td>".$row->deposit."</td><td><a title='Clear' href='#' class='clear'><span class='btn btn-xs btn-primary'><i class='mdi mdi-check'></i></span></a></td></tr>";
            }
            
            return $trow;
        }
    }
    
        
    public function save_check_clearance(Request $req){
        
        $transid = $req['transid'];
        $check_type = $req['check_type'];
        
        $transactions = DB::table('bank_transactions')->where('id', $transid)->first();
        
        $invoice = $transactions->invoice_no;
        $bank_id = $transactions->seller_bank_id;
        $bank_acc_id = $transactions->seller_bank_acc_id;
        $cid = $transactions->cid;
        $amount = $transactions->deposit;
        
        if($check_type == "collection"){
            
                if($bank_id > 0 && $bank_acc_id > 0){
                    
                    $get_bank = DB::table('bank_info')->where('id', $bank_id)->first();
                    
                    $bank_name = $get_bank->name;
                    
                    $get_bank_acc = DB::table('bank_acc')->where('id', $bank_acc_id)->first();
                    
                    $bank_account = $get_bank_acc->acc_name;
                    
                    $debit_head = $bank_name." A/C: ".$bank_account;
                    
                }else{
                    
                    $debit_head = "Cash in Hand";
                }
                
                $get_customer = DB::table('customers')->where('id', $cid)->first();
                
                $cust_name = $get_customer->name;
                $cust_phone = $get_customer->phone;
                
                $vno = (DB::table('acc_transactions')->max('id') + 1);
                
                $head = $debit_head;
                $description = "Check for Invoice ".$invoice;
                $debit = $transactions->deposit;
                $credit = 0;
            
                DB::table('acc_transactions')->insert([
                    
                    'vno' => $vno,
                    'head' => $head,
                    'sort_by' => "cid"." ".$cid,
                    'description' => $description,
                    'debit' => $debit,
                    'credit' => $credit,
                    'date' => date('Y-m-d'),
                    'user' => Auth::id(),
                    
                ]);
                
                $head = $cust_name." ".$cust_phone;
                $description = "Cehck Collection For Invoice ".$invoice;
                $debit = 0;
                $credit = $amount;
            
                DB::table('acc_transactions')->insert([
                    
                    'vno' => $vno,
                    'head' => $head,
                    'sort_by' => "cid"." ".$cid,
                    'description' => $description,
                    'debit' => $debit,
                    'credit' => $credit,
                    'date' => date('Y-m-d'),
                    'user' => Auth::id(),
                    
                ]);
                
                
            DB::table('bank_transactions')->where('id', $transid)->update(['status' => 'paid']); 
         
        } 
    }
    
    public function bank_deposit(){
        
        $bank_info = DB::table('bank_info')->get();
        
        return view('admin.pos.banking.bank_deposit')->with('bank_info', $bank_info);
    }

    
    public function get_bank_acc(Request $req){
        
        $bank_id = $req['bank_id'];
        
        $options = "<option>Select Account</option>";
        
        $accounts = DB::table('bank_acc')->where('bank_id', $bank_id)->get();
        
        foreach($accounts as $row){
            
            $options .= "<option value='$row->id'>".$row->acc_name."</option>";
            
        }
        
         return $options;
    }
    
    public function get_bank_balance(Request $req){
        
        $account_id = $req['account_id'];
        
        $balance = DB::table('bank_transactions')->select(DB::raw('SUM(deposit) as todep'), DB::raw('SUM(withdraw) as towith'))->where('seller_bank_acc_id', $account_id)->first();
        
        $todep = $balance->todep;
        
        $towith = $balance->towith;
        
        return $balance = ($todep - $towith);
    }
    
    
    public function save_bank_deposit(Request $req){
        
        $bank_id = $req['bank_id'];
        $bank_name = $req['bank_name'];
        $account_id = $req['account_id'];
        $account_name = $req['account_name'];
        $balance = $req['balance'];
        $check_no = $req['check_no'];
        $amount = $req['amount'];
        $date = $req['date'];
        $remarks = $req['remarks'];
        $user = Auth::id();
        
        DB::table('bank_transactions')->insert([
            
            'seller_bank_id' => $bank_id,
            'seller_bank_acc_id' => $account_id,
            'check_no' => $check_no,
            'check_date' => $date,
            'date' => $date,
            'deposit' => $amount,
            'type' => 'cash',
            'remarks' => $remarks,
            'user' => $user,
        ]);
        
        $vno = (DB::table('acc_transactions')->max('id') + 1);
        
        $head = $bank_name." A/C: ".$account_name;
        $description = "Cash Deposit";
        $debit = $amount;
        $credit = 0;
        
        DB::table('acc_transactions')->insert([
            
            'vno' => $vno,
            'head' => $head,
            'description' => $description,
            'debit' => $debit,
            'credit' => $credit,
            'notes' => $remarks,
            'date' => $date,
            'user' => $user,
        ]);
        
        $head = "Cash in Hand";
        $description = "Deposited to ".$bank_name." A/C: ".$account_name;;
        $debit = 0;
        $credit = $amount;
        
        DB::table('acc_transactions')->insert([
            
            'vno' => $vno,
            'head' => $head,
            'description' => $description,
            'debit' => $debit,
            'credit' => $credit,
            'notes' => $remarks,
            'date' => $date,
            'user' => $user,
        ]);
    }
    
    public function bank_withdraw(){
        
        $bank_info = DB::table('bank_info')->get();
        
        return view('admin.pos.banking.bank_withdraw')->with('bank_info', $bank_info);
    }
    
    public function save_bank_withdraw(Request $req){
        
        $bank_id = $req['bank_id'];
        $bank_name = $req['bank_name'];
        $account_id = $req['account_id'];
        $account_name = $req['account_name'];
        $balance = $req['balance'];
        $check_no = $req['check_no'];
        $amount = $req['amount'];
        $date = $req['date'];
        $remarks = $req['remarks'];
        $user = Auth::id();
        
        DB::table('bank_transactions')->insert([
            
            'seller_bank_id' => $bank_id,
            'seller_bank_acc_id' => $account_id,
            'check_no' => $check_no,
            'check_date' => $date,
            'date' => $date,
            'withdraw' => $amount,
            'type' => 'cash',
            'remarks' => $remarks,
            'user' => $user,
        ]);
        
        $vno = (DB::table('acc_transactions')->max('id') + 1);
        
        $head = $bank_name." A/C: ".$account_name;
        $description = "Cash Withdrwan";
        $debit = 0;
        $credit = $amount;
        
        DB::table('acc_transactions')->insert([
            
            'vno' => $vno,
            'head' => $head,
            'description' => $description,
            'debit' => $debit,
            'credit' => $credit,
            'notes' => $remarks,
            'date' => $date,
            'user' => $user,
        ]);
        
        $head = "Cash in Hand";
        $description = "Withdrawn from ".$bank_name." A/C: ".$account_name;;
        $debit = $amount;
        $credit = 0;
        
        DB::table('acc_transactions')->insert([
            
            'vno' => $vno,
            'head' => $head,
            'description' => $description,
            'debit' => $debit,
            'credit' => $credit,
            'notes' => $remarks,
            'date' => $date,
            'user' => $user,
        ]);
    }
    
    public function bank_ledger(){
        
        $bank_info = DB::table('bank_info')->get();
        
        return view('admin.pos.banking.bank_ledger')->with('bank_info', $bank_info);
    }
    
    public function get_bank_ledger(Request $req){
        
        $stdate = $req['stdate'];
        $enddate = $req['enddate'];
        $bank_name = $req['bank_name'];
        $account_name = $req['account_name'];
        
        $head = $bank_name." A/C: ".$account_name;
        
        $accounts = DB::table('acc_transactions')->where('head', $head)->whereBetween('date', [$stdate, $enddate])->get();
        
        $trow = "";
        
        foreach($accounts as $row){
            $trow .= "<tr><td>".$row->date."</td><td>".$row->description."</td><td>".$row->debit."</td><td>".$row->credit."</td><td>".$row->notes."</td><td>Delete</td></tr>";
        }
        
        return $trow;
    }
    
}

