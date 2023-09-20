<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Stmt\Foreach_;
class CheckoutController extends Controller
{
    //
    public function login_checkout()
    {
        $cate_product = DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $event_product = DB::table('event')->where('event_status','1')->orderby('event_id','desc')->get();
        $species_product = DB::table('species_flower')->where('species_status','1')->orderby('species_id','desc')->get();
        return view('user.login_check')->with('category',$cate_product)->with('event_1',$event_product)->with('species_1',$species_product);
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['custom_name']=$request->cus_name;
        $data['custom_phone']=$request->cus_sdt;
        $data['custom_email']=$request->cus_mail;
        $data['password']=md5($request->cus_pass);

        $customer_id = DB::table('table_custom')->insertGetId($data);
        // Session::put('custom_id',$customer_id);
        // Session::put('custom_name',$request->cus_name);
        return redirect::to('/login-checkout');

    }
    public function checkout()
    {
        $cate_product = DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $event_product = DB::table('event')->where('event_status','1')->orderby('event_id','desc')->get();
        $species_product = DB::table('species_flower')->where('species_status','1')->orderby('species_id','desc')->get();
        return view('user.checkout')->with('category',$cate_product)->with('event_1',$event_product)->with('species_1',$species_product);
    }
    public function save_checkout_custommer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->ship_name;
        $data['shipping_phone'] = $request->ship_sdt;
        $data['shipping_email'] = $request->ship_email;
        $data['shipping_address'] = $request->ship_address;
        if($request->ship_note!=NULL) 
        {
            $data['shipping_note'] = $request->ship_note;
        }
        else
        {
            $data['shipping_note'] ="khong";
        }
        $data['shipping_date'] = $request->ship_date;
        $data['shipping_time'] = $request->ship_time;
        if($request->checkbox == "onl"){
            $data['trang_thai'] = "Đã thanh toán";
             }
        else{
            $data['trang_thai'] = "Chưa thanh toán";
        }
        $ship_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$ship_id);
        
        return Redirect::to('/payment');
        
    }

    public function payment()
    {
        $cate_product = DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $event_product = DB::table('event')->where('event_status','1')->orderby('event_id','desc')->get();
        $species_product = DB::table('species_flower')->where('species_status','1')->orderby('species_id','desc')->get();
        return view('user.payment')->with('category',$cate_product)->with('event_1',$event_product)->with('species_1',$species_product);
    }
    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to('/login-checkout');
    }
    public function login(Request $request)
    {
        $email = $request->mail_acc;
        $password = md5($request->pass_acc);
        $result =DB::table('table_custom')->where('custom_email',$email)->where('password',$password)->get();
        foreach($result as $key => $user)
        {
            $cus_id=$user->custom_id;
        }

        if($result)
        {
            Session::put('custom_id',$cus_id);
            foreach($result as $key =>$use){
            Session::put('custom_name',$use->custom_name);};
            return Redirect::to('/trang-chu');
        }
        else
        {
            return Redirect::to('/login-checkout');
        }
        
    }
    public function oke(Request $request)
    {
        $content=Cart::content();
        $id_customer = Session::get('custom_id');
        $data=array();
        $data['custom_id']=Session::get('custom_id');
        $data['shipping_id']=Session::get('shipping_id');
        $data['order_total']=Cart::total();
        $data['order_status']=0;
        $order_id = DB::table('order')->insertGetId($data);

        //product_order
        foreach($content as $v_conten)
        {
            $pro_order=array();
            $pro_order['order_id']=$order_id;
            $pro_order['product_id']=$v_conten->id;
            $pro_order['product_name']=$v_conten->name;
            $pro_order['product_price']=$v_conten->price;
            $pro_order['product_qty']=$v_conten->qty;
            DB::table('product_order')->insert($pro_order);
        }       
        
        Session::forget('shipping_id');
        
        return Redirect::to('/trang-chu');
    }
}
