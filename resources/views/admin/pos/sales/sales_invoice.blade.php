
@extends('admin.pos.master')

@section('title','Sales Invoice')

@section('content')

<?php $user_name = Auth::user()->name;?>

<div class="main-panel">
    <div class="content-wrapper">
    <!-- Page Title Header Starts-->
        
                <h3>Sales Invocie</h3>
        
        <div class="box-body">
            <div class="row">
              <div class="col-12" style="position: relative;">
                 <form action="{{route('sales_invoice_save')}}" method="POST">
                     @csrf
                     <div class="card" style="min-height: 500px;">
                         
                         <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group" style="position: relative;">
                                                <input type="text" name="cust_phone" id="cust_phone" class="form-control" placeholder="Customer Phone" autocomplete="off">
                                                <div id="cust_div" style="width: 100%; display: none; position: absolute; top: 30px; left: 0; z-index: 999;"></div>
                                            
                                                <input type="hidden" name="cust_id" id="cust_id" value="0" class="form-control">
                                                
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group"  style="position: relative;">
                                                <input type="text" name="cust_name" id="cust_name" class="form-control" placeholder="Customer Name">
                                                <div id="memo_div" style="width: 100%; display: none; position: absolute; top: 45px; left: 0; z-index: 999;"></div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group"  style="position: relative;">
                                                <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode" autocomplete="off">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group" style="position: relative;">
                                                <input type="text" class="form-control" placeholder="Search Product" id="search" autocomplete="off">
                                                <div id="products_div" style="display: none; position: absolute; top: 30px; left: 0; width: 100%; z-index: 999;"></div>
                                                <input type="hidden" name="pid_hid" id="pid_hid">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <!-------------------------------->
                                    
                                    
                                    <div id="printdiv" style="margin:0 auto; font-family:Franklin Gothic Medium; ">
                					
                							
                						<table id="print_add" style="width: 332px; margin: 0px auto; padding: 10px; text-align:left; display:none;">
                							
                							<tr>
                							    <td style='width:70%;'>
                							
                        							<span id="company" style='font-size:42px'><?php echo "RR World Vision";?></span><br />
                        							
                        							<span style='font-size:16px' id="company_add"><?php echo "House-38, Road-6, Sector-13, Uttara, Dhaka, BANGLADESH"; ?></span><br />
                        					
                        							
                        							<span style='font-size:14px'><b>Contact: +88 01612 222 030, Contact: +88 01612 222 030</b></span>
                    							
                						        </td>
                						        
                						        <td id="logoimage" style='width:30%; text-align:right;'>
                						            
                						         <!--<img src='/images/logo_ccb.png' style='width:100px; height:auto;'>-->
                						            
                						        </td>
                						    </tr>
                						</table>
                						
                						
                						<table id="mid_section" style="width: 332px; font-size:16px; display:none;">
                						    
                						    <tr><td style="text-align:center; font-size:22px" colspan="2"><b>INVOICE / BILL</b></td></tr>
                						    
                						    <tr>
                						        <td id="cust_add" style="width: 50%; padding-left:10px;">
                            						
                        						</td>
                        						<td id="others_info" style="text-align: right;">
                            						
                        						</td>
                    						</tr>
                    						
                    					</table>
                						
                                        
                                        <div id="prodlistDiv" class="row" style="height:350px; overflow-y: auto; ">
                                            <div class="col-12" style="padding-right: 0 !important;">
                                                <table id="prodlist" class="price-table custom-table" style="">
                                                    <tr><th style="width: 30%">Item</th><th style="width: 20%">price</th><th style="width: 20%">Qty</th><th style="width: 20%">Total</th><th style="width: 10%">Delete</th></tr>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <table id="bottom_section" style="margin-top:40px; width: 94%; font-size:16px; display:none;">
                						    
                						    <tr>
                						        <td id="bottom_left" style="width:70%; padding-left:30px;">
                            						
                        						</td>
                        						<td id="bottom_right" style="width:30%;">
                            						
                        						</td>
                    						</tr>
                    						
                    					</table>
                                        
                                        <table id="footer_section" style="margin-top:40px; width: 94%; font-size:16px; display:none;">
                						    
                						    <tr>
                						        <td id="footer1" style="text-align:left; padding:20px;">
                            						
                        						</td>
                        					</tr>
                        					<tr>
                        						<td id="footer2" style="text-align:right; padding-top:80px;">
                            						<b>Authorized Signature & Company Stamp</b>
                        						</td>
                    						</tr>
                    						<tr>
                        						<td id="footer3" style="text-align:center; padding:20px;">
                            						Note: warranty voide if sticker removed item, burn case and physical damage of goods, warranty not cover mouse, keyboard, cable adopter and powe supply unit of casing.
                        						</td>
                    						</tr>
                    						
                    					</table>
                                        
                                    </div>
                                    
                                    
                                    <!--------------------------------->
                                    
                                    
                                </div>
                                
                                <div class="col-md-5">
                                    
                                    <div class="row">
                                        <div class="col-4">
                                          <div class="form-group">
                                            <input type="text" name="price" id="price" class="form-control" placeholder ="Price">
                                            
                                          </div>
                                        </div>
                                        <div class="col-4">
                                          <div class="form-group">
                                            <input type="text" name="qnt" id="qnt" class="form-control" placeholder ="Quantity">
                                            
                                          </div>
                                        </div>
                                        <div class="col-4">
                                          <div class="form-group">
                                            <input type="text" name="date" id="date" class="form-control" placeholder ="date" value="<?php echo date("Y-m-d");?>" style="padding: 0.94rem 0.5rem;">
                                            
                                          </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-6">
                                          <div class="form-group">
                                             <label>Amount</label>
                                             <input type="text" name="amount" id="amount" class="form-control" placeholder ="" value="0">
                                            
                                          </div>
                                        </div>
                                        
                                        <div class="col-6">
                                          <div class="form-group">
                                             <label>Total</label>
                                             <input type="text" name="total" id="total" class="form-control" placeholder =""  value="0">
                                             <input type="hidden" name="hid_total" id="hid_total" class="form-control" placeholder ="" value="0">
                                             
                                          </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-6">
                                          <div class="form-group">
                                             <label>Vat</label>
                                             <input type="text" name="vat" id="vat" class="form-control" placeholder ="" value="0">
                                            
                                          </div>
                                        </div>
                                        <div class="col-6">
                                          <div class="form-group">
                                             <label>S. Charge</label>
                                             <input type="text" name="scharge" id="scharge" class="form-control" placeholder ="" value="0">
                                            
                                          </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        
                                        <div class="col-6">
                                          <div class="form-group">
                                             <label>Discount</label>
                                             <input type="text" name="discount" id="discount" class="form-control" placeholder ="" value="0">
                                            
                                          </div>
                                        </div>
                                        <div class="col-6">
                                          <div class="form-group">
                                             <label>Payment</label>
                                             <input type="text" name="payment" id="payment" class="form-control" placeholder ="" value="0">
                                          </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-6">
                                          <div class="form-group">
                                             <label>Payment Type</label>
                                             <select name="paytype" id="paytype" class="form-control" placeholder ="" value="0">
                                                <option value='cash'>Cash</option>
                                                <option value='card'>Card</option>
                                                <option value='mobile'>Mobile</option>
                                                <option value='check'>Check</option>
                                             </select>
                                          </div>
                                        </div>
                                        <div class="col-6">
                                          <div class="form-group">
                                             <label>Sale By</label>
                                             <input type="text" name="sby" id="sby" class="form-control" placeholder ="" value="<?php echo $user_name ;?>">
                                            
                                          </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        
                                        <div class="col-12">
                                          <div class="form-group">
                                             <label>Remarks</label>
                                             <input type="text" name="remarks" id="remarks" class="form-control" placeholder ="" value="">
                                          </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-6">
                                            <div style="width: 80px; margin: 20px auto;">
                                                <input type="button" class="btn btn-danger btn-lg" id="cancel" value="Cancel">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div style="width: 80px; margin: 20px auto;">
                                                <input type="button" class="btn btn-success btn-lg" id="save" value="Save">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        
                                        <div class="col-6">
                                          <div class="form-group">
                                             <div style="width: 50px; margin: 0 auto;">
                                                <input type="button" class="btn btn-primary btn-md" id="reprint" value="Reprint">
                                            </div>
                                          </div>
                                        </div>
                                        
                                        <div class="col-6">
                                          <div class="form-group" style="position: relative;">
                                             
                                             <input type="text" name="rep_invoice" id="rep_invoice" class="form-control" placeholder ="Enter Invoice No" style="display: none;">
                                             
                                             <div id="rep_div" style="width: 100%; display: none; position: absolute; top: 30px; left: 0; z-index: 999;"></div>
                                          </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                     
                </form> 
                     
                     
                  </div>
                </div>
                
        </div>
        
    </div>
    
    
          <!-- content-wrapper ends -->
          
