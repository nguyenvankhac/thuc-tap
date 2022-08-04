<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Customer;
use Auth;
use DB;

class HomeCartController extends Controller
{
    public function view(){
        
        $auth = Auth::guard('cus')->user();
        $items = Cart::where('customer_id',$auth->id)->get();
        $totals = Cart::where('customer_id',$auth->id)->select(DB::raw('sum(quantity * price )as total'))->first();
        return view('cart',compact('items','totals'));
    }

   public function add(product $product, $quantity = 1)
   {
    $auth = Auth::guard('cus')->user();
    $cart_item = Cart::where([ 'product_id' => $product->id, 'customer_id' => $auth->id ])->first();
    if($cart_item){ 
        $cart_item->increment('quantity');
    }
    else{
        Cart::create([
            'product_id' => $product->id,
            'price' => $product->sale_price > 0 ? $product->sale_price : $product->price,
            'quantity' => $quantity,
            'customer_id' =>$auth->id
        ]);
       
    }
    return redirect()->route('home')->with('yes','thêm sản phẩm thành công');
   }
   public function remove($id){
    $cart_item = cart::find($id);
    if($cart_item){
        $cart_item->delete();
    }
    return redirect()->route('cart.view');
   }
   public function update($id){
    $cart_item = cart::find($id);
    $quantity = Request('quantity',1);
    if($cart_item){
        $cart_item->update(['quantity' => $quantity]);
    }
    return redirect()->route('cart.view');
   }
   public function clear(){
    $auth = Auth::guard('cus')->user();
    Cart::where('customer_id',$auth->id)->delete();
    return redirect()->route('cart.view');
   }
}