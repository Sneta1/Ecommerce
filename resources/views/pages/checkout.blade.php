@extends('pages.layout')
@section('checkoutContent')

<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Checkout - Address</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form action="{{url('/save_shipping_details')}}" method="post">
                    {{csrf_field()}}
                    <?php $shipping_email=Session::get('shipping_email'); ?>
                  <h1>Checkout - Address</h1>
                  <div class="nav flex-column flex-md-row nav-pills text-center"><a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-map-marker">                  </i>Address</a>
                    <!--<a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-truck"></i>Delivery Method</a>-->
                    <a href="" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye"></i>Order Review</a>
                    <a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money"></i>Payment Method</a></div>
                  <div class="content py-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="firstname">Firstname</label>
                          <input id="firstname" type="text" class="form-control"  name="shipping_fname">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="lastname">Lastname</label>
                          <input id="lastname" type="text" class="form-control" name="shipping_lname">
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="phone">Telephone/Mobile Number</label>
                          <input id="phone" type="text" class="form-control" name="shipping_mobilenumber">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input id="email" type="text" class="form-control" name="shipping_email">
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="city">City</label>
                          <input id="city" type="text" class="form-control" name="shipping_city">
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="zip">ZIP</label>
                          <input id="zip" type="text" class="form-control" name="shipping_zip">
                        </div>
                      </div>
                      <!--<div class="col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="state">State</label>
                          <select id="state" class="form-control" name="shippingState"></select>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="country">Country</label>
                          <select id="country" class="form-control" name="shippingCountry"></select>
                        </div>
                      </div>-->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="street">Street Address 1</label>
                          <input id="street" type="text" class="form-control" name="shipping_address1">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="street">Street Address 2</label>
                          <input id="street" type="text" class="form-control" name="shipping_address2">
                        </div>
                      </div>
                      
                    </div>
                    <!-- /.row-->
                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="basket.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Basket</a>
                    <button type="submit" class="btn btn-primary">Continue to Delivery Method<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
              <!-- /.box-->
            </div>
            <!-- /.col-lg-9-->
            <div class="col-lg-3">
              <div id="order-summary" class="card">
                <div class="card-header">
                  <h3 class="mt-4 mb-4">Order summary</h3>
                </div>
                <div class="card-body">
                  <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</    p>
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
@endsection