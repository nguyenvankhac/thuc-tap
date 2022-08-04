<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\Customer;
use Auth;
use DB;

class HomeOrderController extends Controller
{
  
    public function checkout()
    {
        $auth = Auth::guard('cus')->user();
        $items = Cart::where('customer_id',$auth->id)->get();
        $totals = Cart::where('customer_id',$auth->id)->select(DB::raw('sum(quantity * price )as total'))->first();
        if($items->count() == 0){
            return view('empty');
        }
        return view('checkout' ,compact('auth','items','totals'));
    }
    public function post_checkout(Request $req){
        $auth = Auth::guard('cus')->user();
        $data = $req->only('name', 'email', 'password', 'phone', 'address');
        $items = Cart::where('customer_id',$auth->id)->get();
        $totals = Cart::where('customer_id',$auth->id)->select(DB::raw('sum(quantity * price )as total'))->first();

        $data['total_price'] = $totals->total;
        $data['customer_id'] = $auth->id;

        if($order = order::create($data)){
            foreach($items as $item)
            {
                OrderDetail::create([
                    'product_id' => $item->product_id,
                    'orders_id' =>  $order->id,
                    'price' =>      $item->price,
                    'quantity' =>   $item->quantity,
                  
                ]);
            }
            Cart::where('customer_id',$auth->id)->delete();
        }
        return redirect()->route('order.success');
    }
    public function success(){
        return view('success');
    }
}