</div>
        <!-- main-panel ends -->
    
        <!-------Check Information----------->

                    <div id="check_info" class="custom-modal" >
                        
                        <div class="card" style="width:500px; margin: 0 auto; position:relative;">
                            <input type="button" class="btn btn-danger close-modal" value="X" style="position: absolute; top:15px; right: 5px;">
                            <div class="card-body" >
                                <h3 style="text-align: center;">Check Info</h3>
                                
                                <table class="" style="width: 100%; border: 1px solid #e6e6e6; padding: 5px; border-collapse: collapse;">
                                    <tr><td><label style="padding:10px;">Client's Bank</label></td><td><input type="text" class="form-control" id="clients_bank" name="clients_bank"></td></tr>
                                    <tr><td><label style="padding:10px;">Client's Bank Account</label></td><td><input type="text" class="form-control" id="clients_bank_acc" name="clients_bank_acc"></td></tr>
                                    <tr><td><label style="padding:10px;">Check No</label></td><td><input type="text" class="form-control" id="check_no" name="check_no"></td></tr>
                                    
                                    <tr><td><label style="padding:10px;">Cleck Type</label></td><td>
                                            <select class="form-control" id="check_type" name="check_type">
                                                <option value="pay_cash">Cash</option>
                                                <option value="pay_account">Account</option>
                                            </select>
                                        </td>
                                    </tr>
                                    
                                    <tr class="hide_tr" style="display: none;"><td><label style="padding:10px;">Shop's Bank</label></td>
                                        <td style="position: relative;"><input type="text" class="form-control" id="shops_bank" name="shops_bank">
                                        <div id="shop_bank_div" style="width: 100%; display: none; position: absolute; top: 30px; left: 0; z-index: 999;"></div>
                                        <input type="hidden" id="bank_id" name="bank_id" value="0">
                                    </td></tr>
                                    
                                    <tr class="hide_tr" style="display: none;"><td><label style="padding:10px;">Shop's Bank Account</label></td>
                                        <td style="position: relative;"><input type="text" class="form-control" id="shops_bank_account" name="shops_bank_account">
                                        <div id="shop_account_div" style="width: 100%; display: none; position: absolute; top: 30px; left: 0; z-index: 999;"></div>
                                        <input type="hidden" id="account_id" name="account_id" value="0">
                                    </td></tr>
                                    
                                    <tr><td><label style="padding:10px;">Amount</label></td><td><input type="text" class="form-control" id="check_amount" name="check_amount"></td></tr>
                                    <tr><td><label style="padding:10px;">Cash (Partial Payment)</label></td><td><input type="text" class="form-control" id="check_cash" name="check_cash"></td></tr>
                                    <tr><td><label style="padding:10px;">Check Date</label></td><td><input type="text" class="form-control" id="check_date" name="check_date"></td></tr>
                                    <tr><td><label style="padding:10px;">Remarks</label></td><td><input type="text" class="form-control" id="check_remarks" name="check_remarks"></td></tr>
                                    <tr><td><div style="width:80px; margin-left: 20px;" class="btn btn-primary check_total"></div></td><td><div style="width:50px; margin: 20px auto;"><input type="button" class="btn btn-success" id="check_ok" value="OK"></div></td></tr>
                                </table>
                            </div>
                        </div>
                    </div>    
    
    <!-------Mobile Bank Information----------->

                    <div id="mobile_info" class="custom-modal" >
                        
                        <div class="card" style="width:500px; margin: 0 auto; position:relative;">
                            <input type="button" class="btn btn-danger close-modal" value="X" style="position: absolute; top:15px; right: 5px;">
                            <div class="card-body" >
                                <h3 style="text-align: center;">Mobile Banking Info</h3>
                                
                                <table class="" style="width: 100%; border: 1px solid #e6e6e6; padding: 5px; border-collapse: collapse;">
                                    
                                    <tr><td><label style="padding:10px;">Bank Name</label></td>
                                        <td style="position: relative;"><input type="text" class="form-control" id="mobile_bank" name="mobile_bank">
                                        <div id="shop_mobile_div" style="width: 100%; display: none; position: absolute; top: 30px; left: 0; z-index: 999;"></div>
                                        <input type="hidden" id="mobile_bank_id" name="mobile_bank_id" value="0">
                                    </td></tr>
                                
                                    <tr><td><label style="padding:10px;">Shop Number</label></td>
                                        <td style="position: relative;"><input type="text" class="form-control" id="mobile_bank_account" name="mobile_bank_account">
                                        <div id="mobile_bank_acc_id_div" style="width: 100%; display: none; position: absolute; top: 30px; left: 0; z-index: 999;"></div>
                                        <input type="hidden" id="mobile_bank_acc_id" name="mobile_bank_acc_id" value="0">
                                    </td></tr>
                                    
                                    <tr><td><label style="padding:10px;">Csutomer's Number</label></td>
                                        <td><input type="text" class="form-control" id="mobile_bank_acc_cust" name="mobile_bank_acc_cust">
                                        
                                    </td></tr>
                                    
                                    <tr><td><label style="padding:10px;">Amount</label></td><td><input type="text" class="form-control" id="mobile_amount" name="mobile_amount"></td></tr>
                                    
                                    <tr><td><label style="padding:10px;">Cash (Partial Payment)</label></td><td><input type="text" class="form-control" id="mobile_cash" name="mobile_cash"></td></tr>
                                    
                                    <tr><td><label style="padding:10px;">Tranx Id</label></td><td><input type="text" class="form-control" id="tranxid" name="tranxid"></td></tr>
                
                                    <tr><td><label style="padding:10px;">Remarks</label></td><td><input type="text" class="form-control" id="mobile_remarks" name="mobile_remarks"></td></tr>
                                    
                                    <tr><td><div style="width:80px; margin-left: 20px;" class="btn btn-primary mobile_total"></div></td><td><div style="width:50px; margin: 20px auto;"><input type="button" class="btn btn-success btn-lg" id="mobile_ok" value="OK"></div></td></tr>
                                </table>
                            </div>
                        </div>
                    </div>  
                    
                    
            <!-------Card Information----------->

                    <div id="card_info" class="custom-modal" >
                        
                        <div class="card" style="width:500px; margin: 0 auto; position:relative;">
                            <input type="button" class="btn btn-danger close-modal" value="X" style="position: absolute; top:15px; right: 5px;">
                            <div class="card-body" >
                                <h3 style="text-align: center;">Credit/ Debit Card Info</h3>
                                
                                <table class="" style="width: 100%; border: 1px solid #e6e6e6; padding: 5px; border-collapse: collapse;">
                                    
                                    <tr><td><label style="padding:10px;">Card Type</label></td>
                                        <td>
                                            <select class="form-control" id="card_type" name="card_type">
                                                <option value="visa">Visa Card</option>
                                                <option value="master">Masters Card</option>
                                                <option value="dbbl">DBBL Nexus Card</option>
                                            </select>
                                        </td></tr>
                                    
                                    <tr><td><label style="padding:10px;">Shop Bank</label></td>
                                        <td style="position: relative;"><input type="text" class="form-control" id="card_bank" name="card_bank">
                                        <div id="shop_card_div" style="width: 100%; display: none; position: absolute; top: 30px; left: 0; z-index: 999;"></div>
                                        <input type="hidden" id="card_bank_id" name="card_bank_id" value="0">
                                    </td></tr>
                                
                                    <tr><td><label style="padding:10px;">Shop Account</label></td>
                                        <td style="position: relative;"><input type="text" class="form-control" id="card_bank_account" name="card_bank_account">
                                        <div id="card_bank_acc_id_div" style="width: 100%; display: none; position: absolute; top: 30px; left: 0; z-index: 999;"></div>
                                        <input type="hidden" id="card_bank_acc_id" name="card_bank_acc_id" value="0">
                                    </td></tr>
                                    
                                    <tr><td><label style="padding:10px;">Amount</label></td><td><input type="text" class="form-control" id="card_amount" name="card_amount"></td></tr>
                                    
                                    <tr><td><label style="padding:10px;">Cash (Partial Payment)</label></td><td><input type="text" class="form-control" id="card_cash" name="card_cash"></td></tr>
                                
                                    <tr><td><label style="padding:10px;">Remarks</label></td><td><input type="text" class="form-control" id="card_remarks" name="card_remarks"></td></tr>
                                    
                                    <tr><td><div style="width:80px; margin-left: 20px;" class="btn btn-primary card_total"></div></td><td><div style="width:50px; margin: 20px auto;"><input type="button" class="btn btn-success btn-lg" id="card_ok" value="OK"></div></td></tr>
                                </table>
                            </div>
                        </div>
                    </div>  
    
