<?php 
  use App\Http\Controllers\Controller;
  $items = Controller::navCats();
  $userCart = Controller::cartData();
  $navBrands = Controller::navBrands();
  $settings = Controller::generalSettings();
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{$GenSettings->site_name}} - {{$GenSettings->site_tagline}}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/theme/{{$GenSettings->favicon}}">
        
        <!-- CSS ============================================ -->
       
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="{{ asset('css/icon-font.min.css') }}">
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
        <!-- jQuery JS -->
        <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
        <!-- Modernizer JS -->
        <script type="text/javascript" src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
        <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    </head>
<body>
    <!-- Mobile Navigation -->
    <nav class="navbar section mobile_bottom_part navbar-default desktop-none">
        <div class="row">
            <div class="col-3 text-center">
                <a href="/">
                    <i class="fa fa-home"></i>
                </a>
            </div>
            <div class="col-3 text-center">
                <a href="/shop/all">
                    <i class="fa fa-th-large"></i>
                </a>
            </div>
            <div class="col-3 text-center">
                <a href="/cart">
                    <i class="fa fa-shopping-bag"></i>
                </a>
            </div>
            <div class="col-3 text-center">
                <a href="/myaccount">
                    <i class="fa fa-user-circle"></i>
                </a>
            </div>
        </div>
    </nav>
    <!-- Mobile Navigation -->
    <!-- Header Section Start -->
    <div class="header-section section">
        <!-- Header Top Start -->
        <div class="header-top header-top-one header-top-border pt-10 pb-10">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-between">
    
                    <div class="col mt-10 mb-10 m-none">
                        <!-- Header Links Start -->
                        <div class="header-links">
                            <a href="/myaccount"><img src="/images/icons/car.png" alt="Car Icon"> <span>Track your order</span></a>
                            <a href="/myaccount"><img src="/images/icons/marker.png" alt="Car Icon"> <span>Locate Store</span></a>
                        </div><!-- Header Links End -->
                    </div>
    
                    <div class="col order-12 order-xs-12 position-relative order-lg-2 mt-10 mb-10">
                        <!-- Header Advance Search Start -->
                        <div class="header-advance-search">
                            <form method="post" action="/search" id="search_form" role="search">
                                @csrf
                                <div class="input"><input id="q" class="search_products" type="text" placeholder="Search your product" name="q"></div>
                                <div class="submit"><button type="submit"><i class="icofont icofont-search-alt-1"></i></button></div>
                            </form>
                            <!-- Search Results -->
                            <div class="prod_list_div shadow" style="position: absolute; top: 46px; left: 0px; z-index: 999; background: #fff;border-top-right-radius: 0;border-top-left-radius: 0;width: 100%;">
                            </div>

                        </div>
                        <!-- Header Advance Search End -->
                    </div>
    
                    <div class="col order-2 order-xs-2 order-lg-12 mt-10 mb-10 m-none">
                        <!-- Header Account Links Start -->
                        <div class="header-account-links">
                            <a href="/myaccount"><i class="icofont icofont-user-alt-7"></i> <span>my account</span></a>
                            <a href="/login_register"><i class="icofont icofont-login d-none"></i> <span>Login</span></a>
                        </div><!-- Header Account Links End -->
                    </div>
    
                </div>
            </div>
        </div>
        <!-- Header Top End -->
    
        <!-- Header Bottom Start -->
        <div class="header-bottom header-bottom-one header-sticky m-none">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-between">
                    <div class="col mt-15 mb-15">
                        <!-- Logo Start -->
                        <div class="header-logo">
                            <a href="/">
                                <img src="/images/theme/{{$GenSettings->logo_small}}" alt="House of Brands - Your trusted house of most common brands." width="220">
                                <img class="theme-dark" src="/images/theme/{{$GenSettings->logo_big}}" alt="House of Brands - Your trusted house of most common brands." width="220">
                            </a>
                        </div><!-- Logo End -->
                    </div>
    
                    <div class="col order-12 order-lg-2 order-xl-2 d-none d-lg-block">
                        <!-- Main Menu Start -->
                        <div class="main-menu">
                            <nav style="display: block;">
                                <ul>
                                    <li class="active"><a href="/">HOME</a>
                                    </li>
                                    <li><a href="/shop/all">Shop</a></li>
                                    <li><a href="#">BLOG</a></li>
                                    <li><a href="#">CONTACT</a></li>
                                </ul>
                            </nav>
                        </div><!-- Main Menu End -->
                    </div>
    
                    <div class="col order-2 order-lg-12 order-xl-12">
                        <!-- Header Shop Links Start -->
                        <div class="header-shop-links">
                            <!-- Compare -->
                            <a href="tel:+8801700999999" class="d-flex header-compare"><img src="/images/icons/feature-support-2.png" alt="" width="40" class="pr-2 m-auto"><h5>+8801700-999999 <br><span class="small">24/7 Support</span></h5></a>
                            <!-- Wishlist -->
                            <!-- <a href="wishlist.html" class="header-wishlist"><i class="ti-heart"></i> <span class="number">3</span></a> -->
                            <!-- Cart -->
                            <a href="/cart" class="header-cart"><i class="ti-shopping-cart"></i> <span class="number">{{$userCart->count()}}</span></a>
                        </div>
                        <!-- Header Shop Links End -->
                    </div>
                    
                    <!-- Mobile Menu -->
                    <div class="mobile-menu order-12 d-block d-lg-none col"></div>
    
                </div>
            </div>
        </div>
        <!-- Header BOttom End -->
    
    </div><!-- Header Section End -->
    
    <!-- Mini Cart Wrap Start -->                      
    <div class="mini-cart-wrap">
    
        <!-- Mini Cart Top -->
        <div class="mini-cart-top">    
        
            <button class="close-cart">Close Cart<i class="icofont icofont-close"></i></button>
            
        </div>
    
        <!-- Mini Cart Products -->
        <ul class="mini-cart-products">
            @if($userCart->count() > 0)
                @foreach($userCart as $cart)
                    <li>
                        <a href="/products/{{$cart->product_id}}" class="image">
                            <img src="/images/{{$cart->image}}" alt="Product">
                        </a>
                        <div class="content">
                            <a href="/products/{{$cart->product_id}}" class="title">{{$cart->product_name}}</a>
                            <span class="price">Price: BDT:{{$cart->price}}</span>
                            <span class="qty">Qty: {{$cart->quantity}}</span>
                        </div>
                        <a href="{{ url('/cart/delete-product/'.$cart->id) }}" class="remove"><i class="fa fa-trash-o"></i></a>
                    </li>
                @endforeach
            @else
                <div class="text-center text-danger">No product added to cart yet!</div>
            @endif
        </ul>
    
        <!-- Mini Cart Bottom -->
        <div class="mini-cart-bottom">    
            <?php $total_amount = 0;
                foreach($userCart as $item){
                    $total_amount = $total_amount + ($item->price * $item->quantity);
                }
            ?>
            <h4 class="sub-total">Total: <span>BDT: <?= $total_amount ?></span></h4>

            <div class="button">
                <a href="/checkout">CHECK OUT</a>
            </div>
            
        </div>
    
    </div><!-- Mini Cart Wrap End --> 
    
    <!-- Cart Overlay -->
    <div class="cart-overlay"></div>

    <div class="app-main">
      @yield('content')
    </div>

    @include('layouts.footer')

