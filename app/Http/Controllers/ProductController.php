<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Foreach_;

session_start();



class ProductController extends Controller
{
    public function AuthLogin()
    {
        $admins_id = Session::get('admin_id');
        if($admins_id)
            return Redirect::to('dashboard');
        else
            return Redirect::to('admin')->send();
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('category_product')->orderby('category_id','desc')->get();
        $event_product = DB::table('event')->orderby('event_id','desc')->get();
        $species_product = DB::table('species_flower')->orderby('species_id','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_product)->with('event_product',$event_product)->with('species_product',$species_product);

     }
     public function all_product(){
        $this->AuthLogin();
         $all_product = DB::table('tbl_product')->join('category_product','category_product.category_id','=','tbl_product.category_id')
         ->join('event','event.event_id','=','tbl_product.event_id')
         ->join('species_flower','species_flower.species_id','=','tbl_product.species_id')
         ->orderby('tbl_product.product_id','desc')
         ->get();
         $manager_product = view('admin.all_product')->with('all_product',$all_product);
         return view('admin_layout')->with('admin.all_product',$manager_product);
     }
     public function save_product(Request $request){
        $this->AuthLogin();
         $data = array();
         $data['product_name']= $request ->product_name;
         $data['product_price']= $request ->product_price;
         $data['soluong']= $request ->soluong;
         $data['product_content']= $request ->product_content;
         $data['product_status']= $request ->product_status;
         $data['category_id']= $request ->cate;
         $data['event_id']= $request ->event;
         $data['species_id']= $request ->species;

        $get_image = $request -> file('product_image');
        if($get_image){
            $get_name_image = $get_image -> getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
            $get_image ->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
         Session::put('message','Thêm sản phẩm thành công');
         return Redirect::to('add_product');
        }
        $data['product_image'] = '';
         DB::table('tbl_product')->insert($data);
         Session::put('message','Thêm sản phẩm thành công');
         return Redirect::to('add_product');
     }
     public function unactive_product($product_id){
        $this->AuthLogin();
         DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
         Session::put('message',"Kích hoạt danh mục sản phẩm thành công");
         return Redirect::to('all_product');
     }
     public function active_product($product_id){
        $this->AuthLogin();
         DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
         Session::put('message',"Không kích hoạt danh mục sản phẩm thành công");
         return Redirect::to('all_product');
     }
     public function edit_product($product_id){
        $this->AuthLogin();
         $cate_product = DB::table('category_product')->orderby('category_id','desc')->get();
         $event_product = DB::table('event')->orderby('event_id','desc')->get();
         $species_product = DB::table('species_flower')->orderby('species_id','desc')->get();
         $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
         $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('event_product',$event_product)->with('species_product',$species_product);
         return view('admin_layout')->with('admin.edit_product',$manager_product);
     }
     public function update_product(Request $request, $product_id){
        $this->AuthLogin();
         $data = array();
         $data['product_name']= $request ->product_name;
         $data['product_price']= $request ->product_price;
         $data['soluong']= $request ->soluong;
         $data['product_content']= $request ->product_content;
         $data['product_status']= $request ->product_status;
         $data['category_id']= $request ->cate;
         $data['event_id']= $request ->event;
         $data['species_id']= $request ->species;

        $get_image = $request -> file('product_image');
        if($get_image){
            $get_name_image = $get_image -> getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
            $get_image ->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
        }
         DB::table('tbl_product')->where('product_id',$product_id)->update($data);
         Session::put('message','Cập nhật danh mục thành công');
         return Redirect::to('all_product');
     }
     public function delete_product($product_id){
        $this->AuthLogin();
         DB::table('tbl_product')->where('product_id',$product_id)->delete();
         Session::put('message','Xóa danh mục thành công');
         return Redirect::to('all_product');
     }
     // end admin
     public function show_chi_tiet($product_id)
     {
        $species_product = DB::table('species_flower')->where('species_status','1')->orderby('species_id','desc')->get();
        $event_product = DB::table('event')->where('event_status','1')->orderby('event_id','desc')->get();
        $cate_product = DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $product_by_id = DB::table('tbl_product')->where('tbl_product.product_id',$product_id)->get();
        foreach ($product_by_id as $key => $value){
            $cate_id = $value->category_id;
            $event_id = $value->event_id;
            $species_id = $value->species_id;
        }
        $pro_by_cate_id = DB::table('tbl_product')->join('category_product','tbl_product.category_id','=','category_product.category_id')
        ->where('tbl_product.category_id',$cate_id)->get()->random(1);
        $pro_by_event_id = DB::table('tbl_product')->join('event','tbl_product.event_id','=','event.event_id')
        ->where('tbl_product.event_id',$event_id)->get()->random(1);
        $pro_by_spe_id = DB::table('tbl_product')->join('species_flower','tbl_product.species_id','=','species_flower.species_id')
        ->where('tbl_product.species_id',$species_id)->get()->random(1);


        
        return view('pages.chi_tiet_san_pham')->with('event_1',$event_product)->with('species_1',$species_product)->with('category',$cate_product)
        ->with('product_by_id',$product_by_id)->with('pro_by_cate_id',$pro_by_cate_id)->with('pro_by_event_id',$pro_by_event_id)->with('pro_by_spe_id',$pro_by_spe_id);
     }
}
