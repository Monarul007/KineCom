@extends('layouts.header')
@section('content')
    <!-- Page Banner Section Start -->
    <div class="page-banner-section section">
        <div class="page-banner-wrap row row-0 d-flex align-items-center ">
            <!-- Page Banner -->
            <div class="col-lg-12 col-12 order-lg-2 d-flex align-items-center justify-content-center">
                <div class="page-banner">
                    <h1>Product Details</h1>
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="#">HOME</a></li>
                            <li><a href="/shop/all">Products</a></li>
                            <li><a href="">{{$singleProduct->product_name}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Page Banner Section End -->

    <!-- Single Product Section Start -->
    <div class="product-section section mt-20 mb-90">
        <div class="container">
                    @if ($error = Session::get('flash_message_error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $error }}</strong>
                        </div>
                    @endif
                    @if ($success = Session::get('flash_message_success'))
                        <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>{{ $success }}</strong>
                        </div>
                    @endif
            <form action="{{url('add-cart')}}" method="post" name="addCartForm" id="product_addtocart_form" enctype="multipart/form-data">
                @csrf
                <div class="row mb-40">
                        <input type="hidden" name="inputId" value="{{$singleProduct->id}}">
                        <input type="hidden" name="inputName" value="{{$singleProduct->product_name}}">
                        <input type="hidden" name="inputCode" value="{{$singleProduct->product_code}}">
                        <input type="hidden" name="inputColor" value="{{$singleProduct->product_color}}">
                        <input type="hidden" name="inputPrice" id="inputPrice" value="{{ $singleProduct->after_pprice }}">
                        <input type="hidden" name="inputImage" id="inputImage" value="{{ $singleProduct->product_img }}">
                        <div class="col-lg-4 col-12 mb-50">
                            <!-- Image -->
                            <div class="single-product-image thumb-left">
                                <div class="tab-content">
                                    <div id="single-image-1" class="tab-pane fade show active big-image-slider">
                                        @if($singleProduct->product_img != NULL)
                                        <div class="big-image"><img src="/images/products/{{$singleProduct->product_img}}" alt="Big Image"><a href="/images/products/{{$singleProduct->product_img}}" class="big-image-popup"><i class="fa fa-search-plus"></i></a></div>
                                        @else
                                        <div class="big-image"><img src="/images/single-product/big-5.png" alt="Big Image"><a href="/images/single-product/big-5.png" class="big-image-popup"><i class="fa fa-search-plus"></i></a></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="thumb-image-slider nav" data-vertical="true">
                                    <a class="thumb-image active" data-toggle="tab" href="#single-image-1">
                                    @if($singleProduct->product_img != NULL)
                                        <img src="/images/products/{{$singleProduct->product_img}}" alt="Thumbnail Image">
                                    @else
                                        <img src="/images/single-product/thumb-1.png" alt="Thumbnail Image">
                                    @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                                
                        <div class="col-lg-8 col-12 mb-50">
                            <!-- Content -->
                            <div class="single-product-content">
                                <!-- Category & Title -->
                                <div class="head-content">
                                    <div class="category-title">
                                        <a href="/category/{{$singleProduct->url}}" class="cat">{{$singleProduct->catname}}</a>
                                        <h5 class="title">{{$singleProduct->product_name}}</h5>
                                    </div>
                                    <br>
                                    @if($singleProduct->after_pprice)
                                    <h5 class="price">BDT-{{$singleProduct->after_pprice}}</h5>
                                    @else
                                    <h5 class="price">BDT-{{$singleProduct->before_price}}</h5>
                                    @endif
                                </div>

                                <div class="single-product-description">
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>

                                    <div class="desc">
                                        <p>{{$subStrSpecs}}</p>
                                    </div>
                                    
                                    <span class="availability">Availability: @if($totalStock>0)<span>In Stock</span> @else <span class="text-danger">Out of stock</span> @endif</span>
                                    
                                    <div class="quantity-colors">
                                        <div class="quantity">
                                            <h5>Quantity</h5>
                                            <div id="qty" class="pro-qty"><input type="text" value="1" min="1" name="inputQTY"></div>
                                        </div>                            
                                        @if($colors->count() >0)
                                        <div class="colors">
                                            <h5>Color</h5>
                                            <select id="color" name="color" class="nice-select">
                                            @foreach($colors as $color)
                                                <option value="{{$color->value}}" @if($loop->first) selected @endif >{{$color->value}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        @endif

                                        @if($size->count() >0)
                                        <div class="colors">
                                            <h5>Color</h5>
                                            <select id="size" name="size" class="nice-select">
                                            @foreach($size as $s)
                                                <option value="{{$s->value}}" @if($loop->first) selected @endif >{{$s->value}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        @endif

                                        @if($weight->count() >0)
                                        <div class="colors">
                                            <h5>Color</h5>
                                            <select id="weight" name="weight" class="nice-select">
                                            @foreach($weight as $w)
                                                <option value="{{$w->value}}" @if($loop->first) selected @endif >{{$w->value}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="actions">
                                        @if($totalStock>0)
                                        <!-- <input type="submit" value="ADD TO CART" class="text-danger position-relative btn btn-medium btn-circle mr-30 mb-30" style="float: left;margin-right: 15px"> -->
                                        <a data-id="{{$singleProduct->id}}" class="btn btn-medium btn-circle add-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                                        @else
                                        <a class="text-danger position-relative btn btn-medium btn-circle mr-30 mb-30" style="float: left;margin-right: 15px">Out of stock</a>
                                        @endif
                                    </div>
                                    <div class="share">
                                        <h5>Social: </h5>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </form>
            
            <div class="row">
                <div class="col-lg-10 col-12 ml-auto mr-auto">
                    <ul class="single-product-tab-list nav">
                        <li><a href="#product-description" class="active" data-toggle="tab" >description</a></li>
                        <li><a href="#product-specifications" data-toggle="tab" >specifications</a></li>
                        <li><a href="#product-reviews" data-toggle="tab" >reviews</a></li>
                    </ul>
                    
                    <div class="single-product-tab-content tab-content">
                        <div class="tab-pane fade show active" id="product-description">
                            
                            <div class="row">
                                <div class="single-product-description-content col-lg-12 col-12">
                                {{ strip_tags($singleProduct->product_desc) }}
                                </div>
                            </div>
                            
                        </div>
                        <div class="tab-pane fade" id="product-specifications">
                            <div class="single-product-specification">
                                {{ strip_tags($singleProduct->product_specs) }}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product-reviews">
                        
                            <div class="product-ratting-wrap">
                                <div class="pro-avg-ratting">
                                    <h4>4.5 <span>(Overall)</span></h4>
                                    <span>Based on 9 Comments</span>
                                </div>
                                <div class="ratting-list">
                                    <div class="sin-list float-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span>(5)</span>
                                    </div>
                                    <div class="sin-list float-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>(3)</span>
                                    </div>
                                    <div class="sin-list float-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>(1)</span>
                                    </div>
                                    <div class="sin-list float-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>(0)</span>
                                    </div>
                                    <div class="sin-list float-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>(0)</span>
                                    </div>
                                </div>
                                <div class="rattings-wrapper">
                                
                                    <div class="sin-rattings">
                                        <div class="ratting-author">
                                            <h3>Cristopher Lee</h3>
                                            <div class="ratting-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <span>(5)</span>
                                            </div>
                                        </div>
                                        <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                    </div>
                                    
                                    <div class="sin-rattings">
                                        <div class="ratting-author">
                                            <h3>Nirob Khan</h3>
                                            <div class="ratting-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <span>(5)</span>
                                            </div>
                                        </div>
                                        <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                    </div>
                                    
                                    <div class="sin-rattings">
                                        <div class="ratting-author">
                                            <h3>MD.ZENAUL ISLAM</h3>
                                            <div class="ratting-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <span>(5)</span>
                                            </div>
                                        </div>
                                        <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                    </div>
                                    
                                </div>
                                <div class="ratting-form-wrapper fix">
                                    <h3>Add your Comments</h3>
                                    <form action="#">
                                        <div class="ratting-form row">
                                            <div class="col-12 mb-15">
                                                <h5>Rating:</h5>
                                                <div class="ratting-star fix">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-15">
                                                <label for="name">Name:</label>
                                                <input id="name" placeholder="Name" type="text">
                                            </div>
                                            <div class="col-md-6 col-12 mb-15">
                                                <label for="email">Email:</label>
                                                <input id="email" placeholder="Email" type="text">
                                            </div>
                                            <div class="col-12 mb-15">
                                                <label for="your-review">Your Review:</label>
                                                <textarea name="review" id="your-review" placeholder="Write a review"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <input value="add review" type="submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Single Product Section End -->

    <!-- Related Product Section Start -->
    <div class="product-section section mb-70">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-12 mb-40">
                    <div class="section-title-one" data-title="RELATED PRODUCT"><h1>RELATED PRODUCT</h1></div>
                </div><!-- Section Title End -->
                <!-- Product Tab Content Start -->
                <div class="col-12"> 
                    <!-- Product Slider Wrap Start -->
                    <div class="product-slider-wrap product-slider-arrow-one">
                        <!-- Product Slider Start -->
                        <div class="product-slider product-slider-4">
                        @foreach($relatedProducts->chunk(4) as $chunk)
                            @foreach($chunk as $product)
                            <div class="col pb-20 pt-10">
                                <!-- Product Start -->
                                <div class="ee-product">
                                    <!-- Image -->
                                    <div class="image">
                                        @if($product->product_img == NULL)
                                            <a href="/products/{{$product->id}}" class="img"><img src="/images/no-image.jpg" alt="Product Image"></a>
                                        @else
                                            <a href="/products/{{$product->id}}" class="img"><img src="/images/products/{{$product->product_img}}" alt="Product Image"></a>
                                        @endif
                                        <div class="wishlist-compare">
                                            <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                            <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                        </div>
                                        <a href="/products/{{$product->id}}" data-id="{{$product->id}}" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                                    </div>
                                    <!-- Content -->
                                    <div class="content">
                                        <!-- Category & Title -->
                                        <div class="category-title">
                                            <a href="#" class="cat">{{$product->category->name}}</a>
                                            <h5 class="title"><a href="/products/{{$product->id}}">{{$product->product_name}}</a></h5>
                                        </div>
                                        <!-- Price & Ratting -->
                                        <div class="price-ratting">
                                            <h5 class="price">
                                                @if($product->after_pprice)
                                                BDT-{{$product->after_pprice}}
                                                @else
                                                BDT-{{$product->before_price}}
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
                        @endforeach
                        </div><!-- Product Slider End -->
                    </div><!-- Product Slider Wrap End -->
                            
                </div><!-- Product Tab Content End -->
                
            </div>
        </div>
    </div><!-- Related Product Section End -->

<script>
    $(document).ready(function(){
        $("body").on("click", "a.add-cart", function () {
            var id = $(this).data('id');
            var qty = $("#qty").val();
            var color = $('#color').children("option:selected").val();
            var size = $('#color').children("option:selected").val();
            var weight = $('#color').children("option:selected").val();
            if(color == undefined){
                var color = null;
            }
            if(size == undefined){
                var size = null;
            }
            if(weight == undefined){
                var weight = null;
            }
            var formData = new FormData();
            formData.append('id', id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/ajax2Cart",
                method: 'post',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    // alert(JSON.stringify(response));
                    // alert(data);
                    $(".mini-cart-wrap").addClass("open");
                    $(".cart-overlay").addClass("visible");
                    $('.mini-cart-products li').remove();
                    $('.sub-total span').remove();
                    $('.header-cart span').remove();
                    var len = response.length;
                    var total = 0;
                    for(var i=0; i<len; i++){
                        var id = response[i].id;
                        var product_id = response[i].product_id;
                        var image = response[i].image;
                        var product_name = response[i].product_name;
                        var price = response[i].price;
                        var quantity = response[i].quantity;
                        var product_name = response[i].product_name;
                        var id = response[i].id;
                        total += parseFloat(price * quantity);

                        var tr_str = "<li>" +
                        "<a href='/products/" + product_id + "' class='image'>" +
                            "<img src='/images/products/" + image + "' alt='Product'>" +
                        "</a>" +
                        "<div class='content'>" +
                            "<a href='/products/" + product_id + "' class='title'>"+ product_name + "</a>" + 
                            "<span class='price'>Price: BDT:"+ price + "</span>" +
                            "<span class='qty'>Qty: " + quantity + "</span>" +
                        "</div>" +
                        "<a href='/cart/delete-product/" + id + "' class='remove'>" + 
                            "<i class='fa fa-trash-o'></i>" +
                        "</a>" +
                    "</li>";

                        $(".mini-cart-products").append(tr_str);
                    }
                    $(".sub-total").append("<span>BDT "+total+"</span>");
                    $(".header-cart").append("<span class='number'>"+i+"</span>");
                },
                error: function(response) {
                    swal.fire(response.responseText);
                    console.log(response);
                },
            });
        });
    });

</script>

@endsection