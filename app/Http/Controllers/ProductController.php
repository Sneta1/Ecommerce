<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

use App\Http\Controllers\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function index(){
    	return view('admin.add_product');
    }
    public function all_product(){
    	//$this->AdminAuthCheck();
       $all_product_info=DB::table('tbl_products')
                        ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
                        ->select('tbl_products.*', 'tbl_category.category_name')
                        ->get();
       $manage_product=view('admin.all_product')
               ->with('all_product_info',$all_product_info);
       return view('admin.admin_layout')
               ->with('admin.all_product',$manage_product);
    }


    public function save_product(Request $request)
   {
      $data=array();
        $data['product_name']=$request->product_name; 
        $data['category_id']=$request->category_id;
        $data['product_description']=$request->product_description;
        $data['product_price']=$request->product_price;
        $data['product_qty']=$request->product_qty;
            
        $image=$request->file('product_image');
    if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='image/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
         $data['product_image']=$image_url;
            DB::table('tbl_products')->insert($data);
            Session::put('message','Product added successfully!!');
            return Redirect::to('/add-product');
         // echo "<pre>";
         // print_r($data);
         // echo "</pre>";
         // exit();
            
       }
    }
    $data['product_image']='';
            DB::table('tbl_products')->insert($data);
            Session::put('message','product added successfully without image!!');
            return Redirect::to('/add-product');
   }

  /* public function unactive_product($product_id)
   {
         DB::table('tbl_products')
              ->where('product_id',$product_id)
              ->update(['publication_status' => 0]);
          Session::put('message','Product Unactive successfully !! ');
              return Redirect::to('/all-product');
   }

   public function active_product($product_id)
   {
         DB::table('tbl_products')
              ->where('product_id',$product_id)
              ->update(['publication_status' => 1]);
          Session::put('message','Product Active successfully !! ');
              return Redirect::to('/all-product');
   }*/
    public function delete_product($product_id)
    {  
    	
    	DB::table('tbl_products')
    	    ->where('product_id',$product_id)
    	    ->delete();
    	Session::get('message','Product Deleted successfully! ');
    	return Redirect::to('/all-product');    
    }

    public function edit_product($product_id)
    {  
        $product_info=DB::table('tbl_products')
                     ->where('product_id',$product_id)
                     ->first();
       $product_info=view('admin.edit_product')
                ->with('product_info',$product_info);
       return view('admin.admin_layout')
                ->with('admin.edit_product',$product_info);
    }
     public function update_product(Request $request,$product_id)
    {
         $data=array();
         $data['product_name']=$request->product_name;
        
         $data['product_description']=$request->product_description;
         
         $data['product_price']=$request->product_price;
         $data['product_qty']=$request->product_qty;
    
        $image=$request->file('product_image');
    if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='image/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
     }
       DB::table('tbl_products')
             ->where('product_id',$product_id)
             ->update($data);
             Session::get('message','product updated successfully !');
             return Redirect::to('/all-product');
    }



    public function product_details_by_id($product_id)
  {
      $productDetails=DB::table('tbl_products')
                     
                     ->where('tbl_products.product_id',$product_id)
                     ->first();
                     
       $manage_product_by_details=view('pages.productDetails')
               ->with('product_by_details',$productDetails);
       return view('pages.layout')
               ->with('pages.productDetails',$manage_product_by_details);
  }

  public function search(Request $request){
    $searchData= $request->search;

    $all_published_product= DB::table('tbl_products')
    ->where('product_name', 'like', '%'. $searchData. '%')
      ->get();
      return view('pages.home',  ['all_published_product' => $all_published_product
    ]);
    }

     public function delete_order($order_id)
    {  
      
      DB::table('tbl_order')
          ->where('order_id',$order_id)
          ->delete();
      Session::get('message','Order Deleted successfully! ');
      return Redirect::to('/orders');    
    }
    

    
}
