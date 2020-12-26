@extends('admin.pos.master')
        
@section('content')

<div class="content-wrapper">
    <div class="row">
      <div class="col-12">
             <div class="card">
                <div class="card-header">
                    <h3>Purchase Report</h3>
                </div>
                <div class="card-body custom-table">
                    <form action="get_purchase_report_date" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-2">
                                <label>Date From</label>
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control" name="stdate" id="stdate">
                            </div>
                            <div class="col-2">
                                <label>Date To</label>
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control" name="enddate" id="enddate">
                            </div>
                            <div class="col-2">
                                <input type="submit" class="btn btn-success btn-lg" id="search" value="Search">
                            </div>
                        </div>
                    </form>
                    
                    
                        
                    <table class="custom-table purchase-table" style="display:none;">
                        <tr><th>Date</th><th>Invoice</th><th>Supplier</th><th>Supp Invocie</th><th>Discount</th><th>Amount</th><th>Payment</th><th>Total</th><th>Action</th></tr>
                        
                    </table>
                        
                    
                    
                </div>
             </div>
      </div>
    </div>
    
    <div class="row pos_div" style="position: absolute; top: 10px;width: 60%; margin: 0 auto; background: #FFF; height:600px; overflow-y:auto; padding: 10px; z-index: 999999; display: none;">
        
        <div class="col-12" style="position:relative">
            
            <button class="btn btn-primary close" style="position:absolute; top: 10px; right: 10px;">X</button>
            
            <!-------------------------------->
                                    
                    <div id="printdiv" style="font-family:Franklin Gothic Medium; ">
                							
                		<table id="print_add" style="width: margin: 0px auto; padding: 10px; text-align:left; display:none;">
                			<tr>
                			    <td style='width:70%;'>
                							
                        			<span id="company" style='font-size:42px'><?php echo "Company Name";?></span><br />
                        			
                        				<span style='font-size:16px' id="company_add"><?php echo "Street Name"; ?></span><br />
                        							
                        				<!--<span style='font-size:14px'><b>Contact: 01XXXXXXXXX, Contact: 01XXXXXXXXX</b></span>-->
                    							
                				</td>
                				<td id="logoimage" style='width:30%; text-align:right;'>
                						            
                				    <!--<img src='/images/logo_ccb.png' style='width:100px; height:auto;'>-->
                						            
                				</td>
                			</tr>
                		</table>
                						
                						
                		<table id="mid_section" style="width:100%; font-size:16px; display:none;">
                						    
                		    <tr><td style="text-align:center; font-size:22px" colspan="2"><b>SUPPLIER BILL</b></td></tr>
                						    
                		    <tr>
                				<td id="cust_add" style="width: 50%; padding-left:10px;"></td>
                        		<td id="others_info" style="text-align: right;"></td>
                    		</tr>
                    						
                    	</table>
                                        
                        <div id="prodlistDiv" class="row" style="margin: 10px 0;">
                            <div class="col-12" style="padding-right: 0 !important; padding-left: 0 !important;">
                                <table id="prodlist" class="price-table custom-table" style="">
                                    <tr><th style="width: 30%;">Item</th><th style="width: 20%;">price</th><th style="width: 20%;">Qty</th><th style="width: 20%;">Total</th><th style="width: 10%;">Delete</th></tr>
                                </table>
                            </div>
                        </div>
                               
                        <table id="bottom_section" style="margin-top:40px; width: 94%; font-size:16px; display:none;">
                		    <tr>
                		        <td id="bottom_left" style="width:70%; padding-left:30px;"></td>
                        		<td id="bottom_right" style="width:30%;"></td>
                    		</tr>
                    	</table>
                                        
                        <table id="footer_section" style="margin-top:40px; width: 94%; font-size:16px; display:none;">
                		    <tr>
                				<td id="footer1" style="text-align:left; padding:20px;"></td>
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
            
            <button class="btn btn-success btn-lg print" style="margin-top: 20px;"> Print</button>    
            
            
        </div>
    </div>
    
</div>
@endsection

@section('page-js-script')

