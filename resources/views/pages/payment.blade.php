@extends('pages.layout')
@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Checkout - Payment method</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="post" action="{{url('/place_order')}}">
                  {{csrf_field()}}
                  <h1>Checkout - Payment method</h1>
                  <div class="nav flex-column flex-sm-row nav-pills"><a href=""
                   class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">                 
                    </i>Address</a>
                    <!--<a href="checkout2.html" class="nav-link flex-sm-fill text-sm-center">
                     <i class="fa fa-truck">                       </i>Delivery Method</a>-->
                    <a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye"></i>Order Review</a><a href="checkout3.html" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-money"> </i>Payment Method</a></div>
                  <div class="content py-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="box payment-method">
                          <h4>Paypal</h4>
                          <p>We like it all.</p>
                          <div class="box-footer text-center">
                            <input type="radio" name="payment_method" value="Paypal">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="box payment-method">
                          <h4>Cash on delivery</h4>
                          <p>You pay when you get it.</p>
                          <div class="box-footer text-center">
                            <input type="radio" name="payment_method" value="COD">
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <!-- /.row-->
                  </div>
                  <!-- /.content-->
                  <div class="box-footer d-flex justify-content-between"><a href="{{URL::to('/checkout')}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back</a>
                    <button type="submit" class="btn btn-primary">Continue with Payment<i class="fa fa-chevron-right"></i></button>
                  </div>
                <!--</form>-->
                <!-- /.box-->
              </form>
              </div>
            </div>

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
                          <th>{{Cart::tax()*Cart::total()}}</th>
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
@endsection