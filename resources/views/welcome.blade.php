@extends('layouts.header')

@section('content')
    <!-- Hero Section Start -->
    <div class="hero-section section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!-- Header Category -->
                    <div class="hero-side-category">
                        <!-- Category Toggle Wrap -->
                        <div class="category-toggle-wrap">
                            <!-- Category Toggle -->
                            <button class="category-toggle"><i class="ti-menu"></i> Categories</button>
                        </div>

                        <!-- Category Menu -->
                        <nav class="category-menu category-menu-5">
                            <ul>
                                <?php
                                    $length = count($subMenuArray);
                                    for($i=0; $i< $length; $i++){
                                        echo $subMenuArray[$i];
                                    } 
                                ?>
                            </ul>
                        </nav>

                    </div><!-- Header Bottom End -->

                    <!-- Hero Slider Start -->
                    <div class="hero-slider hero-slider-five fix">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                @foreach($banners as $banner)
                                    <div class="carousel-item @if($loop->first) active @endif">
                                        <img class="d-block w-100" src="/images/banners/{{$banner->image}}" alt="{{$banner->title}}">
                                    </div>
                                @endforeach
                            </div>
                          </div>

                    </div><!-- Hero Slider End -->
                </div>
            </div>
        </div>
    </div><!-- Hero Section End -->

    <!-- Feature Product Section Start -->
    <div class="categories section mt-50 mb-40">
        <div class="container-fluid">
            <div class="col-12 mb-20">
                <div class="section-title-one" data-title="FEATURED ITEMS"><h1>BROWSE CATEGORIES</h1></div>
            </div><!-- Section Title End -->
            <div class="col-12">
                <div class="dcategories">
                    <div class="row">
                        @foreach($randomCats as $cat)
                        <div class="col-md-2 col-6">
                            <div class="cat-inner">
                                <a href="/category/{{$cat->url}}" class="w-100"><div class="single-cat">
                                    <div class="cat-img">
                                        @if($cat->image != NULL)
                                        <img src="/images/categories/{{$cat->image}}" alt="">
                                        @else
                                        <img src="/images/no-image.jpg" alt="">
                                        @endif
                                    </div>
                                    <div class="cat-title">
                                        <p>{{$cat->name}}</p>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Feature Product Section End -->

    <!-- Feature Product Section Start -->
    <div class="product-section section mt-50 mb-40">
        <div class="container-fluid">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-12 mb-20">
                    <div class="section-title-one" data-title="FEATURED ITEMS"><h1>BEST SALE PRODUCT</h1></div>
                </div><!-- Section Title End -->
                <!-- Product Tab Filter Start -->
                <div class="col-12">
                    <!-- Product Slider Wrap Start -->
                    <div class="product-slider-wrap product-slider-arrow-two">
                        <!-- Product Slider Start -->
                        <div class="product-slider product-slider-4-full">
                            @foreach($bestSelling as $best)
                            <div class="col pb-20 pt-10">
                                <!-- Product Start -->
                                <div class="ee-product">
                                    <!-- Image -->
                                    <div class="image">
                                        @if($best->product_img == NULL)
                                        <a href="products/{{$best->id}}" class="img"><img src="/images/no-image.jpg" alt="Product Image"></a>
                                        @else
                                        <a href="products/{{$best->id}}" class="img"><img src="/images/products/{{$best->product_img}}" alt="Product Image"></a>
                                        @endif
                                        <div class="wishlist-compare">
                                            <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                        </div>
                                        <a id="ajaxIID" href="/products/{{$best->id}}" data-id="{{$best->id}}" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                                    </div>

                                    <!-- Content -->
                                    <div class="content">
                                        <!-- Category & Title -->
                                        <div class="category-title">
                                            <a href="#" class="cat">Laptop</a>
                                            <h5 class="title"><a href="/products/{{$best->id}}">{{$best->product_name}}</a></h5>
                                        </div>
                                        <!-- Price & Ratting -->
                                        <div class="price-ratting">
                                            <h5 class="price">
                                                @if($best->after_pprice)
                                                BDT-{{$best->after_pprice}}
                                                @else
                                                BDT-{{$best->before_price}}
                                                @endif
                                            </h5>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Product End -->
                            </div>
                            @endforeach
                        </div><!-- Product Slider End -->
                    </div>
                    <!-- Product Slider Wrap End -->
                </div><!-- Product Tab Filter End -->
            </div>
        </div>
    </div><!-- Feature Product Section End -->

    <!-- Most Popular Product Section Start -->
    <div class="product-section section mb-40">
        <div class="container-fluid">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-12 mb-20">
                    <div class="section-title-one" data-title="FEATURED ITEMS"><h1>MOST POPULAR PRODUCT</h1></div>
                </div><!-- Section Title End -->
                <!-- Product Tab Filter Start -->
                <div class="col-12">
                    <!-- Product Slider Wrap Start -->
                    <div class="product-slider-wrap product-slider-arrow-two">
                        <!-- Product Slider Start -->
                        <div class="product-slider product-slider-4-full">
                            @foreach($mostPopular as $most)
                            <div class="col pb-20 pt-10">
                                <!-- Product Start -->
                                <div class="ee-product">
                                    <!-- Image -->
                                    <div class="image">
                                        @if($most->product_img == NULL)
                                        <a href="products/{{$most->id}}" class="img"><img src="/images/no-image.jpg" alt="Product Image"></a>
                                        @else
                                        <a href="products/{{$most->id}}" class="img"><img src="/images/products/{{$most->product_img}}" alt="Product Image"></a>
                                        @endif
                                        <div class="wishlist-compare">
                                            <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                        </div>
                                        <a href="/products/{{$most->id}}" data-id="{{$most->id}}" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                                    </div>

                                    <!-- Content -->
                                    <div class="content">
                                        <!-- Category & Title -->
                                        <div class="category-title">
                                            <a href="#" class="cat">Laptop</a>
                                            <h5 class="title"><a href="/products/{{$best->id}}">{{$most->product_name}}</a></h5>
                                        </div>
                                        <!-- Price & Ratting -->
                                        <div class="price-ratting">
                                            <h5 class="price">{{$most->after_pprice}}
                                                @if($most->after_pprice)
                                                BDT-{{$most->after_pprice}}
                                                @else
                                                BDT-{{$most->before_price}}
                                                @endif
                                            </h5>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Product End -->
                            </div>
                            @endforeach
                        </div><!-- Product Slider End -->
                    </div>
                    <!-- Product Slider Wrap End -->
                </div><!-- Product Tab Filter End -->
            </div>
        </div>
    </div><!-- Most Popular Product Section End -->

    <!-- Feature Product Section Start -->
    <div class="product-section section mb-70">
        <div class="container-fluid">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-12 mb-40">
                    <div class="section-title-one" data-title="FEATURED ITEMS"><h1>FEATURED ITEMS</h1></div>
                </div><!-- Section Title End -->
                
                <!-- Product Tab Filter Start -->
                <div class="col-12 mb-30">
                    <div class="product-tab-filter">
                        <!-- Tab Filter Toggle -->
                        <button class="product-tab-filter-toggle">showing: <span></span><i class="icofont icofont-simple-down"></i></button>
                        
                        <!-- Product Tab List -->
                        <ul class="nav product-tab-list">
                            @foreach($categories as $cat)
                            <li><a class="@if($loop->first)active @endif" data-toggle="tab" href="#tab-{{$cat->id}}">{{$cat->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Product Tab Filter End -->
                
                <!-- Product Tab Content Start -->
                <div class="col-12">
                    <div class="tab-content">
                        <!-- Tab Pane Start -->
                        <?php
                            $length = count($featuredArray);
                            for($i=0; $i< $length; $i++){
                                echo $featuredArray[$i];
                            } 
                        ?>
                        <!-- Tab Pane End -->
                    </div>
                </div><!-- Product Tab Content End -->
            </div>
        </div>
    </div><!-- Feature Product Section End -->

    <!-- Indivisual collection -->
    <div class="collection section mb-80">
        <div class="container-fluid">
            <!-- Section Title Start -->
            <div class="col-12 mb-20">
                <div class="section-title-one" data-title="BEST DEALS"><h1>WINTER COLLECTION </h1></div>
            </div><!-- Section Title End -->
            <div class="col-12">
                <div class="row">
                    <div class="col-md-3 p-0">
                        <div class="card bg-light rounded-0">
                            <div class="card-body p-2 product-slider-arrow-two">
                                <!-- Product Slider Start -->
                                <div class="product-slider category-slider">
                                    <div class="col text-center">
                                        <a href="#" class="col-12">
                                            <img src="images/brands/brand-1.png" title="" alt="" class="m-auto p-2" style="max-width:100%; height:70px;">
                                        </a>
                                        <a href="#" class="col-12">
                                            <img src="images/brands/brand-2.png" title="" alt="" class="m-auto p-2" style="max-width:100%; height:70px;">
                                        </a>
                                        <a href="#" class="col-12">
                                            <img src="images/brands/brand-3.png" title="" alt="" class="m-auto p-2" style="max-width:100%; height:70px;">
                                        </a>
                                        <a href="#" class="col-12">
                                            <img src="images/brands/brand-3.png" title="" alt="" class="m-auto p-2" style="max-width:100%; height:70px;">
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <a href="#" class="col-12">
                                            <img src="images/brands/brand-7.png" title="" alt="" class="m-auto p-2" style="max-width:100%; height:70px;">
                                        </a>
                                        <a href="#" class="col-12">
                                            <img src="images/brands/brand-8.png" title="" alt="" class="m-auto p-2" style="max-width:100%; height:70px;">
                                        </a>
                                        <a href="#" class="col-12">
                                            <img src="images/brands/brand-9.png" title="" alt="" class="m-auto p-2" style="max-width:100%; height:70px;">
                                        </a>
                                    </div>
                                </div><!-- Product Slider End -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 p-0">
                        <div class="all-brands">
                            <div class="card rounded-0">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6 product-cat-box text-center col-md-3 p-0" style="border-right: 1px solid #edebef;border-bottom: 1px solid #edebef;">
                                            <a href="#" class="p-3">
                                                <img style="max-width: 100%; padding: 10px 20px;" src="images/womens.png" alt="">
                                                <p>Hoodie</p>
                                            </a>
                                        </div>
                                        <div class="col-6 product-cat-box text-center col-md-3 p-0" style="border-right: 1px solid #edebef;border-bottom: 1px solid #edebef;">
                                            <a href="#" class="p-3">
                                                <img style="max-width: 100%; padding: 10px 20px;" src="images/womens.png" alt="">
                                                <p>Pants</p>
                                            </a>
                                        </div>
                                        <div class="col-6 product-cat-box text-center col-md-3 p-0" style="border-right: 1px solid #edebef;border-bottom: 1px solid #edebef;">
                                            <a href="#" class="p-3">
                                                <img style="max-width: 100%; padding: 10px 20px;" src="images/womens.png" alt="">
                                                <p>Hoodie</p>
                                            </a>
                                        </div>
                                        <div class="col-6 product-cat-box text-center col-md-3 p-0" style="border-right: 1px solid #edebef;border-bottom: 1px solid #edebef;">
                                            <a href="#" class="p-3">
                                                <img style="max-width: 100%; padding: 10px 20px;" src="images/womens.png" alt="">
                                                <p>Hoodie</p>
                                            </a>
                                        </div>
                                        <div class="col-6 product-cat-box text-center col-md-3 p-0" style="border-right: 1px solid #edebef;border-bottom: 1px solid #edebef;">
                                            <a href="#" class="p-3">
                                                <img style="max-width: 100%; padding: 10px 20px;" src="images/womens.png" alt="">
                                                <p>Hoodie</p>
                                            </a>
                                        </div>
                                        <div class="col-6 product-cat-box text-center col-md-3 p-0" style="border-right: 1px solid #edebef;border-bottom: 1px solid #edebef;">
                                            <a href="#" class="p-3">
                                                <img style="max-width: 100%; padding: 10px 20px;" src="images/womens.png" alt="">
                                                <p>Hoodie</p>
                                            </a>
                                        </div>
                                        <div class="col-6 product-cat-box text-center col-md-3 p-0" style="border-right: 1px solid #edebef;border-bottom: 1px solid #edebef;">
                                            <a href="#" class="p-3">
                                                <img style="max-width: 100%; padding: 10px 20px;" src="images/womens.png" alt="">
                                                <p>Hoodie</p>
                                            </a>
                                        </div>
                                        <div class="col-6 product-cat-box text-center col-md-3 p-0" style="border-right: 1px solid #edebef;border-bottom: 1px solid #edebef;">
                                            <a href="#" class="p-3">
                                                <img style="max-width: 100%; padding: 10px 20px;" src="images/womens.png" alt="">
                                                <p>Hoodie</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Indivisual collection End -->

    <!-- Indivisual collection -->
    <div class="collection section mb-80">
        <div class="container-fluid">
            <!-- Section Title Start -->
            <div class="col-12 mb-20">
                <div class="section-title-one" data-title="BEST DEALS"><h1>WOMEN'S FASHION</h1></div>
            </div><!-- Section Title End -->
            <div class="col-12">
                <div class="row">
                    <div class="col-md-2 p-0" style="min-height: 190px;">
                        <div class="card bg-light rounded-0">
                            <div class="card-body p-2 product-slider-arrow-two">
                                <!-- Product Slider Start -->
                                <div class="product-slider category-slider">
                                    <div class="col text-center">
                                        <a href="#" class="col-12">
                                            <img src="images/brands/brand-1.png" title="" alt="" class="m-auto p-2" style="max-width:100%; height:70px;">
                                        </a>
                                        <a href="#" class="col-12">
                                            <img src="images/brands/brand-2.png" title="" alt="" class="m-auto p-2" style="max-width:100%; height:70px;">
                                        </a>
                                        <a href="#" class="col-12">
                                            <img src="images/brands/brand-3.png" title="" alt="" class="m-auto p-2" style="max-width:100%; height:70px;">
                                        </a>
                                        <a href="#" class="col-12">
                                            <img src="images/brands/brand-3.png" title="" alt="" class="m-auto p-2" style="max-width:100%; height:70px;">
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <a href="#" class="col-12">
                                            <img src="images/brands/brand-7.png" title="" alt="" class="m-auto p-2" style="max-width:100%; height:70px;">
                                        </a>
                                        <a href="#" class="col-12">
                                            <img src="images/brands/brand-8.png" title="" alt="" class="m-auto p-2" style="max-width:100%; height:70px;">
                                        </a>
                                        <a href="#" class="col-12">
                                            <img src="images/brands/brand-9.png" title="" alt="" class="m-auto p-2" style="max-width:100%; height:70px;">
                                        </a>
                                    </div>
                                </div><!-- Product Slider End -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <img src="images/we.jpg" alt="" style="max-width: 100%;">
                    </div>
                    <div class="col-md-7 p-0" style="min-height: 190px;">
                        <div class="all-brands">
                            <div class="card rounded-0">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6 product-cat-box text-center col-md-4 p-0" style="border-right: 1px solid #edebef;border-bottom: 1px solid #edebef;">
                                            <a href="#" class="p-3">
                                                <img style="max-width: 100%; padding: 10px 20px;" src="images/womens.png" alt="">
                                                <p>Hoodie</p>
                                            </a>
                                        </div>
                                        <div class="col-6 product-cat-box text-center col-md-4 p-0" style="border-right: 1px solid #edebef;border-bottom: 1px solid #edebef;">
                                            <a href="#" class="p-3">
                                                <img style="max-width: 100%; padding: 10px 20px;" src="images/womens.png" alt="">
                                                <p>Pants</p>
                                            </a>
                                        </div>
                                        <div class="col-6 product-cat-box text-center col-md-4 p-0" style="border-right: 1px solid #edebef;border-bottom: 1px solid #edebef;">
                                            <a href="#" class="p-3">
                                                <img style="max-width: 100%; padding: 10px 20px;" src="images/womens.png" alt="">
                                                <p>Hoodie</p>
                                            </a>
                                        </div>
                                        <div class="col-6 product-cat-box text-center col-md-4 p-0" style="border-right: 1px solid #edebef;border-bottom: 1px solid #edebef;">
                                            <a href="#" class="p-3">
                                                <img style="max-width: 100%; padding: 10px 20px;" src="images/womens.png" alt="">
                                                <p>Hoodie</p>
                                            </a>
                                        </div>
                                        <div class="col-6 product-cat-box text-center col-md-4 p-0" style="border-right: 1px solid #edebef;border-bottom: 1px solid #edebef;">
                                            <a href="#" class="p-3">
                                                <img style="max-width: 100%; padding: 10px 20px;" src="images/womens.png" alt="">
                                                <p>Hoodie</p>
                                            </a>
                                        </div>
                                        <div class="col-6 product-cat-box text-center col-md-4 p-0" style="border-right: 1px solid #edebef;border-bottom: 1px solid #edebef;">
                                            <a href="#" class="p-3">
                                                <img style="max-width: 100%; padding: 10px 20px;" src="images/womens.png" alt="">
                                                <p>Hoodie</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Indivisual collection End -->

    <!-- Indivisual collection -->
    <div class="vv-section section pt-50 pb-50 bg-light">
        <div class="container-fluid">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-3 p-0">
                        <div class="brand-section-intro">
                            <div class="card rounded-0">
                                <div class="card-body pb-70 pt-70">
                                    <div class="text-center">
                                        <img src="images/brands/brand-1.png" alt=""> 
                                        <p class="mt-2"><strong>Brands of the Week</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 p-0">
                        <div class="all-brands">
                            <div class="card rounded-0">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6 col-md-2 p-0 border">
                                            <img style="max-width: 100%; padding: 10px 20px;" src="images/brands/brand-2.png" alt="">
                                        </div>
                                        <div class="col-6 col-md-2 p-0 border">
                                            <img style="max-width: 100%; padding: 10px 20px;" src="images/brands/brand-3.png" alt="">
                                        </div>
                                        <div class="col-6 col-md-2 p-0 border">
                                            <img style="max-width: 100%; padding: 10px 20px;" src="images/brands/brand-4.png" alt="">
                                        </div>
                                        <div class="col-6 col-md-2 p-0 border">
                                            <img style="max-width: 100%; padding: 10px 20px;" src="images/brands/brand-5.png" alt="">
                                        </div>
                                        <div class="col-6 col-md-2 p-0 border">
                                            <img style="max-width: 100%; padding: 10px 20px;" src="images/brands/brand-6.png" alt="">
                                        </div>
                                        <div class="col-6 col-md-2 p-0 border">
                                            <img style="max-width: 100%; padding: 10px 20px;" src="images/brands/brand-7.png" alt="">
                                        </div>
                                        <div class="col-6 col-md-2 p-0 border">
                                            <img style="max-width: 100%; padding: 10px 20px;" src="images/brands/brand-8.png" alt="">
                                        </div>
                                        <div class="col-6 col-md-2 p-0 border">
                                            <img style="max-width: 100%; padding: 10px 20px;" src="images/brands/brand-9.png" alt="">
                                        </div>
                                        <div class="col-6 col-md-2 p-0 border">
                                            <img style="max-width: 100%; padding: 10px 20px;" src="images/brands/brand-10.png" alt="">
                                        </div>
                                        <div class="col-6 col-md-2 p-0 border">
                                            <img style="max-width: 100%; padding: 10px 20px;" src="images/brands/brand-11.png" alt="">
                                        </div>
                                        <div class="col-6 col-md-2 p-0 border">
                                            <img style="max-width: 100%; padding: 10px 20px;" src="images/brands/brand-12.png" alt="">
                                        </div>
                                        <div class="col-6 col-md-2 p-0 border">
                                            <img style="max-width: 100%; padding: 10px 20px;" src="images/brands/brand-13.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Indivisual collection eND-->
<script>
$(document).ready(function(){
    $("body").on("click", "a.add-to-cart", function () {
        var id = $(this).data('id');
        var formData = new FormData();
        formData.append('id', id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/ajaxCart",
            method: 'post',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                $(this).addClass("added");
            },
            error: function(ts) {
                alert(ts.responseText);
            },
        });
    });
});
</script>
@endsection
