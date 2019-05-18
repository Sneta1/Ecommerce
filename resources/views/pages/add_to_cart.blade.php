@extends('pages.layout')
@section('cartContent')

<div id="all">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- breadcrumb-->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Shopping cart</li>
                        </ol>
                    </nav>
                </div>
                <div id="basket" class="col-lg-9">
                    <div class="box">
                        <?php
                     $cart_contents=Cart::content();
                ?>
                        
                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have {{Cart::count()}}item(s) in your cart.</p>
                            @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th colspan="1">Total</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cart_contents as $contents) { ?>
                                    <tr>
                                        <td><a href="#"><img src="{{URL::to($contents->options->image)}}" alt="White Blouse Armani"></a></td>
                                        <td><a href="#">{{$contents->name}}</a></td>
                                        <td>
                                          <div class="cart_quantity_button">
                                          <form action="{{url::to('/update_cart')}}" method="post">
                                            {{ csrf_field()}}
                                             <input type="hidden" name="product_id" value="{{$contents->id}}">
                                             
                                            <input class="cart_quantity_input" type="number" name="qty" value="{{$contents->qty}}" autocomplete="off" size="2">
                                            
                                            <input  type="hidden" name="rowId" value="{{$contents->rowId}}" >
                                            <input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
                                          </form>
                                        </div>
                                      </td>
                                        <td>{{$contents->price}}</td>
                                        <td>{{($contents->price)*($contents->qty)}}</td>
                                        <td><a href="{{url::to('/delete_cart/'. $contents->rowId)}}"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                  <?php } ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th colspan="2">{{Cart::total()}}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.table-responsive-->
                            <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                                <div class="left"><a href="category.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                                <div class="right">
                                  <?php $customer_id=Session::get('customer_id'); ?>
                                 <?php if($customer_id != NULL){?>
                                    <a class="btn btn-outline-secondary" href="{{URL::to('/checkout')}}"><i class="fa fa-chevron-right"></i>Checkout to proceed</a>
                                <?php  }else{?>
                                       <a class="btn btn-outline-secondary" href="{{URL::to('/loginCheck')}}"><i class="fa fa-chevron-right"></i>CheckOut to proceed</a>
                                  <?php } ?>
                        
                                    <!--<button class="btn btn-outline-secondary"><i class="fa fa-refresh"></i> Update cart</button>-->
                                    <!--<a href="{{url('/checkout')}}"<button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></button></a>-->
                                </div>
                            </div>
                            
                    </div><!-- /.box-->
                    <div class="row same-height-row">


                    </div>
                </div>
                <!-- /.col-lg-9-->
                <div class="col-lg-3">
                    <div id="order-summary" class="box">
                        <div class="box-header">
                            <h3 class="mb-0">Order summary</h3>
                        </div>
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
                <!-- /.col-md-3-->
            </div>
        </div>
    </div>
</div>

@endsection