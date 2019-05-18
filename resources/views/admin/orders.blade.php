@extends('admin.admin_layout')
@section('admin_content')
      
      
      <ul class="breadcrumb">
        <li>
          <i class="icon-home"></i>
          <a href="index.html">Home</a> 
          <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
      </ul>

      <div class="row-fluid sortable">    
        <div class="box span12">
          <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
              <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
              <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
              <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
          </div>
          
          <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                <tr>
                  <th>Order Id</th>
                  <th>Customer Id</th>
                  <th>Customer Email</th>
                  <th>Order Total</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead> 
              <?php $countOrder =1;?>
               @foreach($all_orders as $orders)  
              <tbody> 
              <tr>
                <td>{{$orders->order_id}}</td>
                <td class="center">{{$orders->customer_id}}</td>
                <td class="center">{{$orders->customer_email}}</td>
                <td class="center">
                  {{$orders->order_total}}
                </td>

                <td>
                            <form action="{{url('/orderStatusUpdate', $orders->order_id)}}" method="post">
                              {{csrf_field()}}
                              <input type="hidden" name="order_id" value="{{$orders->order_id}}">
                              <select class="form-control" name="order_status" id="order_status">
                                  <option value="pending"
                                  <?php if($orders->order_status=='pending'){?> selected="selected"<?php }?>>pending
                                  
                                </option>

                                  <option value="dispatched"
                                    <?php if($orders->order_status=='dispatched'){?> selected="selected"<?php }?>>dispatched</option>

                                  <option value="processed"
                                  <?php if($orders->order_status=='processed'){?> selected="selected"<?php }?>>processed</option>

                                  <option value="shipping"
                                  <?php if($orders->order_status=='shipping'){?> selected="selected"<?php }?>>shipping</option>

                                  <option value="delivered"
                                  <?php if($orders->order_status=='delivered'){?> selected="selected"<?php }?>>delivered</option>

                              </select>
                              <input type="submit" value="update status">
                              
                            </form>
                          </td>
                  <td class="center">
                  {{$orders->date}}
                </td>
                <td class="center">
              <a class="btn btn-danger" href="{{URL::to('/delete_order/'.$orders->order_id)}}" id="delete">
                <i class="halflings-icon white trash"></i> 
              </a>
            </td>
                          

              </tr>

              </tbody>
              <?php $countOrder++;?>
               @endforeach
            </table>            
          </div>
      
      </div><!--/row-->
@endsection