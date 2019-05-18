<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use Session;
use App\orders;
use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_published_product=DB::table('tbl_products')
                     
                     ->limit(8)
                     ->get();
       $manage_published_product=view('pages.home')
               ->with('all_published_product',$all_published_product);
       return view('pages.layout')
               ->with('pages.home',$manage_published_product); 
        //return view('pages.home');
    }

    /*public function productDetails()
    {
        return view('pages.productDetails');
    }*/

    public function cart()
    {
        return view('pages.cart');
    }

    public function checkout()
    {
        return view('pages.checkout');
    }

    public function myaccount(){
        
        $user= Session::get('id');              
        $orders = orders::where("customer_id", "=", $user);
        $all_customer_orders = DB::table('tbl_order')
        ->join('users', 'users.id', '=', 'tbl_order.customer_id')
        ->where('customer_id', $user)
        ->get();
        return view('pages.myaccount', compact('all_customer_orders', 'orders'));

    }

    public function delete_customerorder($order_id)
    {  
      
      DB::table('tbl_order')
          ->where('order_id',$order_id)
          ->delete();
      Session::get('message','Order Deleted successfully! ');
      return Redirect::to('/myaccount');    
    }

    
     

}
