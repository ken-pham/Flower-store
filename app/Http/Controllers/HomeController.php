<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $event_product = DB::table('event')->where('event_status','1')->orderby('event_id','desc')->get();
        $species_product = DB::table('species_flower')->where('species_status','1')->orderby('species_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(9)->get();
        $all_product_like = DB::table('yeuthich')->get();
         return view('pages.home')->with('category',$cate_product)->with('all_product',$all_product)->with('all_product_like',$all_product_like)->with('event_1',$event_product)->with('species_1',$species_product);
    }

    public function search(Request $request)
    {
        $cate_product = DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $event_product = DB::table('event')->where('event_status','1')->orderby('event_id','desc')->get();
        $species_product = DB::table('species_flower')->where('species_status','1')->orderby('species_id','desc')->get();
        // $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(9)->get();
        $key = $request->key_word;
        $search_pro = DB::table('tbl_product')->where('product_name','like','%'.$key.'%')->get();
         return view('pages.search')->with('category',$cate_product)->with('event_1',$event_product)->with('species_1',$species_product)->with('search_pro',$search_pro);
    }
    public function yeu_thich()
    {
        $cust =Session::get('custom_id');
        $cate_product = DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $event_product = DB::table('event')->where('event_status','1')->orderby('event_id','desc')->get();
        $species_product = DB::table('species_flower')->where('species_status','1')->orderby('species_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();
        $all_product_yeuthich = DB::table('yeuthich')->where('yeuthich.custom_id',$cust)->get();
        return view('pages.yeu_thich')->with('category',$cate_product)->with('all_product',$all_product)->with('event_1',$event_product)->with('species_1',$species_product)->with('all_product_yeuthich',$all_product_yeuthich);  
    }
    public function add_yeu_thich(Request $request)
    {
        $data = array();
        $data['custom_id']=Session::get('custom_id');
        $data['product_id']= $request->like_pro_id;
        DB::table('yeuthich')->insert($data);
        return Redirect::to('/yeu-thich');  
    }
    public function bo_yeu_thich(Request $request)
    {
        $customer_ids=Session::get('custom_id');
        $product_like_id= $request->like_pro_id;
        DB::table('yeuthich')->where('product_id',$product_like_id)->where('custom_id',$customer_ids)->delete();
    
        return Redirect::to('/yeu-thich');  
    }
}
