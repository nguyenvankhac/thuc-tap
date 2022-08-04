<?php

namespace App\Http\Controllers;

use App\product;
use App\category;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Requests\product\ProductCreateRequest;
use App\Http\Requests\product\productupdaterequest;


use Str;


class Productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $data = product::searchFilter()->paginate(5);
        $cats = category::orderBy('name','ASC')->get();
       return view('admin.product.index',compact('data','cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = category::orderBy('name','ASC')->get();
       return view('admin.product.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productcreaterequest $request)
    {
        $data = $request->only('content','status','category_id','sale_price','price','name');
        $data['status']= $request->status ? 1 : 0;
        $ex = $request->upload->extension();

        $file_name = 'PRODUCT'.time().'-'.strtoupper(Str::random(10)).'-'.$ex;
       
        if($request->upload->move(public_path('uploads'), $file_name)){
            $data['image']= $file_name;
        }
        if(Product::create($data)){
            return redirect()->route('product.index')->with('yes','Thêm mới thành công');
        }
        return redirect()->back()->with('no','thêm mới thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cats = category::orderBy('name','ASC')->get();
        return view('admin.product.edit',compact('cats','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(productupdaterequest $request, Product $product)
    {
        $data = $request->only('content','status','category_id','sale_price','price','name');
        $data['status']= $request->status ? 1 : 0;
        if($request->has('$request->upload')){
            $ex = $request->upload->extension();

            $file_name = 'PRODUCT'.time().'-'.strtoupper(Str::random(10)).'-'.$ex;
       
            if($request->upload->move(public_path('uploads'), $file_name)){
                $data['image']= $file_name;
            }

        }else{
            $data['image'] = $product->image;
        }

        // cập nhật
        if($product->update($data)){
            return redirect()->route('product.index')->with('yes','cập nhật thành công');
        }
        return redirect()->back()->with('no','cập nhật không thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //Model:delete();
        if($product->hasDetail->count() == 0){
            $product->delete();
            return redirect()->route('product.index')->with('yes','Xóa sản phẩm thành công');
        };
        return redirect()->route('product.index')->with('no','Sản phẩm đã có mặt trong chi tiết đơn hàng');
        //Model:destroy(); xóa nhiều 1,2,3 sản phẩm;
    }
    public function deleteAll(Request $req)
    {
        $ids = $req->id;
        $n =0;
        $n1=0;
        foreach($ids as $id){
            $product = product::find($id);
            if($product->hasDetail->count() == 0){
                $product->delete();
                $n ++;
            }else{
                $n1 ++; 
                
            }
            
        }
        return redirect()->route('product.index')->with('yes','Đã xóa ('. $n.') sản phẩm, và có ('. $n.') sản phẩm không thể xóa');
    }
}
