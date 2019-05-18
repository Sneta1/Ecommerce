@extends('admin.admin_layout')
@section('admin_content')

<ul class="breadcrumb">
				<!--<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>-->
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{ url('/save-product') }}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
				  <label class="control-label" for="date01">Product Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" name="product_name" required="">
				  </div>
				</div>
				<div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">
									<option>Select Category</option>
									 <?php  
									 $all_category_info= DB::table('tbl_category')
									 ->get();
									 foreach($all_category_info as $category){?>  
					<option value="{{$category->category_id}}">{{$category->category_name}}</option>	
					<?php } ?>
								  </select>
								  
								</div>
							  </div>

        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" name="product_description" rows="3"></textarea>
							  </div>
							</div>
							<div class="control-group">
				  				<label class="control-label" for="date01">Product Price</label>
				  				<div class="controls">
								<input type="text" class="input-xlarge" name="product_price" required="">
				  			</div>
							</div>
							<div class="control-group">
				  				<label class="control-label" for="date01">Product Qty</label>
				  				<div class="controls">
								<input type="text" class="input-xlarge" name="product_qty" required="">
				  			</div>
							</div>
							  <div class="control-group">
				  				<label class="control-label" for="fileInput">Image </label>
				  				<div class="controls">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
				  				</div>
							</div> 
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection