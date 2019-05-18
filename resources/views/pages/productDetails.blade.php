

@extends('pages.layout')

@section('content')

    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">   
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <!--<nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Ladies</a></li>
                                <li class="breadcrumb-item"><a href="#">Tops</a></li>
                                <li aria-current="page" class="breadcrumb-item active">White Blouse Armani</li>
                            </ol>
                        </nav>
                    -->
                    </div>
                    <?php $customer_id=Session::get('id'); ?>
                    <div class="col-lg-3">
                        <!--
                        *** MENUS AND FILTERS ***
                        _________________________________________________________
                        -->
                        <div class="card sidebar-menu mb-4">
                            <div class="card-header">
                                <h3 class="h4 card-title">Categories</h3>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column category-menu">
                                    <li><a href="category.html" class="nav-link">Men <span class="badge badge-secondary">42</span></a>
                                        <ul class="list-unstyled">
                                            
                                            <li><?php
                                           $all_category_info=DB::table('tbl_category')
                                                                  ->get();
                                            foreach($all_category_info as $category){?>                    
                                             <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><a href="{{URL::to('/product_by_category/'.$category->category_id)}}">{{$category->category_name}}</a></h4>
                                                </div>
                                            </div>
                                        
                                         <?php } ?> 
                                        </li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html" class="nav-link active">Ladies  <span class="badge badge-light">123</span></a>
                                        <ul class="list-unstyled">
                                             <li><?php
                                           $all_category_info=DB::table('tbl_category')
                                                                  ->get();
                                            foreach($all_category_info as $category){?>                    
                                             <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><a href="{{URL::to('/product_by_category/'.$category->category_id)}}">{{$category->category_name}}</a></h4>
                                                </div>
                                            </div>
                                        
                                         <?php } ?> 
                                        </li>
                                       
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-9">
                        <div id="productMain" class="row">
                            <div class="col-md-6">
                                <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                                    <div class="item"> <img src="{{URL::to($product_by_details->product_image)}}" alt="" class="img-fluid"></div>
                                    <div class="item"> <img src="{{URL::to($product_by_details->product_image)}}" alt="" class="img-fluid"></div>
                                    
                                </div>
                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                
                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="box">
                                    <h1 class="text-center">{{$product_by_details->product_name}}</h1>
                                    <p class="goToDescription"><a href="#details" class="scroll-to">{{$product_by_details->product_description}}</a></p>
                                    <p class="price">Price: {{$product_by_details->product_price}}</p>
                                    <p class="qty">Qty: Only {{$product_by_details->product_qty}} left</p>
                                    <span>
                                    <form action="{{URL::to('/add_to_cart')}}" method="post" >
                                        {{ csrf_field() }}
                                        <label>Quantity:</label>
                                        <input name="qty" type="number" value="1" style="width:50px;" />
                                        <input type="hidden" name="product_id" value="{{$product_by_details->product_id}}">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-shopping-cart" ></i>
                                            Add to cart
                                        </button>
                                    </form>
                                </span>
                              

                                 <?php if($customer_id==NULL){ ?>
                                	
                                
                            <form action="{{url('/loginCheck')}}" method="get">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{$product_by_details->product_id}}" name="product_id"/>
                                <input type="submit" value="Add to WishList" class="btn btn-primary" class="fa fa-heart"/>
  
                            </form>
                            <?php } else { ?>
                            	<form action="{{url('/addToWishlist')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{$product_by_details->product_id}}" name="product_id"/>
                                <input type="submit" value="Add to WishList" class="btn btn-primary" class="fa fa-heart"/>
                            </form>
                            <?php } ?>
                                </div>
                                <div data-slider-id="1" class="owl-thumbs">
                                    <button class="owl-thumb-item"><img src="img/detailsquare.jpg" alt="" class="img-fluid"></button>
                                    <button class="owl-thumb-item"><img src="img/detailsquare2.jpg" alt="" class="img-fluid"></button>
                                    <button class="owl-thumb-item"><img src="img/detailsquare3.jpg" alt="" class="img-fluid"></button>
                                </div>
                            </div>
                        </div>
                        <div id="details" class="box">
                            <p></p>
                            <h4>Product details</h4>
                            <p>White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>
                            <h4>Material &amp; care</h4>
                            <ul>
                                <li>Polyester</li>
                                <li>Machine wash</li>
                            </ul>
                            <h4>Size &amp; Fit</h4>
                            <ul>
                                <li>Regular fit</li>
                                <li>The model (height 5'8" and chest 33") is wearing a size S</li>
                            </ul>
                            <blockquote>
                                <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em></p>
                            </blockquote>
                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" class="email"><i class="fa fa-envelope"></i></a></p>
                            </div>
                        </div>
                        
                            
                            
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-9-->
                </div>
            </div>
        </div>
    </div>




    @endsection