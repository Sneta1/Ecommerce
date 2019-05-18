<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_login');
    }

    
    public function dashboard(Request $request)
    {
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);
        $result=DB::table('tbl_admin')
            ->where('admin_email',$admin_email)
            ->where('admin_password',$admin_password)
            ->first();

        if ($result) {
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Email or Password Invalid');
            return Redirect::to('/admin');
        }
    }
    
     public function orders(){
        $all_orders = DB::table('tbl_order')
       ->Select('order_id',
       'customer_id','customer_email','order_total','order_status', 'date')
        //->leftJoin('users.id', 'orders.user_id')
        ->orderBy('order_id','ASC')
        ->get();
        return view('admin.orders', compact('all_orders'));
      }

       public function orderStatusUpdate(Request $request, $order_id){
        if($request->isMethod('POST')){
            $all_orders= $request->all();
            $all_orders = DB::table('tbl_order')
            ->where('order_id', $all_orders['order_id'])
            ->update(['order_status'=>$all_orders['order_status']]);
            
            }

       $all_orders = DB::table('tbl_order')
      ->where('order_id', $order_id)
      ->first();

      $all_orders_details = DB::table('tbl_order_details')
      ->where('order_id', $order_id)
      ->first();
      
      //print_r($all_orders);
      //die();
        $customer_email= $all_orders->customer_email;
            $data= array(
        'order_id' => $all_orders->order_id,
        'order_total' => $all_orders->order_total,
        'order_status' => $all_orders->order_status,
        'product_name' => $all_orders_details->product_name,
      );
     
      
        Mail::send('pages.notificationmail', $data, function($message) use($customer_email){
        $message->from('snetakayasta@gmail.com');
        $message->to($customer_email)->subject('Order Information');                                                                
      });
      
      
            return redirect()->back()->with('order successfully changed');

            //emailing customer regarding change in order 
           /* if($request->has('delivered')){

            }
            */
           

        
          }
       

}