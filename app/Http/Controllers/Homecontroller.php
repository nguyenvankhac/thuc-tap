<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class Homecontroller extends Controller
{
    public function home(){
        $NewProduct = product::orderBy('updated_at','DESC')->limit(10)->get();
        $SaleProduct = product::orderBy('updated_at','DESC')->where('sale_price','>',0)->limit(8)->get();
        return view('welcome',compact('NewProduct','SaleProduct'));
    }
    public function category(category $cat){
        return view('category',compact('cat'));
    }
    public function product(product $product,$lug){
        return view('productdetail',compact('product'));
    }
}