<script>
    var input = $("input[name=q]");
    input.focusin(function() {
        $(".header-advance-search").addClass("valid");
        $(".prod_list_div").show();
    });
    input.focusout(function() {
        $(".header-advance-search").removeClass("valid");
        // $(".prod_list_div").hide();
    });

    $(document).ready(function(){
        $(".search_products").keyup(function(e){
            if(e.which == 40 || e.which == 38){
                $(".search_products").blur();
                $('.product-list').find("li:first").focus().addClass('active').siblings().removeClass();
                $('.product-list').on('focus', 'li', function() {
                    $this = $(this);
                    $this.addClass('active').siblings().removeClass();
                    $this.closest('.product-list').scrollTop($this.index* $this.outerHeight());
                });
                $('.product-list').on('keydown', 'li', function(e) {
                    $this = $(this);
                    if (e.keyCode == 40) {            
                        $this.next().focus();
                        return false;
                    } else if (e.keyCode == 38) {        
                        $this.prev().focus();
                        return false;
                    }
                });
                $('.product-list').on('keyup', function(e){
                    if(e.which == 13){
                        var val = $(".active").attr("data-pname");
                        $('.search_products').val(val);
                        $(".search_products").focus();
                        $(".prod_list_div").hide();
                    }
                });         
                return false;
            }
                        
            var s_text = $(this).val();	
            if(s_text == ''){
                $('.prod_list_div').hide();
                return false;
            }
                        
            var formData = new FormData();
            formData.append('s_text', s_text);	
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                        
            $.ajax({
                url: "{{ URL::route('get_product') }}",
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
                    $('.prod_list_div').show();
                    $('.prod_list_div').html(ts.responseText);
                    //alert(ts.responseText);
                },
                success: function(data){
                    //var str = JSON.stringify(data, null, 4)
                    //var obj = JSON.parse(str);
                    //alert(data);
                }   
            });
        });
    });
</script>
</body>
</html>