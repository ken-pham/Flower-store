<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin()
    {
        $admins_id = Session::get('admin_id');
        if($admins_id)
            return Redirect::to('dashboard');
        else
            return Redirect::to('admin')->send();
    }
    public function add_category(){
        $this->AuthLogin(); 
        return view('admin.add_category');
    }
    public function all_category(){
        $this->AuthLogin();
        $all_category = DB::table('category_product')->get();
        $manager_category_product = view('admin.all_category')->with('all_category',$all_category);
        return view('admin_layout')->with('admin.all_category',$manager_category_product);

    }
    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['category_name']= $request ->category_product_name;
        $data['category_desc']= $request ->category_product_desc;
        $data['category_status']= $request ->category_product_status;

        DB::table('category_product')->insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return Redirect::to('add_category');
    }
    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message',"Kích hoạt danh mục sản phẩm thành công");
        return Redirect::to('all_category');
    }
    public function active_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message',"Không kích hoạt danh mục sản phẩm thành công");
        return Redirect::to('all_category');
    }
    public function edit_category($category_product_id){
        $this->AuthLogin();
        $edit_category = DB::table('category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category')->with('edit_category',$edit_category);
        return view('admin_layout')->with('admin.edit_category',$manager_category_product);
    }
    public function update_category(Request $request, $category_product_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name']= $request ->category_product_name;
        $data['category_desc']= $request ->category_product_desc;
        DB::table('category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục thành công');
        return Redirect::to('all_category');
    }
    public function delete_category($category_product_id){
        $this->AuthLogin();
        DB::table('category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('all_category');
    }
    // end admin
    public function show_category_home($category_id)
    {
        $species_product = DB::table('species_flower')->where('species_status','1')->orderby('species_id','desc')->get();
        $cate_product = DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $event_product = DB::table('event')->where('event_status','1')->orderby('event_id','desc')->get();
        $cate_name = DB::table('category_product')->where('category_id',$category_id)->orderby('category_id','desc')->get();
        $category_by_id = DB::table('tbl_product')->join('category_product','tbl_product.category_id','=','category_product.category_id')
        ->where('tbl_product.category_id',$category_id)->get();
        $all_product_like = DB::table('yeuthich')->get();
        return view('pages.show_category')->with('all_product_like',$all_product_like)->with('category',$cate_product)->with('species_1',$species_product)->with('event_1',$event_product)->with('category_by_id',$category_by_id)->with('cate_name',$cate_name);
    }
}
