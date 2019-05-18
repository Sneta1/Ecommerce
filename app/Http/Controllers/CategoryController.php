<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
    	 
    	return view('admin.add-category');
    }

    public function all_category(){
    	$all_category_info= DB::table('tbl_category')->get();
    	$manage_category=view('admin.all_category')
           ->with('all_category_info',$all_category_info);
       return view('admin.admin_layout')
           ->with('admin.all_category',$manage_category);  
    }

    public  function save_category(Request $request){
    	$data=array();
    	$data['category_id']= $request->category_id;
    	$data['category_name']= $request->category_name	;
    	$data['category_description']= $request->category_description;
    	DB::table('tbl_category')->insert($data);
        Session::put('message','Category added successfully !! ');
        return Redirect::to('/add-category');
    }

    public function edit_category($category_id)
    {
         $category_info=DB::table('tbl_category')
		                 ->where('category_id',$category_id)
		                 ->first();
       $category_info=view('admin.edit_category')
           ->with('category_info',$category_info);
       return view('admin.admin_layout')
           ->with('admin.edit_category',$category_info);
     
    	//return view('admin.edit_category');
    }

    public function update_category(Request $request,$category_id)
    {
         $data=array();
         $data['category_name']=$request->category_name;
         $data['category_description']=$request->category_description;
        
         DB::table('tbl_category')
             ->where('category_id',$category_id)
             ->update($data);
             Session::get('message','Category update successfully !');
             return Redirect::to('/all-category');
    }
    public function delete_category($category_id)
    {
    	DB::table('tbl_category')
    	    ->where('category_id',$category_id)
    	    ->delete();
    	Session::get('message','Category Deleted successfully! ');
    	return Redirect::to('/all-category');    
    }

    public function product_by_category($category_id)
  {
     $product_by_category=DB::table('tbl_products')
                     ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->select('tbl_products.*','tbl_category.category_name')
                     ->where('tbl_category.category_id',$category_id)
                     ->limit(11)
                     ->get();
       $manage_product_by_category=view('pages.category_by_products')
               ->with('product_by_category',$product_by_category);
       return view('pages.layout')
               ->with('pages.category_by_products',$manage_product_by_category); 
 
  }

}