@endsection

@section('page-js-script')

    <script type="text/javascript">
        
        $(document).ready(function() {
            
            $('#date').datepicker({dateFormat: 'yy-mm-dd'});
               
            $('#check_date').datepicker({dateFormat: 'yy-mm-dd'});
            
            $('#check_date').click(function(){
                
                $('#ui-datepicker-div').css('top','400px');
            });
               
            $("#cust_phone").keyup(function(e){
                    
                if(e.which == 40 || e.which == 38){
                
                    $("#cust_phone").blur();
                                
                    $('.customer-list').find("li:first").focus().addClass('active').siblings().removeClass();
                                
                    $('.customer-list').on('focus', 'li', function() {
                        $this = $(this);
                        $this.addClass('active').siblings().removeClass();
                        $this.closest('.customer-list').scrollTop($this.index() * $this.outerHeight());
                    });
                                        
                    $('.customer-list').on('keydown', 'li', function(e) {
                                        
                        $this = $(this);
                        if (e.keyCode == 40) {   
                                                
                            $this.next().focus();
                                                
                                return false;
                            }else if (e.keyCode == 38) {        
                                $this.prev().focus();
                                return false;
                            }
                        }); 
                                        
                        $('.customer-list').on('keyup', function(e){
                            if(e.which == 13){
                                            
                                var phone = $(this).find(".active").attr("data-phone");
                                var name = $(this).find(".active").attr("data-name");
                                var id = $(this).find(".active").attr("data-id");
                                           
                                $('#cust_phone').val(phone);
                                $('#cust_name').val(name);
                                $('#cust_id').val(id);
                                            
                                $("#search").focus();
                                $("#cust_div").hide();
                                            
                                //window.location.replace("{{Request::root()}}/admin/editcat/"+val);
                                            
                            }
                        });
                                
                        return false;
                    }
                        
                    var s_text = $(this).val();
            			
            		var formData = new FormData();
            			formData.append('s_text', s_text);
            			
            			$.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
            			
                	$.ajax({
                		  url: "{{ URL::route('get_customer') }}",
                          method: 'post',
                          data: formData,
                          contentType: false,
                          cache: false,
                          processData: false,
                          dataType: "json",
                		  beforeSend: function(){
                    			//$("#wait").show();
                    		},
                		  error: function(ts) {
                              
                              $('#cust_div').show();
                              $('#cust_div').html(ts.responseText);
                              //alert((ts.responseText));
                          },
                          success: function(data){
                            
                              $('#cust_div').show();
                              $('#cust_div').html(ts.responseText);
                              //alert(data);
                              
                          }
                		   
                	}); 
                       
                });
                
                
            $("#barcode").keypress(function(e){
                if(e.which == 13){
                    var s_text = $(this).val();
            		var formData = new FormData();
            		formData.append('s_text', s_text);
            		$.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            			
                	$.ajax({
                		url: "{{ URL::route('get_barcode') }}",
                        method: 'post',
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                		error: function(ts) {
                            alert(ts.responseText);
                        },
                        success: function(data){
                            var obj = data;
                              
                            var name = obj.name;
                            var id = obj.id;
                            var price = obj.price;
                              
                            $('#search').val(name);
                            $('#pid_hid').val(id);
                            $('#price').val(price);         
                            $("#price").focus(); 
                        }
                		   
                	}); 
                }
            });
                
                
                $("#search").keyup(function(e){
                    
                    if(e.which == 40 || e.which == 38){
                    
                    $("#search").blur();
                                
                    $('.products-list').find("li:first").focus().addClass('active').siblings().removeClass();
                                
                    $('.products-list').on('focus', 'li', function() {
                        $this = $(this);
                        $this.addClass('active').siblings().removeClass();
                        $this.closest('.products-list').scrollTop($this.index() * $this.outerHeight());
                    });
                                        
                    $('.products-list').on('keydown', 'li', function(e) {
                                        
                        $this = $(this);
                        if (e.keyCode == 40) {   
                                                
                            $this.next().focus();
                                                
                                return false;
                            }else if (e.keyCode == 38) {        
                                $this.prev().focus();
                                return false;
                            }
                        }); 
                                        
                        $('.products-list').on('keyup', function(e){
                            if(e.which == 13){
                                        
                                var id = $(this).find(".active").attr("data-id");    
                                var name = $(this).find(".active").attr("data-name");
                                var price = $(this).find(".active").attr("data-price");  
                                
                                
                                $('#search').val(name);
                                $('#pid_hid').val(id);
                                $('#price').val(price);
                                            
                                $("#qnt").focus();
                                $("#products_div").hide();
                                            
                                //window.location.replace("{{Request::root()}}/admin/editcat/"+val);
                                            
                            }
                        });
                                
                        return false;
                    }
                    
                    var s_text = $(this).val();
            			
            		var formData = new FormData();
            			formData.append('s_text', s_text);
            			
            			$.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
            			
                	$.ajax({
                		  url: "{{ URL::route('get_products') }}",
                          method: 'post',
                          data: formData,
                          contentType: false,
                          cache: false,
                          processData: false,
                          dataType: "json",
                		  beforeSend: function(){
                    			//$("#wait").show();
                    		},
                		  error: function(ts) {
                              
                              $('#products_div').show();
                              $('#products_div').html(ts.responseText);
                              //alert((ts.responseText));
                          },
                          success: function(data){
                            
                              $('#products_div').show();
                              $('#products_div').html(ts.responseText);
                              //alert(data);
                              
                          }
                		   
                	}); 
                   
                });
                
            $("#shops_bank").keyup(function(e){
                    
                if(e.which == 40 || e.which == 38){
                
                    $("#shops_bank").blur();
                                
                    $('.bank-list').find("li:first").focus().addClass('active').siblings().removeClass();
                                
                    $('.bank-list').on('focus', 'li', function() {
                        $this = $(this);
                        $this.addClass('active').siblings().removeClass();
                        $this.closest('.bank-list').scrollTop($this.index() * $this.outerHeight());
                    });
                                        
                    $('.bank-list').on('keydown', 'li', function(e) {
                                        
                        $this = $(this);
                        if (e.keyCode == 40) {   
                                                
                            $this.next().focus();
                                                
                                return false;
                            }else if (e.keyCode == 38) {        
                                $this.prev().focus();
                                return false;
                            }
                        }); 
                                        
                        $('.bank-list').on('keyup', function(e){
                            if(e.which == 13){
                                            
                                var name = $(this).find(".active").attr("data-name");
                                var id = $(this).find(".active").attr("data-id");
                                           
                                $('#shops_bank').val(name);
                                $('#bank_id').val(id);
                                
                                $(function(){
                                    $("#shops_bank_account").focus();
                                });
                                
                                $("#shop_bank_div").hide();
                                            
                                //window.location.replace("{{Request::root()}}/admin/editcat/"+val);
                                            
                            }
                        });
                                
                        return false;
                    }
                        
                    var s_text = $(this).val();
            			
            		var formData = new FormData();
            			formData.append('s_text', s_text);
            			
            			$.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
            			
                	$.ajax({
                		  url: "{{ URL::route('get_bank') }}",
                          method: 'post',
                          data: formData,
                          contentType: false,
                          cache: false,
                          processData: false,
                          dataType: "json",
                		  beforeSend: function(){
                    			//$("#wait").show();
                    		},
                		  error: function(ts) {
                              //alert((ts.responseText));
                              $('#shop_bank_div').show();
                              $('#shop_bank_div').html(ts.responseText);
                              
                          },
                          success: function(data){
                            //alert(data);
                              $('#shop_bank_div').show();
                              $('#shop_bank_div').html(data);
                              
                              
                          }
                		   
                	}); 
                       
                }); 
                
                
                $("#shops_bank_account").keyup(function(e){
                    
                    if(e.which == 40 || e.which == 38){
                    
                        $("#shops_bank_account").blur();
                                    
                        $('.bank-acc-list').find("li:first").focus().addClass('active').siblings().removeClass();
                                    
                        $('.bank-acc-list').on('focus', 'li', function() {
                            $this = $(this);
                            $this.addClass('active').siblings().removeClass();
                            $this.closest('.bank-acc-list').scrollTop($this.index() * $this.outerHeight());
                        });
                                            
                        $('.bank-acc-list').on('keydown', 'li', function(e) {
                                            
                            $this = $(this);
                            if (e.keyCode == 40) {   
                                                    
                                $this.next().focus();
                                                    
                                    return false;
                                }else if (e.keyCode == 38) {        
                                    $this.prev().focus();
                                    return false;
                                }
                            }); 
                                            
                            $('.bank-acc-list').on('keyup', function(e){
                                if(e.which == 13){
                                                
                                    var name = $(this).find(".active").attr("data-name");
                                    var id = $(this).find(".active").attr("data-id");
                                               
                                    $('#shops_bank_account').val(name);
                                    $('#account_id').val(id);
                                    
                                    $("#check_amount").focus();
                                    $("#shop_account_div").hide();
                                                
                                    //window.location.replace("{{Request::root()}}/admin/editcat/"+val);
                                                
                                }
                            });
                                    
                            return false;
                        }
                        
                    var s_text = $(this).val();
                    var bank_id = $('#bank_id').val();
            			
            		var formData = new FormData();
            			formData.append('s_text', s_text);
            			formData.append('bank_id', bank_id);
            			
            			$.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
            			
                	$.ajax({
                		  url: "{{ URL::route('get_bank_account') }}",
                          method: 'post',
                          data: formData,
                          contentType: false,
                          cache: false,
                          processData: false,
                          dataType: "json",
                		  beforeSend: function(){
                    			//$("#wait").show();
                    		},
                		  error: function(ts) {
                              //alert((ts.responseText));
                              $('#shop_account_div').show();
                              $('#shop_account_div').html(ts.responseText);
                              
                          },
                          success: function(data){
                            //alert(data);
                              $('#shop_account_div').show();
                              $('#shop_account_div').html(data);
                              
                              
                          }
                		   
                	}); 
                       
                });
                
                
            $("#mobile_bank").keyup(function(e){
                    
                if(e.which == 40 || e.which == 38){
                
                    $("#mobile_bank").blur();
                                
                    $('.bank-list').find("li:first").focus().addClass('active').siblings().removeClass();
                                
                    $('.bank-list').on('focus', 'li', function() {
                        $this = $(this);
                        $this.addClass('active').siblings().removeClass();
                        $this.closest('.bank-list').scrollTop($this.index() * $this.outerHeight());
                    });
                                        
                    $('.bank-list').on('keydown', 'li', function(e) {
                                        
                        $this = $(this);
                        if (e.keyCode == 40) {   
                                                
                            $this.next().focus();
                                                
                                return false;
                            }else if (e.keyCode == 38) {        
                                $this.prev().focus();
                                return false;
                            }
                        }); 
                                        
                        $('.bank-list').on('keyup', function(e){
                            if(e.which == 13){
                                            
                                var name = $(this).find(".active").attr("data-name");
                                var id = $(this).find(".active").attr("data-id");
                                           
                                $('#mobile_bank').val(name);
                                $('#mobile_bank_id').val(id);
                                
                                $("#mobile_bank_account").focus();
                                $("#shop_mobile_div").hide();
                                            
                                //window.location.replace("{{Request::root()}}/admin/editcat/"+val);
                                            
                            }
                        });
                                
                        return false;
                    }
                        
                    var s_text = $(this).val();
            			
            		var formData = new FormData();
            			formData.append('s_text', s_text);
            			
            			$.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
            			
                	$.ajax({
                		  url: "{{ URL::route('get_bank') }}",
                          method: 'post',
                          data: formData,
                          contentType: false,
                          cache: false,
                          processData: false,
                          dataType: "json",
                		  beforeSend: function(){
                    			//$("#wait").show();
                    		},
                		  error: function(ts) {
                              //alert((ts.responseText));
                              $('#shop_mobile_div').show();
                              $('#shop_mobile_div').html(ts.responseText);
                              
                          },
                          success: function(data){
                            //alert(data);
                              $('#shop_mobile_div').show();
                              $('#shop_mobile_div').html(data);
                              
                        }
                		   
                	}); 
                       
            }); 
                
                
                $("#mobile_bank_account").keyup(function(e){
                    
                    if(e.which == 40 || e.which == 38){
                    
                        $("#mobile_bank_account").blur();
                                    
                        $('.bank-acc-list').find("li:first").focus().addClass('active').siblings().removeClass();
                                    
                        $('.bank-acc-list').on('focus', 'li', function() {
                            $this = $(this);
                            $this.addClass('active').siblings().removeClass();
                            $this.closest('.bank-acc-list').scrollTop($this.index() * $this.outerHeight());
                        });
                                            
                        $('.bank-acc-list').on('keydown', 'li', function(e) {
                                            
                            $this = $(this);
                            if (e.keyCode == 40) {   
                                                    
                                $this.next().focus();
                                                    
                                    return false;
                                }else if (e.keyCode == 38) {        
                                    $this.prev().focus();
                                    return false;
                                }
                            }); 
                                            
                            $('.bank-acc-list').on('keyup', function(e){
                                if(e.which == 13){
                                                
                                    var name = $(this).find(".active").attr("data-name");
                                    var id = $(this).find(".active").attr("data-id");
                                               
                                    $('#mobile_bank_account').val(name);
                                    $('#mobile_bank_acc_id').val(id);
                                    
                                    $("#mobile_bank_acc_cust").focus();
                                    $("#mobile_bank_acc_id_div").hide();
                                                
                                    //window.location.replace("{{Request::root()}}/admin/editcat/"+val);
                                                
                                }
                            });
                                    
                            return false;
                        }
                        
                    var s_text = $(this).val();
                    var bank_id = $('#mobile_bank_id').val();
            			
            		var formData = new FormData();
            			formData.append('s_text', s_text);
            			formData.append('bank_id', bank_id);
            			
            			$.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
            			
                	$.ajax({
                		  url: "{{ URL::route('get_bank_account') }}",
                          method: 'post',
                          data: formData,
                          contentType: false,
                          cache: false,
                          processData: false,
                          dataType: "json",
                		  beforeSend: function(){
                    			//$("#wait").show();
                    		},
                		  error: function(ts) {
                              //alert((ts.responseText));
                              $('#mobile_bank_acc_id_div').show();
                              $('#mobile_bank_acc_id_div').html(ts.responseText);
                              
                          },
                          success: function(data){
                            //alert(data);
                              $('#mobile_bank_acc_id_div').show();
                              $('#mobile_bank_acc_id_div').html(data);
                              
                              
                          }
                		   
                	}); 
                       
                });
                
                
                                
            $("#card_bank").keyup(function(e){
                    
                if(e.which == 40 || e.which == 38){
                
                    $("#card_bank").blur();
                                
                    $('.bank-list').find("li:first").focus().addClass('active').siblings().removeClass();
                                
                    $('.bank-list').on('focus', 'li', function() {
                        $this = $(this);
                        $this.addClass('active').siblings().removeClass();
                        $this.closest('.bank-list').scrollTop($this.index() * $this.outerHeight());
                    });
                                        
                    $('.bank-list').on('keydown', 'li', function(e) {
                                        
                        $this = $(this);
                        if (e.keyCode == 40) {   
                                                
                            $this.next().focus();
                                                
                                return false;
                            }else if (e.keyCode == 38) {        
                                $this.prev().focus();
                                return false;
                            }
                        }); 
                                        
                        $('.bank-list').on('keyup', function(e){
                            if(e.which == 13){
                                            
                                var name = $(this).find(".active").attr("data-name");
                                var id = $(this).find(".active").attr("data-id");
                                           
                                $('#card_bank').val(name);
                                $('#card_bank_id').val(id);
                                
                                $("#card_bank_account").focus();
                                $("#shop_card_div").hide();
                                            
                                //window.location.replace("{{Request::root()}}/admin/editcat/"+val);
                                            
                            }
                        });
                                
                        return false;
                }
                        
                    var s_text = $(this).val();
            			
            		var formData = new FormData();
            			formData.append('s_text', s_text);
            			
            			$.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
            			
                	$.ajax({
                		  url: "{{ URL::route('get_bank') }}",
                          method: 'post',
                          data: formData,
                          contentType: false,
                          cache: false,
                          processData: false,
                          dataType: "json",
                		  beforeSend: function(){
                    			//$("#wait").show();
                    		},
                		  error: function(ts) {
                              //alert((ts.responseText));
                              $('#shop_card_div').show();
                              $('#shop_card_div').html(ts.responseText);
                              
                          },
                          success: function(data){
                            //alert(data);
                              $('#shop_card_div').show();
                              $('#shop_card_div').html(data);
                              
                          }
                		   
                	}); 
                       
            }); 
                
                
                $("#card_bank_account").keyup(function(e){
                    
                    if(e.which == 40 || e.which == 38){
                    
                        $("#card_bank_account").blur();
                                    
                        $('.bank-acc-list').find("li:first").focus().addClass('active').siblings().removeClass();
                                    
                        $('.bank-acc-list').on('focus', 'li', function() {
                            $this = $(this);
                            $this.addClass('active').siblings().removeClass();
                            $this.closest('.bank-acc-list').scrollTop($this.index() * $this.outerHeight());
                        });
                                            
                        $('.bank-acc-list').on('keydown', 'li', function(e) {
                                            
                            $this = $(this);
                            if (e.keyCode == 40) {   
                                                    
                                $this.next().focus();
                                                    
                                    return false;
                                }else if (e.keyCode == 38) {        
                                    $this.prev().focus();
                                    return false;
                                }
                            }); 
                                            
                            $('.bank-acc-list').on('keyup', function(e){
                                if(e.which == 13){
                                                
                                    var name = $(this).find(".active").attr("data-name");
                                    var id = $(this).find(".active").attr("data-id");
                                               
                                    $('#card_bank_account').val(name);
                                    $('#card_bank_acc_id').val(id);
                                    
                                    $('#card_amount').focus();
                                    
                                    $("#card_bank_acc_id_div").hide();
                                                
                                    //window.location.replace("{{Request::root()}}/admin/editcat/"+val);
                                                
                                }
                            });
                                    
                            return false;
                        }
                        
                    var s_text = $(this).val();
                    var bank_id = $('#card_bank_id').val();
            			
            		var formData = new FormData();
            			formData.append('s_text', s_text);
            			formData.append('bank_id', bank_id);
            			
            			$.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
            			
                	$.ajax({
                		  url: "{{ URL::route('get_bank_account') }}",
                          method: 'post',
                          data: formData,
                          contentType: false,
                          cache: false,
                          processData: false,
                          dataType: "json",
                		  beforeSend: function(){
                    			//$("#wait").show();
                    		},
                		  error: function(ts) {
                              //alert((ts.responseText));
                              $('#card_bank_acc_id_div').show();
                              $('#card_bank_acc_id_div').html(ts.responseText);
                              
                          },
                          success: function(data){
                            //alert(data);
                              $('#card_bank_acc_id_div').show();
                              $('#card_bank_acc_id_div').html(data);
                              
                          }
                		   
                	}); 
                       
                });
                
               
                $('#qnt').on('keyup', function(e){
            
                    e.preventDefault();
                    
                    if(e.which == 13){
                        
                        var id = $('#pid_hid').val();
                        var name = $('#search').val();
                        var qnt = Number($(this).val());
                        var price = Number($('#price').val());
                        var totalPrice = Number($('#hid_total').val());
                        
                        if(id == ''){
                            alert("Invalid product. Please select product or add product before proceed!!");
                            return false;
                        }
                        
                        if(name == '' || qnt == '' || price == ''){
                            
                            alert("Please Fillup All Fields ");
                            return false;
                        }
                        
                        add_product_to_table(id, name, qnt, price, totalPrice, 0, 0);
                    
                    }
                    
                });
                
                $("#scharge").on("change keyup paste", function(){
                
                    var hid_total = Number($('#hid_total').val());
                    
                    var discount = Number($("#discount").val());
                    
                    var scharge = Number($(this).val());
                    
                    $('#total').val((hid_total + scharge) - discount); 
                    
                });
                
                $("#discount").on("change keyup paste", function(){
                
                    var hid_total = Number($('#hid_total').val());
                    
                    var discount = Number($(this).val());
                    
                    var scharge = Number($('#scharge').val());
                    
                    $('#total').val(hid_total + scharge - discount); 
                    
                });
                
                $("#payment").on("change keyup paste", function(){
                
                    var hid_total = Number($('#hid_total').val());
                    
                    var discount = Number($('#discount').val());
                    
                    var scharge = Number($('#scharge').val());
                    
                    var payment = Number($(this).val());
                    
                    $('#total').val(hid_total - payment - discount + scharge); 
                    
                });
                
                $("#check_amount").on("change keyup paste", function(){
                
                    var hid_total = Number($('#hid_total').val());
                    
                    var discount = Number($('#discount').val());
                    
                    var scharge = Number($('#scharge').val());
                
                    var check_amount = Number($(this).val());
                    
                    $('#total').val(hid_total - check_amount - discount + scharge); 
                    
                });
                
                $("#mobile_amount").on("change keyup paste", function(){
                
                    var hid_total = Number($('#hid_total').val());
                    
                    var discount = Number($('#discount').val());
                    
                    var scharge = Number($('#scharge').val());
                
                    var mobile_amount = Number($(this).val());
                    
                    $('#total').val(hid_total - mobile_amount - discount + scharge); 
                    
                });
                
                $("#card_amount").on("change keyup paste", function(){
                
                    var hid_total = Number($('#hid_total').val());
                    
                    var discount = Number($('#discount').val());
                    
                    var scharge = Number($('#scharge').val());
                
                    var card_amount = Number($(this).val());
                    
                    $('#total').val(hid_total - card_amount - discount + scharge); 
                    
                });
                
                $("#mobile_cash").on("change keyup paste", function(){
                
                    var hid_total = Number($('#hid_total').val());
                    
                    var discount = Number($('#discount').val());
                    
                    var scharge = Number($('#scharge').val());
                
                    var mobile_amount = Number($('#mobile_amount').val());
                    
                    var mobile_cash = Number($(this).val());
                    
                    var total_tk = (mobile_amount + mobile_cash);
                    
                    $('#total').val(hid_total - total_tk - discount + scharge); 
                    
                });
                
                $("#card_cash").on("change keyup paste", function(){
                
                    var hid_total = Number($('#hid_total').val());
                    
                    var discount = Number($('#discount').val());
                    
                    var scharge = Number($('#scharge').val());
                    
                    var card_amount = Number($('#card_amount').val());
                
                    var card_cash = Number($(this).val());
                    
                    var total_tk = (card_amount + card_cash);
                    
                    $('#total').val(hid_total - total_tk - discount + scharge); 
                    
                });
                
                $("#check_cash").on("change keyup paste", function(){
                
                    var hid_total = Number($('#hid_total').val());
                    
                    var discount = Number($('#discount').val());
                    
                    var scharge = Number($('#scharge').val());
                    
                    var check_amount = Number($('#check_amount').val());
                
                    var check_cash = Number($(this).val());
                    
                    var total_tk = (check_amount + check_cash);
                    
                    $('#total').val(hid_total - total_tk - discount + scharge); 
                    
                });
                
                $('#cancel').click(function(){
                    
                        $('#cust_phone').val("");
                        $('#cust_name').val("");
                        $('#cust_id').val("0");
                        $('#vat').val("0");
                        $('#disc').val("0");
                        $('#scharge').val("0");
                        $('#discount').val("0");
                        $('#amount').val("0")
                        $('#total').val("0");
                        $('#payment').val("0");
                        $('#paytype').val("cash");
                        $('#hid_total').val("0");
                        
                        $('#card_bank').val("");
                        $('#card_bank_id').val("");
                        $('#card_bank_account').val("");
                        $('#card_bank_acc_id').val("0");
                        $('#card_type').val("visa");
                        $('#card_amount').val("");
                        $('#card_cash').val("");
                        $('#tranxid').val("");
                        $('#card_remarks').val("");
                        
                        $('#mobile_bank').val("");
                        $('#mobile_bank_id').val("");
                        $('#mobile_bank_account').val("");
                        $('#mobile_bank_acc_id').val("0");
                        $('#mobile_bank_acc_cust').val("");
                        $('#mobile_amount').val("");
                        $('#mobile_cash').val("");
                        $('#tranxid').val("");
                        $('#mobile_remarks').val("");
        
                        
                        $('#clients_bank').val("");
                        $('#clients_bank_acc').val("");
                        $('#check_no').val("");
                        $('#check_type').val("pay_cash");
                        $('#shops_bank').val("");
                        $('#bank_id').val("0");
                        $('#shops_bank_account').val("");
                        $('#account_id').val("0");
                        $('#check_amount').val("");
                        $('#check_cash').val("");
                        $('#check_date').val("");
                        $('#check_remarks').val("");
                    
                    location.reload();
                    
                });
                
                $('#paytype').change(function(){
                    
                    if($(this).val() == 'check'){
                        
                        $('#check_info').show();
                        
                        $('.check_total').html($('#total').val());
                    }
                    
                });
                
                $('#paytype').change(function(){
                    
                    if($(this).val() == 'mobile'){
                        
                        $('#mobile_info').show();
                        
                        $('.mobile_total').html($('#total').val());
                    }
                    
                });
                
                $('#paytype').change(function(){
                    
                    if($(this).val() == 'card'){
                        
                        $('#card_info').show();
                        
                        $('.card_total').html($('#total').val());
                    }
                    
                });
                
                $('#check_type').change(function(){
                    
                    if($(this).val() == 'pay_account'){
                        
                        $('.hide_tr').show();
                        
                        $('#shops_bank').focus();
                    }
                    
                    if($(this).val() == 'pay_cash'){
                        
                        $('.hide_tr').hide();
                    }
                    
                });
                
               
               $('#check_ok').click(function(){
                   
                   $('#check_info').hide();
                   
               });
               
               $('#mobile_ok').click(function(){
                   
                   $('#mobile_info').hide();
                   
               });
                   
               $('#card_ok').click(function(){
                   
                   $('#card_info').hide();
                   
               });       
                   
               $('.close-modal').click(function(){
                   
                   $('.custom-modal').hide();
               });
                        
        //////Save///////////
        
        $('#save').click(function(e){
           
            if($('#paytype').val() == 'check'){
                
                if($('#clients_bank').val() == '' || $('#clients_bank_acc').val() == '' || $('#check_amount').val() == '' || $('#check_date').val() == ''){
                    alert("Please Fillup All Check Information");
                    return false;
                }
                
                if($('#check_type').val() == 'pay_account'){
                    
                    if($('#shops_bank').val() == '' || $('#shops_bank_account').val() == '' ){
                        alert("Please Fillup All Check Information");
                        return false;
                    }
                }
                
            }
            
            if($('#paytype').val() == 'mobile'){
                
                if($('#mobile_bank').val() == '' || $('#mobile_bank_account').val() == '' || $('#mobile_bank_acc_cust').val() == '' || $('#mobile_amount').val() == ''){
                    alert("Please Fillup All Mobile Information");
                    return false;
                }
            }
           
            var i = 0;
            
            var cartData = [];
    
            $(this).attr('disabled', true);
            
            $('.price-table tr td').each(function(){
               
               var take_data = $(this).html();
              
               if($(this).attr('data-prodid') != ''){prodid = $(this).attr('data-prodid'); cartData.push(prodid);}
             
               if($(this).attr("class") == 'qnty'){quantity =$(this).html(); cartData.push(quantity);}
             
               if($(this).attr("class") == 'uprice'){uprice = $(this).html(); cartData.push(uprice);}
              
               if($(this).attr("class") == 'totalPriceTd'){totalPriceTd = $(this).html(); cartData.push(totalPriceTd);} 
               
               i = i +1;
           });
           
           cartData = cartData.filter(item => item);
         
           if(i<5){
               alert("Please Choose A Product.");
               
               $(this).attr('disabled', true);
               
               return false;
           }
           
            var fieldValues = {};
            
            fieldValues.cust_id = $('#cust_id').val();
            fieldValues.cust_name = $('#cust_name').val();
            fieldValues.cust_phone = $('#cust_phone').val();
            fieldValues.vat = $('#vat').val();
            fieldValues.scharge = $('#scharge').val();
            fieldValues.discount = $('#discount').val();
            fieldValues.amount = $('#amount').val();
            fieldValues.hid_total = $('#hid_total').val();
            fieldValues.total = $('#total').val();
            fieldValues.paytype = $('#paytype').val();
            fieldValues.payment = $('#payment').val();
            fieldValues.remarks = $('#remarks').val();
            fieldValues.date = $('#date').val();
            
            
            fieldValues.clients_bank = $('#clients_bank').val();
            fieldValues.clients_bank_acc = $('#clients_bank_acc').val();
            fieldValues.check_amount = $('#check_amount').val();
            fieldValues.check_cash = $('#check_cash').val();
            fieldValues.check_date = $('#check_date').val();
            fieldValues.check_type = $('#check_type').val();
            fieldValues.shops_bank = $('#shops_bank').val();
            fieldValues.bank_id = $('#bank_id').val();
            fieldValues.shops_bank_account = $('#shops_bank_account').val();
            fieldValues.account_id = $('#account_id').val();
            fieldValues.check_remarks = $('#check_remarks').val();
            
            fieldValues.card_type = $('#card_type').val();
            fieldValues.card_bank = $('#card_bank').val();
            fieldValues.card_bank_id = $('#card_bank_id').val();
            fieldValues.card_bank_account = $('#card_bank_account').val();
            fieldValues.card_bank_acc_id = $('#card_bank_acc_id').val();
            fieldValues.card_amount = $('#card_amount').val();
            fieldValues.card_cash = $('#card_cash').val();
            fieldValues.card_remarks = $('#card_remarks').val();
            
            fieldValues.mobile_bank = $('#mobile_bank').val();
            fieldValues.mobile_bank_id = $('#mobile_bank_id').val();
            fieldValues.mobile_bank_acc_cust = $('#mobile_bank_acc_cust').val();
            fieldValues.mobile_bank_account = $('#mobile_bank_account').val();
            fieldValues.mobile_bank_acc_id = $('#mobile_bank_acc_id').val();
            fieldValues.mobile_amount = $('#mobile_amount').val();
            fieldValues.mobile_cash = $('#mobile_cash').val();
            fieldValues.tranxid = $('#tranxid').val();
            fieldValues.mobile_remarks = $('#mobile_remarks').val(); 
         
            var formData = new FormData();
           
            formData.append('fieldValues', JSON.stringify(fieldValues)); 
            formData.append('cartData', JSON.stringify(cartData));
           		
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          
          $.ajax({
                url: "{{ URL::route('sales_invoice_save') }}",
                method: 'post',
                data: formData,
                //data: cartData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                beforeSend: function(){
                	$("#wait").show();
                },
                error: function(ts) {
                    
                    alert(ts.responseText);
                        
                       var invoice = ts.responseText;
                        
                        printPos(invoice);
                        
                        $('#cust_phone').val("");
                        $('#cust_name').val("");
                        $('#cust_id').val("0");
                        $('#vat').val("0");
                        $('#disc').val("0");
                        $('#scharge').val("0");
                        $('#discount').val("0");
                        $('#amount').val("0")
                        $('#total').val("0");
                        $('#payment').val("0");
                        $('#paytype').val("cash");
                        $('#hid_total').val("0");
                        
                        $('#card_bank').val("");
                        $('#card_bank_id').val("");
                        $('#card_bank_account').val("");
                        $('#card_bank_acc_id').val("0");
                        $('#card_type').val("visa");
                        $('#card_amount').val("");
                        $('#card_cash').val("");
                        $('#card_remarks').val("");
                        
                        $('#mobile_bank').val("");
                        $('#mobile_bank_id').val("");
                        $('#mobile_bank_account').val("");
                        $('#mobile_bank_acc_id').val("0");
                        $('#mobile_bank_acc_cust').val("");
                        $('#mobile_amount').val("");
                        $('#mobile_cash').val("");
                        $('#tranxid').val("");
                        $('#mobile_remarks').val("");
                        
                        
                        $('#clients_bank').val("");
                        $('#clients_bank_acc').val("");
                        $('#check_no').val("");
                        $('#check_type').val("pay_cash");
                        $('#shops_bank').val("");
                        $('#bank_id').val("0");
                        $('#shops_bank_account').val("");
                        $('#account_id').val("0");
                        $('#check_amount').val("");
                        $('#check_cash').val("");
                        $('#check_date').val("");
                        $('#check_remarks').val("");
                        
                        
                        $('.price-table td').remove();
                    
                        $("#wait").hide();
                        
                        $('#save').attr('disabled', false);
                    
                        location.reload();
                       
                
                    },
                    success: function(data){
                        
                        alert(data);
                            
                        }
                    }); 
                        
                        
                  e.preventDefault(); 
               }); 
                   
                $('body').on('click', '.delete', function(e){
            
                    var totalPriceTd = Number($(this).closest('tr').find('.totalPriceTd').html());
                    
                    var pvat = Number($(this).closest('tr').attr('data-vat'));
                    
                    var totalPrice = $('#hid_total').val();
                    
                    vat = Number($('#vat').val());
                    
                    totalPrice = Number(totalPrice - totalPriceTd);
                    
                    grandTotalPrice = Number(grandTotal - totalPriceTd - pvat);
                    
                    $('#hid_total').val(totalPrice);
                    
                    $('#amount').val(grandTotalPrice);
                    
                    $('#total').val(grandTotalPrice);
                    
                    vat = (vat - pvat);
                    
                    $('#vat').val(vat);
                    
                    $(this).closest('tr').remove();
                    
                }); 
               
               
                   // Query For Reprint Invoice
               
               $('#reprint').click(function(){
                   $("#rep_invoice").show();
               });
               
               $("#rep_invoice").keyup(function(e){
                    
                if(e.which == 40 || e.which == 38){
                
                    $("#rep_invoice").blur();
                                
                    $('.invoice-list').find("li:first").focus().addClass('active').siblings().removeClass();
                                
                    $('.invoice-list').on('focus', 'li', function() {
                        $this = $(this);
                        $this.addClass('active').siblings().removeClass();
                        $this.closest('.invoice-list').scrollTop($this.index() * $this.outerHeight());
                    });
                                        
                    $('.invoice-list').on('keydown', 'li', function(e) {
                                        
                        $this = $(this);
                        if (e.keyCode == 40) {   
                                                
                            $this.next().focus();
                                                
                                return false;
                            }else if (e.keyCode == 38) {        
                                $this.prev().focus();
                                return false;
                            }
                        }); 
                                        
                        $('.invoice-list').on('keyup', function(e){
                            if(e.which == 13){
                                            
                                var invoice = $(this).find(".active").attr("data-invoice");
                                
                                $('#rep_invoice').val(invoice);
                                
                                $("#rep_invoice").focus();
                                $("#rep_div").hide();
                                            
                                //window.location.replace("{{Request::root()}}/admin/editcat/"+val);
                            }
                        });
                                
                        return false;
                    }
                        
                    var s_text = $(this).val();
            			
            		var formData = new FormData();
            			formData.append('s_text', s_text);
            			
            			$.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
            			
                	$.ajax({
                		  url: "{{ URL::route('get_invoice') }}",
                          method: 'post',
                          data: formData,
                          contentType: false,
                          cache: false,
                          processData: false,
                          dataType: "json",
                		  beforeSend: function(){
                    			//$("#wait").show();
                    		},
                		  error: function(ts) {
                              
                              $('#rep_div').show();
                              $('#rep_div').html(ts.responseText);
                              //alert((ts.responseText));
                          },
                          success: function(data){
                            
                              $('#rep_div').show();
                              $('#rep_div').html(ts.responseText);
                              //alert(data);
                              
                          }
                		   
                	}); 
                       
                }); 
                
                
                $("#rep_invoice").keypress(function(e){
                
                    if(e.which == 13){
                        
                        var s_text = $(this).val();
                			
                		var formData = new FormData();
                			formData.append('s_text', s_text);
                			
                			$.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                			
                    	$.ajax({
                    		  url: "{{ URL::route('get_invoice_details') }}",
                              method: 'post',
                              data: formData,
                              contentType: false,
                              cache: false,
                              processData: false,
                              dataType: "json",
                    		  error: function(ts) {
                                  
                                    //alert(ts.responseText);
                                    
                                    
                                    /* $('#search').val(name);
                                    $('#pid_hid').val(id);
                                    $('#price').val(price);
                                                
                                    $("#price").focus(); */
                              },
                              success: function(data){
                                  
                                 var obj = JSON.parse(JSON.stringify(data));
                                 
                                 var invoice = obj.invoice;
                                 var trow = obj.trow;
                                 var company = obj.company;
                                 var company_add = obj.company_add;
                                 var tcname = obj.cust_name;
                                 var tcphone = obj.cust_phone;
                                 var amount = obj.amount;
                                 var vat = obj.vat;
                                 var scharge = obj.scharge;
                                 var discount = obj.discount;
                                 var gtotal = obj.gtotal;
                                 var payment = obj.payment;
                                 var due = obj.due;
                                 var date = obj.date;
                                 
                                 rePrintPos(invoice, company, company_add, tcname, tcphone, trow, amount, vat, scharge, discount, gtotal, payment, due, date);
                                  
                                 location.reload();
                              }
                    		   
                    	    }); 
                        }   
                }); 
                
                
               $('body').on('click', function(){
            
                    $('#products_div').hide();
                    $('#cust_div').hide();
                    
                });
        });

        $('body').on('click', '.delete', function(e){
            
            var totalPriceTd = Number($(this).closest('tr').find('.totalPriceTd').html());
            
            var grandTotal = Number($('#total').val());
        
            var totalPrice = $('#hid_total').val();
            
            
            totalPrice = Number(totalPrice - totalPriceTd);
            
            grandTotalPrice = Number(grandTotal - totalPriceTd);
            
            $('#hid_total').val(totalPrice);
            
            $('#total').val(grandTotalPrice);
            
            $(this).closest('tr').remove();
    
        });
            
        function selectCustomer(id, phone, name){
                 
            $('#cust_phone').val(phone);
            $('#cust_name').val(name);
            $('#cust_id').val(id);
                                            
            $("#search").focus();
            $("#cust_div").hide();
        }
        
        function selectProducts(id, name, price){

            $('#search').val(name);
            $('#pid_hid').val(id);
            $('#price').val(price);
                                        
            $("#price").focus();
            $("#products_div").hide();
            
        }
            
        function selectInvoice(invoice){
            
            $('#rep_invoice').val(invoice);
                                
            $("#rep_invoice").focus();
            $("#rep_div").hide();
            
        }    
        
        function selectBank(id, name){
            
            $('#shops_bank').val(name);
            $('#bank_id').val(id);
                                
            $(function(){
                $("#shops_bank_account").focus();
            });
                                
            
            $("#shop_bank_div").hide();
            
        }
        
        function selectAccount(id, name){
            
            $('#shops_bank_account').val(name);
            $('#account_id').val(id);
                                    
            $("#check_amount").focus();
            $("#shop_account_div").hide();
        }
        
        function add_product_to_table(id, name, qnt, price, totalPrice, pvat, vat){
        
            var id = id;
            var name = name;
            var qnt = Number(qnt);
            var price = Number(price);
            var pvat = Number(pvat);
            var vat = Number(vat);
            var totalPrice = Number(totalPrice);
            
            calculate_vat = ((price * pvat)/100);
            
            vat = (vat + calculate_vat);
            
            var total = (price * qnt);
            
            $('.price-table').show();
            
            $('.price-table').append("<tr data-vat='"+calculate_vat+"'><td data-prodid='"+id+"' style='width:200px;'>"+name+"</td><td class='uprice'>"+price+"</td><td class='qnty'>"+qnt+"</td><td class='totalPriceTd'>"+total+"</td><td><i class='delete mdi mdi-delete'></i></td></tr>");
            
            totalPrice = Number(totalPrice + total);
            
            grandTotalPrice = Number(totalPrice + vat);
            
            $('#hid_total').val(totalPrice);
            
            $('#amount').val(grandTotalPrice);
            
            $('#total').val(grandTotalPrice);
            
            $('#vat').val(vat);
            
            $('#search').val("");
            
            $('#price').val("");
            
            $('#qnt').val("");
            
            $('#barcode').val("");
            
            $('#search').focus();
        }
            
        
        function printPos(invoice){
            
            $('#printdiv').css('width', '332px');
            
            $('#print_add').show();
             
            $('#print_add').css('width','332px').css('text-align','center');
            
            	$("#mid_section").show();
	 		
	 		    var tcname = $('#cust_name').val();
	 		    
	 		    //var tcadd = $('#add_tcaddress').val();
	 		    
	 		    //var invoice = $('#sid').val();
	 		    
	 		    var tcphone = $('#cust_phone').val();
	 		    
	 		    $("#cust_add").append("Customer: "+tcname+"<br>");
                //$("#cust_add").append("Address: "+tcadd+"<br>");
                $("#cust_add").append("Phone: "+tcphone+"<br>");
                $("#cust_add").append("Invoice: "+invoice);
                $("#cust_add").append(" &nbsp; ");
		     
		     
		     $("#prodlist").css('border-collapse','collapse');
		
		     $("#prodlist tbody tr").each(function() {
		          
		            $(this).find("th:eq(4)").remove();
                    $(this).find("td:eq(4)").remove();
                   
             });
            
             
			
		     $("#prodlist th").css('font-size','14px');
		     
		     $("#prodlist td").css('font-size','14px').css('border','1px solid #000');
			 
			 
			 var amount = $('#amount').val();
			 var vat = $('#vat').val();
			 var scharge = $('#scharge').val();
			 var discount = $('#discount').val();
			 var payment = $('#payment').val();
			 var due = $('#total').val();
			 var date = $('#date').val();
			 
			
			 $('#printdiv td').css('width','332px');
			 
			 $("#cust_add").show();
			 
			 $('#prodlistDiv').css("width","330px").css("height","").css("clear","float").css("background","#FFF").css("overflow","");
			 
			 $('#prodlist').css("width","330px");
			 
			 $('#logoimage').css("display","none");
			 
			 $('#company').css("font-size","26px");
			 
			 $('#printdiv').append("<table id='printRest' style='width:332px; border-collapse: collapse;'><tr><td>Total Tk: </td><td>"+amount+"</td><td> Discount: </td><td>"+vat+"</td></tr><tr><td>All Total: </td><td>"+scharge+"</td><td>Recieved: </td><td>"+discount+"</td></tr><tr><td> Due: </td><td>"+due+"</td><td> payment: </td><td>"+payment+"</td></tr><tr><td> Date: </td><td>"+date+"</td><td> &nbsp; </td><td>&nbsp;</td></tr></table>");
			
			 $("#printRest tr td").css('font-size','12px').css('border', '1px solid #000').css('border-collapse', 'collapse');
			 			               
			 $('#printdiv').append('<table style="width:332px; margin: 10px auto;"><tr><td style="text-align:center;">Thanks For Business</td></tr></table>');
            
               //////////////printReceipt///////////
			 
				var prtContent = document.getElementById("printdiv");
				var WinPrint = window.open('', '', 'left=0,top=0, toolbar=0,scrollbars=0,status=0');
				WinPrint.document.write(prtContent.innerHTML);
				WinPrint.document.close();
				WinPrint.focus();
				WinPrint.print();
				WinPrint.close();
        }
        
        function rePrintPos(invoice, company, company_add, tcname, tcphone, trow, amount, vat, scharge, discount, gtotal, payment, due, date){
            
             $('#printdiv').css('width', '332px');
            
             $('#print_add').css('text-align','center');
             
             $('#print_add').css('width', '332px');
            
			 $('#print_add').show();
			 
			 $('#logoimage').css("display","none");
			 
			 $('#company').css("font-size","26px");
			 
			 $('#company').html(company);
		     
		     $('#company_add').html(company_add);
			
             $("#mid_section").show();
             
             $('#mid_section').css('width', '332px');
             
             $("#cust_add").show();
	 		    
	 		 $("#cust_add").append("Customer: "+tcname+"<br>");
             $("#cust_add").append("Phone: "+tcphone+"<br>");
             $("#cust_add").append("Invoice: "+invoice);
             $("#cust_add").append(" &nbsp; ");
		     
		     $("#prodlist").css('border-collapse','collapse');
		
		     $("#prodlist tbody tr").each(function() {
		          
		           $(this).find("th:eq(4)").remove();
             });
            
             $("#prodlist").append(trow);
             
             $("#prodlist th").css('font-size','14px');
		     
		     $("#prodlist td").css('font-size','14px').css('border','1px solid #000');
    
			 $('#prodlistDiv').css("width","330px").css("height","").css("clear","float").css("background","#FFF").css("overflow","");
			 
			 $('#prodlist').css("width","330px");
			
			 $('#printdiv').append("<table id='printRest' style='width:332px; border-collapse: collapse;'><tr><td>Total Tk: </td><td>"+amount+"</td><td> Discount: </td><td>"+discount+"</td></tr><tr><td>Vat: </td><td>"+vat+"</td><td> SCharge: </td><td>"+scharge+"</td></tr><tr><td>All Total: </td><td>"+gtotal+"</td><td>Recieved: </td><td>"+discount+"</td></tr><tr><td> Due: </td><td>"+payment+"</td><td> payment: </td><td>"+due+"</td></tr><tr><td> Date: </td><td>"+date+"</td><td> &nbsp; </td><td>&nbsp;</td></tr></table>");
			
			 $("#printRest tr td").css('font-size','12px').css('border', '1px solid #000').css('border-collapse', 'collapse');
			 			               
			 $('#printdiv').append('<table style="width:332px; margin: 10px auto;"><tr><td style="text-align:center;">Thanks For Business</td></tr></table>');
            
               //////////////printReceipt///////////
			 
				var prtContent = document.getElementById("printdiv");
				var WinPrint = window.open('', '', 'left=0,top=0, toolbar=0,scrollbars=0,status=0');
				WinPrint.document.write(prtContent.innerHTML);
				WinPrint.document.close();
				WinPrint.focus();
				WinPrint.print();
				WinPrint.close();
        }
            
    </script>
