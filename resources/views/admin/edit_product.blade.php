@extends('admin.admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Update product</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>update product</h2>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="{{ url('/update_product',$product_info->product_id) }}" method="post">
				{{ csrf_field() }}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="date01">Product Name</label>
				  <div class="controls">
				<input type="text" class="input-xlarge" name="product_name" value="{{$product_info->product_name}}">
				  </div>
				</div>
       
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">product description </label>
				  <div class="controls">
					<textarea class="cleditor" name="product_description" rows="3" >
						{{$product_info->product_description}}
					</textarea>
				  </div>
				</div>
				<div class="control-group">
				  				<label class="control-label" for="date01">Product Price</label>
				  				<div class="controls">
								<input type="text" class="input-xlarge" name="product_price" required="" value="{{$product_info->product_price}}">
								
				  			</div>
							</div>
							<div class="control-group">
				  				<label class="control-label" for="date01">Product Qty</label>
				  				<div class="controls">
								<input type="text" class="input-xlarge" name="product_qty" required="" value="{{$product_info->product_qty}}">

				  			</div>
							</div>
							  <div class="control-group">
				  				<label class="control-label" for="fileInput">Image </label>
				  				<div class="controls">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
				  				</div>
							</div> 
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Update</button>		 
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection