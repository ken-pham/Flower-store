<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Foreach_;

class CartController extends Controller
{
    //
    public function save_cart(Request $request)
    {
        Cart::setGlobalTax(5);
        $productid = $request->hidden_pro_id;
        $soluong =$request->sl;

        
        $product_infor = DB::table('tbl_product')->where('tbl_product.product_id',$productid)->first();
        $data['id'] = $productid;
        $data['qty'] = $soluong;
        $data['name'] = $product_infor->product_name;
        $data['price'] = $product_infor->product_price;
        $data['weight'] = $product_infor->product_price;
        $data['options']['image'] = $product_infor->product_image;
        Cart::add($data);
        if(Cart::count()==5)
        {
            Cart::setGlobalDiscount(5);
        }
        return Redirect::to('/show-cart');
        
    }
    public function show_cart()
    {
        $cate_product = DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $event_product = DB::table('event')->where('event_status','1')->orderby('event_id','desc')->get();
        $species_product = DB::table('species_flower')->where('species_status','1')->orderby('species_id','desc')->get();
        return view('pages.show_cart')->with('category',$cate_product)->with('event_1',$event_product)->with('species_1',$species_product);
    }
    public function delete_to_cart($rowId)
    {
        Cart::update($rowId,0);
        if(Cart::count()==5)
        {
            Cart::setGlobalDiscount(5);
        }
        return Redirect::to('/show-cart');
    }
    public function update_qty_cart(Request $request)
    {
        $rowID=$request->rowId_cart;
        $qty=$request->cart_quantity;
        
        Cart::update($rowID,$qty);
        if(Cart::count()==5)
        {
            Cart::setGlobalDiscount(5);
        }
        return Redirect::to('/show-cart');
    }
    
}
 