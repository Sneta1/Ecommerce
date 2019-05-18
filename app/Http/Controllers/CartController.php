<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Session;
use Illuminate\Events;
use DB;
use Cart;
class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
    	$qty=$request->qty;
    	$product_id=$request->product_id;
        $product_info=DB::table('tbl_products')
                      ->where('product_id',$product_id)
                      ->first();
        $data['qty']=$qty;
        $data['id']=$product_info->product_id;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;
       $data['options']['image']=$product_info->product_image;


        
       Cart::add($data);

        return Redirect::to('/show_cart');
                     
    }
    public function show_cart()
    {

       $all_published_category=DB::table('tbl_products')
        //                      ->where('publication_status',1)
                           ->get();
         $manage_published_category=view('pages.add_to_cart')
             ->with('all_published_category',$all_published_category);
       return view('pages.layout')
               ->with('pages.add_to_cart',$manage_published_category);                      
   
    }
     public function delete_cart($rowId)
    {
      Cart::update($rowId,0);
      return Redirect::to('/show_cart');
    }
    public function update_cart(Request $request)
    {
       
       $product_id=$request->product_id; 
       $qty=$request->qty;
       $products= DB::table('tbl_products')
       ->where('product_id',$product_id)
       ->first();
       $products= $products->product_qty;

      
       if($qty<=$products){
        $msg="Cart updated";
        $rowId=$request->rowId;
       Cart::update($rowId,$qty);
      return Redirect::to('/show_cart')->with('status', $msg);
       }
      else{
        $msg="Qty more than stock";
        return Redirect::to('/show_cart')->with('error', $msg);
      }
       
    }
}

