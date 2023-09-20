<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $admins_id = Session::get('admin_id');
        if($admins_id)
            return Redirect::to('dashboard');
        else
            return Redirect::to('admin')->send();
    }
    public function index(){
        return view ('admin_login');
    }
    public function show_dashboard(){
        $this-> AuthLogin();
        return view ('admin.dashboard');
    }
    
    public function dashboard(Request $request){
        $admin_email = $request -> admin_email;
        $admin_password = md5($request -> admin_password);

        $result = DB::table ('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return redirect::to('/dashboard');
        }
        else{
            Session::put('message','Mật khẩu hặc tài khoản bị sai.Nhập lại');
            return redirect::to('/admin');
        }
    }
    public function logout(){
        $this-> AuthLogin(); 
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return redirect::to('/admin');
    }
    public function show_order(Request $request)
    {
        $orders = DB::table('order')->get();
        $customers = DB::table('table_custom')->get();
        $shippings = DB::table('tbl_shipping')->get();

        return view('admin.all_order')->with('orders',$orders)->with('customers',$customers)->with('shippings',$shippings);
    }
    public function chitiet($oder_id)
    {
        $orders = DB::table('order')->where('order_id',$oder_id)->get();
        $customers = DB::table('table_custom')->get();
        $shippings = DB::table('tbl_shipping')->get();
        $order_pro = DB::table('product_order')->where('order_id',$oder_id)->get();
        $products =DB::table('tbl_product')->get();
        return view('admin.chitiet')->with('orders',$orders)->with('customers',$customers)->with('shippings',$shippings)->with('order_pro',$order_pro)->with('products',$products);
    }
}
