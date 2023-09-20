<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class eventController extends Controller
{
    //
    public function AuthLogin()
    {
        $admins_id = Session::get('admin_id');
        if($admins_id)
            return Redirect::to('dashboard');
        else
            return Redirect::to('admin')->send();
    }
    public function add_event(){
        $this->AuthLogin(); 
        return view('admin.add_event');
    }
    public function all_event(){
        $this->AuthLogin();
        $all_event = DB::table('event')->get();
        $manager_event = view('admin.all_event')->with('all_event',$all_event);
        return view('admin_layout')->with('admin.all_event',$manager_event);

    }
    public function save_event_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['event_name']= $request ->event_product_name;
        $data['event_desc']= $request ->event_product_desc;
        $data['event_status']= $request ->event_product_status;

        DB::table('event')->insert($data);
        Session::put('message','Thêm sự kiện thành công');
        return Redirect::to('add_event');
    }
    public function unactive_event_product($event_flower_id){
        $this->AuthLogin();
        DB::table('event')->where('event_id',$event_flower_id)->update(['event_status'=>1]);
        Session::put('message',"Kích hoạt sự kiện thành công");
        return Redirect::to('all_event');
    }
    public function active_event_product($event_flower_id){
        $this->AuthLogin();
        DB::table('event')->where('event_id',$event_flower_id)->update(['event_status'=>0]);
        Session::put('message',"Không kích hoạt sự kiện thành công");
        return Redirect::to('all_event');
    }
    public function edit_event($event_flower_id){
        $this->AuthLogin();
        $edit_event = DB::table('event')->where('event_id',$event_flower_id)->get();
        $manager_event_product = view('admin.edit_event')->with('edit_event',$edit_event);
        return view('admin_layout')->with('admin.edit_event',$manager_event_product);
    }
    public function update_event(Request $request, $event_product_id){
        $this->AuthLogin();
        $data = array();
        $data['event_name']= $request ->event_product_name;
        $data['event_desc']= $request ->event_product_desc;
        DB::table('event')->where('event_id',$event_product_id)->update($data);
        Session::put('message','Cập nhật sự kiện thành công');
        return Redirect::to('all_event');
    }
    public function delete_event($event_product_id){
        $this->AuthLogin();
        DB::table('event')->where('event_id',$event_product_id)->delete();
        Session::put('message','Xóa sự kiện thành công');
        return Redirect::to('all_event');
    }
    // end admin
    public function show_event_home($event_id)
    {
        $cate_product = DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $species_product = DB::table('species_flower')->where('species_status','1')->orderby('species_id','desc')->get();
        $event_product = DB::table('event')->where('event_status','1')->orderby('event_id','desc')->get();
        $event_name = DB::table('event')->where('event_id',$event_id)->orderby('event_id','desc')->get();
        $event_by_id = DB::table('tbl_product')->join('event','tbl_product.event_id','=','event.event_id')
        ->where('tbl_product.event_id',$event_id)->get();
        $all_product_like = DB::table('yeuthich')->get();
        return view('pages.show_event')->with('all_product_like',$all_product_like)->with('event_1',$event_product)->with('species_1',$species_product)->with('category',$cate_product)->with('event_by_id',$event_by_id)->with('event_name',$event_name);
    }
}
