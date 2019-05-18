@extends('pages.layout')
@section('title','Wishlist Page')
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
                  <li aria-current="page" class="breadcrumb-item active">My wishlist</li>
                </ol>
              </nav>-->
              
            </div><!-- col 12-->
            <div class="col-lg-3">
              <!--
              *** CUSTOMER MENU ***
              _________________________________________________________
              -->
              <div class="card sidebar-menu">
                <div class="card-header">
                  <h3 class="h4 card-title">Customer section</h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column"><a href="{{URL::to('/myaccount')}}" class="nav-link active"><i class="fa fa-list"></i> My orders</a><a href="{{URL::to('/wishlist')}}" class="nav-link">
                    <i class="fa fa-heart"></i> My wishlist</a><a href="{{URL::to('/customer_logout')}}" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></ul>
                </div>
              </div>
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div><!-- col 3-->
            <div id="wishlist" class="col-lg-9">
              @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                    
                </div>
              @endif
              <div class="box">
                <h1>My wishlist</h1>
                <p class="lead"> 
                  </p>
              </div><!-- box-->
              <div class="row products">
                <?php foreach($Products as $product_by_details) { ?>
                <div class="col-lg-3 col-md-4">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                          
                        <div class="front"><a href="detail.html"><img src="{{URL::to($product_by_details->product_image)}}" alt="" class="img-fluid"></a></div>
                      </div>
                    </div>
                    <a href="detail.html" class="invisible"><img src="{{URL::to($product_by_details->product_image)}}" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="detail.html">{{$product_by_details->product_name}}</a></h3>
                      <p class="price"> 
                        <del></del>{{$product_by_details->product_price}}
                      </p>
                       <form action="{{URL::to('/add_to_cart')}}" method="post" >
                                        {{ csrf_field() }}
                                        
                                        <input name="qty" type="hidden" value="1" style="width:50px;" />
                                        <input type="hidden" name="product_id" value="{{$product_by_details->product_id}}">
                                        <p><button type="submit" value="Add to Cart" class="btn btn-primary">
                                            <i class="fa fa-shopping-cart" >Add to cart</i>
                                        </button>
                                        </p>
                                    </form>
                      <p class="buttons"><a href="{{URL::to('/removeWishlist/'. $product_by_details ->product_id)}}" class="btn btn-primary">Delete from wishlist</a></p>
                    </div>
                    <!-- /.text-->
                  </div><!-- product -->             
                </div><!-- col 3- 4 -->
                <?php } ?>  
                <!-- /.row products-->
              </div><!-- col 9 -->
            </div><!--col 9 -->
          </div><!-- row -->
        </div><!-- container -->
      </div><!-- content -->
    </div><!-- all-->
    
            

@endsection



