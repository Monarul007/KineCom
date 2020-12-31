@extends('layouts.header')
@section('content')
    <!-- Page Banner Section Start -->
    <div class="page-banner-section section">
        <div class="page-banner-wrap row row-0 d-flex align-items-center">
            <!-- Page Banner -->
            <div class="col-lg-12 col-12 order-lg-2 d-flex align-items-center justify-content-center">
                <div class="page-banner">
                    <h1>My Account</h1>
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="/">HOME</a></li>
                            <li><a href="">Account Details Page</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Page Banner Section End -->

    <!-- Account Details Section -->
    <div class="cs-account section mt-50 mb-50">
        <div class="container">
            <div class="row mb-5">
				<div class="col-lg-3 p1 pr-1 mb-30">
                    <div class="card bg-gray p-3">
                        <div class="panel-heading no-title"> </div>
                        <div class="panel-body">
                            <?php if($user_info->image == null){
                                $pro_image = '<img alt="Profile Image" src="/images/man.jpg" style="max-width:100%;">';
                            }else{
                                $pro_image = '<img alt="Profile Image" src="/images/{{$user_info->image}}" style="max-width:100%;">';
                            }
                            ?>
                            <div class=""> <?= $pro_image ?> </div>
                            <h4 class="mb-2 mt-2">{{$user_info->billing_name}}</h4>
                            <p>Ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                            <div class="mgtp-20">
                                <table class="table table-sm table-striped table-hover">
                                    <tbody>
                                    <tr>
                                        <td style="width:60%;">Status</td>
                                        <td><span class="badge badge-success">{{$user_info->status}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Total Orders</td>
                                        <td><?= $ordCount; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Member Since</td>
                                        <td> {{ date('d-m-Y', strtotime($user_info->since))}} </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="col-lg-9 mb-5 mb-lg-0">
                    <ul class="nav nav-tabs-three" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile Details<span class="menu-active"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">My Orders
                            <span class="menu-active"></span></a>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div>      
                                    <div class="pt-2">
                                        <div class="col-12 p-1 mb-3">
                                            <div class="card">
                                                <div class="card-header">Billing Info<div class="vd_info tr"> <a type="button" class="" data-toggle="modal" data-target="#billingModal"> <i class="fa fa-pencil append-icon"></i> Edit </a> </div></div>
                                                <div class="card-body">
                                                    <div class="row mgbt-xs-0">
                                                        <label class="col-5 control-label">Billing Name:</label>
                                                        <div class="col-7 controls">{{$user_info->billing_name}}</div>
                                                    </div>
                                                    <div class="row mgbt-xs-0">
                                                        <label class="col-5 control-label">Billing Phone:</label>
                                                        <div class="col-7 controls">{{$user_info->billing_phone}}</div>
                                                    </div>
                                                    <div class="row mgbt-xs-0">
                                                        <label class="col-5 control-label">Billing Email:</label>
                                                        <div class="col-7 controls">{{$user_info->email}}</div>
                                                    </div>
                                                    <div class="row mgbt-xs-0">
                                                        <label class="col-5 control-label">Billing Address:</label>
                                                        <div class="col-7 controls">{{$user_info->billing_address}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="billingModal" tabindex="-1" role="dialog" aria-labelledby="billingModal" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('updateBill')}}" method="post" enctype="multipart/form-data">
                                                            @csrf     <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Billing Info</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="alert alert-success alert-block" style="display:none;" id="CartMsg"></div>
                                                                <div class="form-group">
                                                                    <label for="billName">Billing Name</label>
                                                                    <input name="billName" type="text" class="form-control" id="billName" value="{{$user_info->billing_name}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="billPhone">Billing Phone</label>
                                                                    <input name="billPhone" type="text" class="form-control" id="billPhone" value="{{$user_info->billing_phone}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="billAddress">Billing Address</label>
                                                                    <input name="billAddress" type="text" class="form-control" id="billAddress" value="{{$user_info->billing_address}}">
                                                                </div>
                                                                <!-- <div class="form-group">
                                                                    <label for="ProImg">Profile Image</label>
                                                                    <input name="ProImg" type="file" class="form-control" id="ProImg">
                                                                </div> -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-medium btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-medium btn-radius next">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 p-1">
                                            <div class="card">
                                                <div class="card-header">Shipping Info<div class="vd_info tr"> <a type="button" class="" data-toggle="modal" data-target="#shipModal"> <i class="fa fa-pencil append-icon"></i> Edit </a> </div></div>
                                                <div class="card-body">
                                                    <div class="row mgbt-xs-0">
                                                        <label class="col-5 control-label">Shipping Name:</label>
                                                        <div class="col-7 controls">{{$user_info->shipping_name}}</div>
                                                    </div>
                                                    <div class="row mgbt-xs-0">
                                                        <label class="col-5 control-label">Shipping Phone</label>
                                                        <div class="col-7 controls">{{$user_info->shipping_phone}}</div>
                                                    </div>
                                                    <div class="row mgbt-xs-0">
                                                        <label class="col-5 control-label">Shipping Email:</label>
                                                        <div class="col-7 controls">{{$user_info->email}}</div>
                                                    </div>
                                                    <div class="row mgbt-xs-0">
                                                        <label class="col-5 control-label">Shipping Address</label>
                                                        <div class="col-7 controls">{{$user_info->shipping_info}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="shipModal" tabindex="-1" role="dialog" aria-labelledby="shipModal" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('updateShipp')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Shipping Info</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="alert alert-success alert-block" style="display:none;" id="shipMSG"></div>
                                                                <div class="form-group">
                                                                    <label for="ShipName">Shipping Name</label>
                                                                    <input name="ShipName" type="text" class="form-control" id="ShipName" value="{{$user_info->shipping_name}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="shipPhone">Shipping Phone</label>
                                                                    <input name="shipPhone" type="text" class="form-control" id="shipPhone" value="{{$user_info->shipping_phone}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="shipAddress">Shipping Address</label>
                                                                    <input name="shipAddress" type="text" class="form-control" id="shipAddress" value="{{$user_info->shipping_info}}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-medium btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-medium btn-radius next2">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div>
                                    <br>
                                    <h4 class="mb-3">My All Orders</h4>
                                    <div class="table-responsive">
                                    <table class="table table-sm table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order Number</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $count = count($ord_array); 
                                        for($i = 0; $i < $count;){ 
                                            $j = $i;
                                            $j1 = $i+1;
                                            $j2 = $i+2;
                                            $j3 = $i+3;
                                            $j4 = $i+4;
                                    ?>
                                    <tr>
                                        <td><a href="{{route('Uinvoice',$ord_array[$j])}}"><?php echo $ord_array[$j]; ?></td>
                                        <td><?= $ord_array[$j1]; ?></td>
                                        <td><?= $ord_array[$j2]; ?></td>
                                        <td><?= $ord_array[$j3]; ?></td>
                                            <?php if($ord_array[$j3] == 'pending'){
                                                echo '<td><button class="btn btn-small btn-radius hover-theme" onclick="deleteConfirmation('.$ord_array[$j4].')">
                                                    <i class="fa fa-window-close"></i> Cancel Order
                                                </button>
                                                </td>';
                                            }else{
                                                echo '<td><a href="invoice/'.$ord_array[$j].'">View Order</a></td>';
                                            } ?>
                                    </tr>
                                    <?php $i= $i + 5; } ?>
                                    </table>
                                    </div>
                                </div>            
                        </div>
                    </div>
				</div>
			</div>
        </div>
    </div>
    
<!-- Account Details Section End-->
<script type="text/javascript">
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    function deleteConfirmation(id) {
        swal.fire({
            title: "Cancel?",
            text: "Please ensure and then confirm!",
            icon: 'warning',
            showCancelButton: !0,
            confirmButtonText: "Yes, cancel it!",
            cancelButtonText: "Don't cancel",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "{{url('/users/cancel_order')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            swal.fire("Done!", results.message, "success");
                        } else {
                            swal.fire("Error!", results.message, "error");
                        }
                        window.setTimeout(function(){ 
                            location.reload();
                        } ,3000);
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        });
    }

    $('.next').click(function(e){
        e.preventDefault();
        if($('#billName').val() == '' || $('#billPhone').val() == '' || $('#billAddress').val() == ''){
            alert("Billing information fields can't be empty!");
            return false;
        }
        $("#CartMsg").hide();
        var billName = $("#billName").val();
        var billPhone = $("#billPhone").val();
	    var billAddress = $("#billAddress").val();
        var ProImg = $("#ProImg").val();
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		$.ajax({
			url: "{{ URL::route('updateBill') }}",
			data:'billName=' + billName + '&billPhone=' + billPhone + '&billAddress=' + billAddress + '&ProImg' + ProImg,
			type:'post',
			success:function(response){
				$("#CartMsg").show();
				console.log(response);
				$("#CartMsg").html(response);
				window.setTimeout(function(){ 
                            location.reload();
                } ,2000);
			},
			error: function(ts) {         
                alert(ts.responseText);
            }
		});
    });

    $('.next2').click(function(e){
        e.preventDefault();
        if($('#ShipName').val() == '' || $('#shipPhone').val() == '' || $('#shipAddress').val() == ''){
            alert("Shipping information fields can't be empty!");
            return false;
        }
        $("#shipMSG").hide();
        var ShipName = $("#ShipName").val();
        var shipPhone = $("#shipPhone").val();
	    var shipAddress = $("#shipAddress").val();
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		$.ajax({
			url: "{{ URL::route('updateShipp') }}",
			data:'ShipName=' + ShipName + '&shipPhone=' + shipPhone + '&shipAddress=' + shipAddress,
			type:'post',
			success:function(response){
				$("#shipMSG").show();
				console.log(response);
				$("#shipMSG").html(response);
				window.setTimeout(function(){ 
                            location.reload();
                } ,2000);
			},
			error: function(ts) {         
                alert(ts.responseText);
            }
		});
    });
</script>
<style>
    .vd_info, .vd_info-menu {
        position: absolute;
        top: 10px;
        right: 18px;
        cursor: pointer;
    }
    .fade.in {
	background: none repeat scroll 0 0 rgba(0,0,0,0.5);
}
</style>
@endsection