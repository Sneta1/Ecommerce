<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Classic choice')</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('frontend/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/owl.carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/vendor/owl.carousel/assets/owl.theme.default.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('frontend/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">


    


    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <header class="header mb-5">
      <!--
      *** TOPBAR ***
      _________________________________________________________
      -->
      <div id="top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offer mb-3 mb-lg-0"><a href="#" class="btn btn-success btn-sm">Offer of the day</a><a href="#" class="ml-1">Get flat 35% off on orders over $50!</a></div>
            <div class="col-lg-6 text-center text-lg-right">
              <ul class="menu list-inline mb-0">
                <?php $customer_id=Session::get('id');
                      $shipping_id=Session::get('shipping_id');
                     $customer_email=Session::get('email');
                      
                ?>
              <?php if($customer_id ==NULL && $shipping_id==NULL){?>
                <li class="list-inline-item"><a href="{{URL::to('/loginCheck')}}">Login</a></li>
                <!--<?php } /*if($customer_id !=NULL && $shipping_id==NULL){?>

                <li class="list-inline-item"><a href="{{URL::to('/checkout')}}">Checkout</a></li>
                <?php }if($customer_id !=NULL && $shipping_id!=NULL){?>
                <li class="list-inline-item"><a href="{{URL::to('/place_order')}}">Checkout</a></li>
                <?php } */?>-->  
                <li><a href="{{URL::to('/wishlist')}}"><i class="fa fa-lock"></i> Wishlist</a></li>
                <?php if($customer_id != NULL){?>
                  <li><a href="{{URL::to('/customer_logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                  <li><a href="{{URL::to('/myaccount')}}"><i class="fa fa-lock"></i>My Account</a></li>
                 <?php  }else{?>
                            
                  <li><a href="{{URL::to('/loginCheck')}}"><i class="fa fa-lock"></i> Login</a></li>
                  
                  <?php } ?>
                </ul>
            </div>
          </div>
        </div>

        <!-- *** TOP BAR END ***-->
        
        
      </div>
      <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="{{url('/home')}}" class="navbar-brand home"><img src="{{URL::to('frontend/img/mainlogo.jpg')}}" alt="" class="d-none d-md-inline-block"><img src="{{URL::to('frontend/img/mainlogo.jpg')}}" alt="" class="d-inline-block d-md-none"><span class="sr-only">Perfect Choice</span></a>
          <div class="navbar-buttons">
            <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            
            <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
          </div>
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a href="#" class="nav-link active">Home</a></li>
              <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Men<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu">
                  <li>
                    <div class="row">
                      <div class="col-md-6 col-lg-6">
                        <h5>Clothing</h5>
                        <ul class="list-unstyled mb-3">

                          <li class="nav-item">
                          <?php
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
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <h5>Accessories</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Ladies<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu">
                  <li>
                    <div class="row">
                      <div class="col-md-6 col-lg-6">

                        <h5>Clothing</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item">
                          <?php
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
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <h5>Shoes</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                        </ul>
                      </div>

                      <div class="col-md-6 col-lg-3">
                        <div class="banner"><a href="#"><img src="img/banner.jpg" alt="" class="img img-fluid"></a></div>
                        <div class="banner"><a href="#"><img src="img/banner2.jpg" alt="" class="img img-fluid"></a></div>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
            <div class="navbar-buttons d-flex justify-content-end">
              <!-- /.nav-collapse-->
              <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
              <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="{{URL::to('/show_cart')}}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>{{Cart::Count()}} Items in cart</span></a></div>
            </div>
          </div>
        </div>
      </nav>
      <div id="search" class="collapse">
        <div class="container">
          <form action="{{url('/search')}}"role="search" class="ml-auto" method="GET">
            <div class="input-group">
              
                
              <input type="text" placeholder="Search" class="form-control" name="search">
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
            
            </div>
          </form>
        </div>
      </div>
    </header>
   <!-- Slider -->
   <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div id="main-slider" class="owl-carousel owl-theme">
                <div class="item"><img src="{{URL::to('frontend/img/main-slider1.jpg')}}" alt="" class="img-fluid"></div>
                <div class="item"><img src="{{URL::to('frontend/img/main-slider2.jpg')}}" alt="" class="img-fluid"></div>
                <div class="item"><img src="{{URL::to('frontend/img/main-slider3.jpg')}}" alt="" class="img-fluid"></div>
                <div class="item"><img src="{{URL::to('frontend/img/main-slider4.jpg')}}" alt="" class="img-fluid"></div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

        <!--
        *** ADVANTAGES HOMEPAGE ***
        _________________________________________________________
        -->
        <div id="advantages">
          <div class="container">
            <div class="row mb-4">
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-heart"></i></div>
                  <h3><a href="#">We love our customers</a></h3>
                  <p class="mb-0">We are known to provide best possible service ever</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-tags"></i></div>
                  <h3><a href="#">Best prices</a></h3>
                  <p class="mb-0">You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                  <h3><a href="#">100% satisfaction guaranteed</a></h3>
                  <p class="mb-0">Free returns on everything for 3 months.</p>
                </div>
              </div>
            </div>
            <!-- /.row-->
          </div>
          <!-- /.container-->
        </div>
        <!-- /#advantages-->
        <!-- *** ADVANTAGES END ***-->
        <!--
        *** HOT PRODUCT SLIDESHOW ***

        _________________________________________________________
        -->
       
         <!--
        *** GET INSPIRED ***
        _________________________________________________________
        -->
        <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0">Hot this week</h2>
                </div>
              </div>
            </div>
          </div>
          
            <div class="container">
              
              @yield('content')

            </div>
          
        
      
   @yield('productsContent')
    @yield('cartContent')
    @yield('checkoutContent')
       
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
    <div id="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Pages</h4>
            <ul class="list-unstyled">
              <li><a href="text.html">About us</a></li>
              <li><a href="text.html">Terms and conditions</a></li>
              <li><a href="faq.html">FAQ</a></li>
              <li><a href="contact.html">Contact us</a></li>
            </ul>
            <hr>
            <h4 class="mb-3">User section</h4>
            <ul class="list-unstyled">
              <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
              <li><a href="register.html">registerter</a></li>
            </ul>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Top categories</h4>
            <h5>Men</h5>
            <ul class="list-unstyled">
              <li><a href="category.html">T-shirts</a></li>
              <li><a href="category.html">Shirts</a></li>
              <li><a href="category.html">Accessories</a></li>
            </ul>
            <h5>Ladies</h5>
            <ul class="list-unstyled">
              <li><a href="category.html">T-shirts</a></li>
              <li><a href="category.html">Skirts</a></li>
              <li><a href="category.html">Pants</a></li>
              <li><a href="category.html">Accessories</a></li>
            </ul>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Where to find us</h4>
            <p><strong>New york Street</strong><br>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>New York<br><strong>USA</strong></p>
            <hr class="d-block d-md-none">
          </div>
          
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Get the news</h4>
            <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            
            <hr>
            <h4 class="mb-3">Stay in touch</h4>
            <p class="social"><a href="#" class="facebook external"><i class="fa fa-facebook"></i></a><a href="https://www.facebook.com/" class="twitter external"><i class="fa fa-twitter"></i></a><a href="https://www.twitter.com/" class="instagram external"><i class="fa fa-instagram"></i></a><a href="#" class="gplus external"><i class="fa fa-google-plus"></i></a><a href="#" class="email external"><i class="fa fa-envelope"></i></a></p>
          </div>
          
        </div>
        
      </div>
      
    </div>
    
    
    
    
    <!--
    *** COPYRIGHT ***
    _________________________________________________________
    -->
   <div id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-2 mb-lg-0">
            <p class="text-center text-lg-left">©2019 Your name goes here.</p>
          </div>
          <div class="col-lg-6">
            <p class="text-center text-lg-right">Template design by <a href="https://bootstrapious.com/e-commerce-templates">Ecommerce</a>
              <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :)-->
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="{{asset('frontend/js/front.js')}}"></script>
    <!--<script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript">
    Stripe.setPublishableKey('pk_test_kddcY77UbKey8XsFGoe4glmv00Afmm1n51');
    var elements = stripe.elements();
</script>-->
  </body>
</html>