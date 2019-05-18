@extends('pages.layout')
@section('content')

           <!-- <div class="product-slider owl-carousel owl-theme">-->
<div class="row">
  
  <?php foreach($product_by_category as $category_by_product){?>
  <div class="col-md-3">
  
              
              <div class="item">
                
                <div class="products">
                  
                  <div class="flip-container">
                    <div class="flipper">
                      
                      <div class="front"><a href="{{URL::to('productDetails', $category_by_product->product_id)}}">
                       <img src="{{$category_by_product->product_image}}" alt="" style="height: 300px; width:600px; margin-right: 40px;" class="img-fluid"></a>
                      </div>
                    </div>
                  </div>
                  <div class="text">
                    <h3><a href="{{URL::to('productDetails', $category_by_product->product_id)}}">{{$category_by_product->product_name}}</a></h3>
                    <p class="price"> 
                      <del></del>
                      {{$category_by_product->product_price}}
                    </p>

                  </div>
                  <!-- /.text-->
                </div>
              
                <!-- /.product-->

              </div><!-- item -->
              
            </div><!-- col 3 -->
            <!--</div>-->
            <?php } ?>
          </div><!-- row -->

        
        
      
      
            
@endsection