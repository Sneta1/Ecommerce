<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Cart;
use App\wishlist;
use Auth;
use App\User;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class CheckOutController extends Controller
{

   
    public function loginCheck()
    {
    	return view('pages.login');
    }

    /*public function customer_register(Request $request)
    {
      $data=array();
      $data['customer_name']=$request->customer_name;
      $data['customer_email']=$request->customer_email;
      $data['password']=md5($request->password);
      $data['mobile_number']=$request->mobile_number;
        $customer_id=DB::table('tbl_customer')
                     ->insertGetId($data);
               Session::put('customer_id',$customer_id);
               Session::put('customer_name',$request->customer_name);
               return Redirect('/checkout');      
    }
    */
    public function customer_register(Request $request){
        $this->validate($request,[
           'name'=>'required|string|max:255',
            'email'=>'required|string|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
            
        ]);
        
        $data=array();
      $data['name']=$request->name;
      $data['email']=$request->email;
      $data['password']=md5($request->password);
      $data['amount']=$request->amount;
      
        $customer_id=DB::table('users')
                     ->insertGetId($data);
                     //->increment('amount', 100);
               Session::put('id',$customer_id);
               Session::put('email',$data['email']);
             //  Session::put('name',$name);

        //$input_data=$request->all();
        //$input_data['password']=Hash::make($input_data['password']);
        
        //$input_data=$request->user()->customer_id;
       // $customer_id=DB::table('users')
                    //->insertGetId($input_data);
        //Session::put('customer_id',$customer_id);
        //User::create($input_data);
        //echo $input_data;
        return Redirect('/checkout');
        
    }
    public function customer_login(Request $request){
        $email=$request->email;
      $password=md5($request->password);
      $result=DB::table('users')
              ->where('email',$email)
              ->where('password',$password)
              ->first();
             if ($result) {
               Session::put('id',$result->id);
               Session::put('email',$email);
               
               return Redirect::to('/checkout');
             }else{
                return Redirect::to('/loginCheck');
             }
             
        /*$input_data=$request->all();
        if(Auth::attempt(['email'=>$input_data['email'],'password'=>$input_data['password']])){
            Session::put('frontSession',$input_data['email']);
            return redirect('/checkout');
        }else{
            return back()->with('message','Account is not Valid!');
           // $customer_id=DB::table('users')
                   //  ->insertGetId($input_);
               //Session::put('id',$customer_id);
            //return Redirect::to('/loginCheck');

        }
        */
    }
     public function checkout()
    {
    	
      return view('pages.checkout');
    }

     public function save_shipping_details(Request $request)
    {
      $this->validate($request,[
        'shipping_email'=> 'required',
        'shipping_fname' => 'required',
        'shipping_lname' => 'required',
        'shipping_address1' => 'required',
        'shipping_mobilenumber' => 'required|integer',
        'shipping_city'=> 'required',
        'shipping_zip'=> 'required|integer',
      ]);
      $data=array();
      $data['shipping_email']=$request->shipping_email;
      $data['shipping_fname']=$request->shipping_fname;
      $data['shipping_lname']=$request->shipping_lname;
      $data['shipping_address1']=$request->shipping_address1;
      $data['shipping_address2']=$request->shipping_address2;
      $data['shipping_mobilenumber']=$request->shipping_mobilenumber;
      $data['shipping_city']=$request->shipping_city;
      $data['shipping_zip']=$request->shipping_zip;
        $shipping_id=DB::table('tbl_shipping')
                     ->insertGetId($data);
           Session::put('shipping_id',$shipping_id);
           
           return Redirect::to('/order_review'); 

    }

    /*public function customer_login(Request $request)
    {
      $customer_email=$request->customer_email;
      $password=md5($request->password);
      $result=DB::table('tbl_customer')
              ->where('customer_email',$customer_email)
              ->where('password',$password)
              ->first();
             if ($result) {
               
               Session::put('customer_id',$result->customer_id);
               Session::put('customer_email',$customer_email);
               return Redirect::to('/checkout');
             }else{
                
                return Redirect::to('/loginCheck');

             }

    }
    */
     /*public function payment()
    {
      return view('pages.payment');
    }*/

    public function order_review()
    {
      return view('pages.order_review');

     
    }

    public function place_order(Request $request){
    	 $payment_method=$request->payment_method;
    	$pdata=array();
      $pdata['payment_method']=$payment_method;
      $pdata['payment_status']='pending';
      $payment_id=DB::table('tbl_payment')
             ->insertGetId($pdata);
  
      $odata=array();
      $contents=Cart::content();
      $odata['customer_id']=Session::get('id');
      $odata['customer_email']=Session::get('email');
      $odata['shipping_id']=Session::get('shipping_id');
      $odata['payment_id']=$payment_id;
      $odata['order_total']=Cart::total();
      $odata['order_status']='pending';
      
      $order_id=DB::table('tbl_order')
               ->insertGetId($odata);
      
     $contents=Cart::content();
     $oddata=array();
     foreach ($contents as $content) 
     {
        $oddata['order_id']=$order_id;
        $oddata['product_id']=$content->id;
        $oddata['product_name']=$content->name;
        $oddata['product_price']=$content->price;
        $oddata['product_sales_quantity']=$content->qty;
        

        DB::table('tbl_order_details')
            ->insert($oddata);
            
        //decreasing the qauntity of a product after purchase         
        DB::table('tbl_products')
        ->where('product_id',$content->id)
        ->decrement('product_qty',$content->qty);

        //increment the amount in cash table
        
        $cdata=array();
        //$cdata['cash_id']=$cash_id;
        $cdata['customer_id']=Session::get('id');
        $cdata['customer_email'] = Session::get('email');
         $customerDetails = DB::table('users')
        ->where('id', $cdata['customer_id'])->first();  
        $cdata['amount']=Cart::total();
        $cdata['customer_name'] = $customerDetails->name;
        DB::table('tbl_cash')
        ->insert($cdata);
        
        //decreasing the amount from customer table
        DB::table('users')
        ->where('id',$cdata['customer_id'])
        ->decrement('amount',Cart::total());
        
       // ->increment('amount',$content->price);
      }
     if ($payment_method=='COD') {

      Cart::destroy();
      $customer= Session::get('email');
      $customer_id=Session::get('id');
      $orderDetails = DB::table('tbl_order')
      ->where('order_id', $order_id)->first();

      $customerDetails = DB::table('users')
      ->where('id', $customer_id )->first();

      $productDetails = DB::table('tbl_order_details')
      ->where('order_id', $order_id)->first();
      //echo "<pre>";
      //print_r($productDetails);
      //die();
          
      $data= array(
        'order_id' => $order_id,
        'payment_id' => $payment_id,
        'order_total' => $orderDetails->order_total,
        'order_status' => $orderDetails->order_status,
        'name' => $customerDetails->name,
        'product_name' => $productDetails->product_name,
        //'product_name' => $productDetails->product_name
        

        //'order_total' =>$order_total,

      );
      
      Mail::send('pages.mail', $data, function($message) use($customer){
        $message->from('snetakayasta@gmail.com');
        $message->to($customer)->subject('Order Information');
      }); 
      
         return view('pages.confirmation');
       

     }elseif($payment_method=='Paypal'){
         
         return view('pages.paymentStripe');
     }else{
      echo "not selected";
     }
    
    }

    public function customer_logout()
    {
      
      Session::flush();
      return Redirect::to('/');
    }

     public function storePayment(Request $request)
    {
        // Set your secret key: remember to change this to your live secret key in production
    // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_m9HAGsXfvINF2WED4Rwo49sf009pgIKK2l");

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
        // Get the credit card details submitted by the form
      $token = $request->stripeToken;
      Session::put('email',$request->email);
      $email= $request->email;
     try{ $charge = \Stripe\Charge::create(array(
    'amount' => Cart::total()*100,
    'currency' => 'usd',
    'description' => 'Example charge',
    'source' => $token,
    'receipt_email' => $email,
  ));
}catch (\Stripe\Error\Card $e){

}

return view('pages.confirmation');

}

public function addToWishlist(Request $request){
        //dd($request->all());
 

        $wishList = new wishList;    
        $wishList->customer_id = Session::get('id');

        //$id=Auth::user();
        //dd($id);
        //$wishList->product_id = Auth::User()->id;
        $wishList->product_id = $request->product_id;
        $wishList->save();
        

        $productsDetails = DB::table('tbl_products')->where('product_id', $request->product_id)->first();
       $manage_product_by_details=view('pages.productDetails')
       ->with('product_by_details',$productsDetails);
       return view('pages.layout')
        ->with('pages.productDetails',$manage_product_by_details);
    
}
 public function viewWishlist() {
  //$user = Auth::user();
        $user= Session::get('id');
        $wishlist = wishlist::where("user_id", "=", $user);
        $Products = DB::table('tbl_wishlist')
        ->join('tbl_products', 'tbl_wishlist.product_id', '=', 'tbl_products.product_id')
        ->where('customer_id', $user)
        ->get();
        return view('pages.wishlist', compact('wishlist', 'Products'));
    }
  public function removeWishlist($productId) {
        DB::table('tbl_wishlist')
        ->where('product_id', $productId)
        ->delete();
        return back()->with('message', 'Wishlist item removed successfully');
      
    }
}
