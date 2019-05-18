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
                  <li aria-current="page" class="breadcrumb-item"><a href="#">My orders</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Order # 1735</li>
                </ol>
              </nav>-->
            </div>
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
            </div>
            <div id="customer-orders" class="col-lg-9">
              <div class="box">
                <h1>My orders</h1>
                <p class="lead">Your orders on one place.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                <hr>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Order Id</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    @foreach($all_customer_orders as $orders)  
                    <tbody>
                      <tr>
                        <th>{{$orders->order_id}}</th>
                        <td>{{$orders->date}}</td>
                        <td>{{$orders->order_total}}</td>
                        <td><span class="badge badge-warning">{{$orders->order_status}}</span></td>
                        <td class="center">
                        <a class="btn btn-danger" href="{{URL::to('/delete_customerorder/'.$orders->order_id)}}" id="delete">Delete
                          <i class="halflings-icon white trash"></i> 
                        </a>
                      </td>
                      </tr>
                    </tbody>
                      @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection