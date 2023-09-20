<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class speciesController extends Controller
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
    public function add_species(){
        $this->AuthLogin(); 
        return view('admin.add_species');
    }
    public function all_species(){
        $this->AuthLogin();
        $all_species = DB::table('species_flower')->get();
        $manager_species_product = view('admin.all_species')->with('all_species',$all_species);
        return view('admin_layout')->with('admin.all_species',$manager_species_product);

    }
    public function save_species_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['species_name']= $request ->species_product_name;
        $data['species_desc']= $request ->species_product_desc;
        $data['species_status']= $request ->species_product_status;

        DB::table('species_flower')->insert($data);
        Session::put('message','Thêm danh loài hoa và cây thành công');
        return Redirect::to('add_species');
    }
    public function unactive_species_product($species_product_id){
        $this->AuthLogin();
        DB::table('species_flower')->where('species_id',$species_product_id)->update(['species_status'=>1]);
        Session::put('message',"Hiển thị loài hoa thành công");
        return Redirect::to('all_species');
    }
    public function active_species_product($species_product_id){
        $this->AuthLogin();
        DB::table('species_flower')->where('species_id',$species_product_id)->update(['species_status'=>0]);
        Session::put('message',"Không hiển thị loài hoa thành công");
        return Redirect::to('all_species');
    }
    public function edit_species($species_product_id){
        $this->AuthLogin();
        $edit_species = DB::table('species_flower')->where('species_id',$species_product_id)->get();
        $manager_species_product = view('admin.edit_species')->with('edit_species',$edit_species);
        return view('admin_layout')->with('admin.edit_species',$manager_species_product);
    }
    public function update_species(Request $request, $species_product_id){
        $this->AuthLogin();
        $data = array();
        $data['species_name']= $request ->species_product_name;
        $data['species_desc']= $request ->species_product_desc;
        DB::table('species_flower')->where('species_id',$species_product_id)->update($data);
        Session::put('message','Cập nhật loài hoa thành công');
        return Redirect::to('all_species');
    }
    public function delete_species($species_product_id){
        $this->AuthLogin();
        DB::table('species_flower')->where('species_id',$species_product_id)->delete();
        Session::put('message','Xóa loài hoa thành công');
        return Redirect::to('all_species');
    }
    //end admin
    public function show_species_home($species_id)
    {
        $cate_product = DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $event_product = DB::table('event')->where('event_status','1')->orderby('event_id','desc')->get();
        $species_product = DB::table('species_flower')->where('species_status','1')->orderby('species_id','desc')->get();
        $species_name = DB::table('species_flower')->where('species_id',$species_id)->orderby('species_id','desc')->get();
        $species_by_id = DB::table('tbl_product')->join('species_flower','tbl_product.species_id','=','species_flower.species_id')
        ->where('tbl_product.species_id',$species_id)->get();
        $all_product_like = DB::table('yeuthich')->get();
        return view('pages.show_species')->with('all_product_like',$all_product_like)->with('species_1',$species_product)->with('event_1',$event_product)->with('category',$cate_product)->with('species_by_id',$species_by_id)->with('species_name',$species_name);
    }
}