<script type="text/javascript">

    $(document).ready(function(){
        
        $( function() {
            $( "#stdate" ).datepicker({dateFormat: 'yy-mm-dd' });
        } );
        
        $( function() {
            $( "#enddate" ).datepicker({dateFormat: 'yy-mm-dd' });
        } );
        
        
        $('#search').on('click', function(e){
            
            e.preventDefault();
            
            var stdate = $('#stdate').val();
            var enddate = $('#enddate').val();
        			
        	var formData = new FormData();
        	    formData.append('stdate', stdate);
        	    formData.append('enddate', enddate);
        			
        	    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        			
                $.ajax({
            		  url: "{{ URL::route('get_purchase_report_date') }}",
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
                          $('.purchase-table').show();
                          $('.purchase-table td').remove();
                          $('.purchase-table tr:last').after(ts.responseText);
                          
                          //alert(ts.responseText)
                      },
                      success: function(data){
                         
                          alert(data);
                      }
            		   
                }); 
        });
        
        
        $('body').on('click', '.delete', function(){
            
            if(confirm("Are you Sure to Delete?")){
                
                var purinv = $(this).closest('tr').find('.purinv').html();
                
                var formData = new FormData();
        	        formData.append('purinv', purinv);
        	        
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        			
                $.ajax({
            		  url: "{{ URL::route('delete_purchase')}}",
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
                          
                          alert("Purchase Deleted Successfully!!");
                          location.reload();
                      },
                      success: function(data){
                         
                          alert(data);
                      }
                }); 
                
            }else{
                e.preventDefault();
            }
            
        });
        
                
        $('body').on('click', '.view', function(){
            
            
                        // var s_text = $(this).find('.purinv').html();
                        var s_text = $(this).closest('tr').find('.purinv').html();
                			
                		var formData = new FormData();
                			formData.append('s_text', s_text);
                			
                			$.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                			
                    	$.ajax({
                    		  url: "{{ URL::route('get_purchase_invoice_details') }}",
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
                                  
                                    alert(ts.responseText);
                                    
                                    
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
                                 var tcname = obj.supp_name;
                                 var tcphone = obj.supp_phone;
                                 var amount = obj.amount;
                                 var discount = obj.discount;
                                 var total = obj.total;
                                 var payment = obj.payment;
                                 var date = obj.date;
                                 
                                 ////////////////////////////////////////
                                 
                                 $('.pos_div').show();
            
                                 $('#print_add').css('width','100%').css('text-align','center');
                    		    
                    			 $('#print_add').show();
                    			 
                    			 $('#logoimage').css("display","none");
                    			 
                    			 $('#company').css("font-size","26px");
                    			 
                    			 $('#company').html(company);
                    		     
                    		     $('#company_add').html(company_add);
                    			
                                 $("#mid_section").show();
                                 
                                 $("#cust_add").show();
                    	 		    
                    	 		 $("#cust_add").append("Supplier: "+tcname+"<br>");
                                 $("#cust_add").append("Phone: "+tcphone+"<br>");
                                 $("#cust_add").append("Memo: "+invoice);
                                 $("#cust_add").append(" &nbsp; ");
                    		     
                    		     $("#prodlist").css('border-collapse','collapse');
                    		
                    		     $("#prodlist tbody tr").each(function() {
                    		          
                    		           $(this).find("th:eq(4)").remove();
                                 });
                                
                                 $("#prodlist").append(trow);
                                 
                                 $("#prodlist th").css('font-size','14px');
                    		     
                    		     $("#prodlist td").css('font-size','14px').css('border','1px solid #000');
                        
                    			 $('#prodlistDiv').css("height","").css("clear","float").css("background","#FFF").css("overflow","");
                    			 
                    			
                    			 $('#printdiv').append("<table class='footer-table' style='border-collapse: collapse; width:100%;' border='1'><tr><td>Total Tk: </td><td>"+amount+"</td><td> Discount: </td><td>"+discount+"</td></tr><tr></tr><tr><td>All Total: </td><td>"+total+"</td><td>Recieved: </td><td>"+discount+"</td></tr><tr><td> Payment: </td><td>"+payment+"</td><td> Date: </td><td>"+date+"</td></tr></table>");
                    			
                    
                    			 $("#printRest tr td").css('font-size','12px').css('border', '1px solid #000').css('border-collapse', 'collapse');
                    			 
                                 
                              }
                    		   
                    	    });            
            
            
        });
        
        $('.close').click(function(){
            
            $('#cust_add').html("");
            
            $("#prodlist td").remove();
            
            $(".footer-table td").remove();
            
            $('.pos_div').hide();
            
        });
        
        $('.print').click(function(){
            
            $('#print_add').css('width', '332px');
            
            $('#mid_section').css('width', '332px');
            
            $('#prodlist').css('width', '332px');
            
            $('#prodlist td').css('font-size', '12px');
            
            $('.footer-table').css('width', '332px');
            
            $('.footer-table td').css('font-size', '12px');
            
            Print();
            
            location.reload();
        });
        
    });
    
    
    function Print(){
            
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