@stop

<style>
    
        .custom-modal{
            position: fixed; 
            left: 0; 
            top: 50px; 
            width: 100%; 
            height: 100%; 
            background-color: #e6e6e6; 
            z-index:999; 
            display: none;
        }
        
        #printRest{
            width: 330px;
        }
        
        #printRest tr td{
            font-size: 12px;
            border: 1px solid #000;
        }
        
        .sugg-list {
            width: 100%;
            background-color: #e6e6e6;
            padding: 0;
        }
        
        .sugg-list li{
            width: 100%;
            border-bottom: #FFF;
            color: #6a6a6a;
            list-style-type: none;
            padding: 5px;
        }
        
        .sugg-list li:hover{
            width: 100%;
            background-color: #006fd2;
            color: #FFF;
            padding: 0;
        }
    
        .custom-table{

            width: 100%;
            border-collapse: collapse;
        }
        
        .custom-table tr th{
            background-color: #1bcfb4;
            color: #FFF;
            text-align: center;
            padding: 5px;
        }
        
        .custom-table tr td{
            padding: 5px;
            border: 1px solid #e6e6e6;
            text-align: center;
            font-size: 14px;
        }
        
        .custom-text{
            
            width: 150px;
            border: 1px solid #e6e6e6;
            border-radius: 2px;
            outline: none;
            padding: 5px;
            box-sizing: border-box;
            text-align: center;
        }
        
        .custom-text:focus{
            border-color: dodgerBlue;
        }

        .card .card-body {
            padding: 0.5rem 0.5rem !important;
        }
        
        .content-wrapper {
            
            padding: 0.25rem 0.25rem !important;
        }
    
        .box-body {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            padding: 10px;
            background-color: #FFF;
        }
        
        .box.box-success {
            border-top-color: #6da252;
        }
        
        .input-group .input-group-addon {
            border-radius: 0;
            border-color: #d2d6de;
            background-color: #fff;
        }
        .input-group-addon:first-child {
            border-right: 0;
                border-right-color: currentcolor;
        }
        .input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child > .btn, .input-group-btn:first-child > .btn-group > .btn, .input-group-btn:first-child > .dropdown-toggle, .input-group-btn:last-child > .btn-group:not(:last-child) > .btn, .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .input-group-addon {
            min-width: 41px;
        }
        .input-group-addon {
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1;
            color: #555;
            text-align: center;
            background-color: #eee;
            border: 1px solid #ccc;
            border-top-color: rgb(204, 204, 204);
            border-right-color: rgb(204, 204, 204);
            border-right-style: solid;
            border-right-width: 1px;
            border-bottom-color: rgb(204, 204, 204);
            border-left-color: rgb(204, 204, 204);
            border-radius: 4px;
        }
        .input-group-addon, .input-group-btn {
            width: 1%;
            white-space: nowrap;
            vertical-align: middle;
        }
        .input-group .form-control, .input-group-addon, .input-group-btn {
            display: table-cell;
        }
        
        .select2-hidden-accessible {
            border: 0 !important;
            clip: rect(0 0 0 0) !important;
            height: 1px !important;
            margin: -1px !important;
            overflow: hidden !important;
            padding: 0 !important;
            position: absolute !important;
            width: 1px !important;
        }
        
        .input-group-btn > .btn {
            position: relative;
        }
        
        .btn-icon {
            height: 34px;
        }
        
        .form-group .select2-container {
            width: 100% !important;
        }
        
        .select2-container {
            box-sizing: border-box;
            display: inline-block;
            margin: 0;
            position: relative;
            vertical-align: middle;
        }
        
        .form-group .select2-container .select2-selection--single {
            height: 34px;
            border: 1px solid #d2d6de;
        }
        .form-group .select2-container--default .select2-selection--single {
            border-radius: 0px;
        }
        
        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 28px;
            user-select: none;
            -webkit-user-select: none;
        }
        .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
            border: 1px solid #d2d6de;
            border-radius: 0;
            padding: 6px 12px;
            height: 34px;
        }
        
        .form-group .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 30px;
        }
        
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 20px;
        }
        
        .form-group .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #555 transparent transparent transparent;
        }
        
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #888 transparent transparent transparent;
            border-style: solid;
            border-width: 5px 4px 0 4px;
            height: 0;
            left: 50%;
            margin-left: -4px;
            margin-top: -2px;
            position: absolute;
            top: 50%;
            width: 0;
        }
        
        .active{
            color: #FF0;
            background-color: #FFF;
        }
        
        #tblTotal tr td{
            border-top: 0;
        }
           
        .fancy-file {
            display: block;
            position: relative;
        }
        
        .fancy-file div {
            position: absolute;
            top: -1px;
            left: 0px;
            z-index: 1;
            height: 36px;
        }
        
        .fancy-file input[type="text"], .fancy-file button, .fancy-file .btn {
            display: inline-block;
            margin-bottom: 0;
            vertical-align: middle;
        }
        
    }

</style>
