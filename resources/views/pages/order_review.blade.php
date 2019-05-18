@extends('pages.layout')
@section('content')
<div id="all">
      <div id="content">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('message')}}
                    <?php $shipping_email=Session::get('shipping_email'); ?>
                </div>
            @endif
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Checkout - Order review</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <?php
                     $cart_contents=Cart::content();
                ?>
                <form action="{{url('/place_order')}}" method="POST" >
                  {{csrf_field()}}
                  <h1>Checkout - Order review</h1>
                  <div class="nav flex-column flex-sm-row nav-pills"><a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker"></i>Address</a>
                    <!--<a href="checkout2.html" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-truck">                       </i>Delivery Method</a>
                    -->
                    <a href="#" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-eye"></i>Order Review</a><a href="" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-money"></i>Payment Method</a></div>
                  <div class="content">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Unit price</th>
                            <th colspan="2">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($cart_contents as $contents) { ?>
                          <tr>
                            <td><a href="#"><img src="{{URL::to($contents->options->image)}}" alt="White Blouse Armani"></a></td>
                            <td><a href="#">{{$contents->name}}</a></td>
                            <td>{{$contents->qty}}</td>
                            <td>{{$contents->price}}</td>
                            <td>{{Cart::subtotal()}}</td>
                          </tr>
                          <?php } ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="4">Total</th>
                            <th>{{Cart::total()}}</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <div class="payment-options">
                            <span>Select Payment Method : </span>
                        <span>
                            <label><input type="radio" name="payment_method" value="COD" >Debit or Credit Card</label>
                        </span>
                            <span>
                            <label><input type="radio" name="payment_method" value="Paypal"> Paypal</label>
                        </span>
                           
                        </div>
                    <!-- /.table-responsive-->
                  </div>
                  <!-- /.content-->
                  <div class="box-footer d-flex justify-content-between"><a href="checkout3.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to payment method</a>
                    <button type="submit" class="btn btn-primary">Payment Method<i class="fa fa-chevron-right"></i></button>
                  </div>

                </form>
                <!-- /.box-->
              </div>
            </div>
               
              <!-- /.box-->
          
            <!-- /.col-lg-9-->
            <div class="col-lg-3">
              <div id="order-summary" class="card">
                <div class="card-header">
                  <h3 class="mt-4 mb-4">Order summary</h3>
                </div>
                <div class="card-body">
                  <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>Order subtotal</td>
                          <th>{{Cart::subtotal()}}</th>
                        </tr>
                        <!--<tr>
                          <td>Shipping and handling</td>
                          <th>$10.00</th>
                        </tr>-->
                        <tr>
                          <td>Tax</td>
                          <th>{{Cart::tax()}}</th>
                        </tr>
                        <tr class="total">
                          <td>Total</td>
                          <th>{{Cart::total()}}</th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-lg-3-->
          </div>
        </div>
      </div>
    </div>
  </div>
  


@endsection