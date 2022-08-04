<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\category\categoryaddrequst;
use App\Http\Requests\category\categoryupdaterequst;


class categorycontroler extends Controller
{
    public function category()
   {
        
        $data= category::searchFilter()->paginate(5);
        $orderByOptions = config('options.order_option');
       return view('admin.category.index',compact('data'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function trashed(){
        $data1 = category::onlyTrashed()->paginate(5);
        return view('admin.category.trashed',compact('data'));
    }
    // public function restore($id){
    //     $cat = category::withTrashed()->find($id);
    //     $cat->restore;
    //     return redirect()->route('category.ad')
    // }
    public function store(categoryaddrequst $req){
        // // $rules=[
        // //     'name'=>'required|unique:category',
        // // ];
        // // $msg=[
        // //     'name.required'=>'tên danh mục không được để trống',
        // //     'name.unique'=>'tên danh mục đã tồn tại',
        // // ];
        // $req->validate($rules,$msg);
        $form_data=$req->only('name','status');
      
        if(category::create($form_data)){
            return redirect()->route('category1')->with('yes','Thêm mới thành công');
        }
        return redirect()->back()->with('no','thêm mới thất bại');
    }
    public function edit(category $cat){
        return view('admin.category.edit', compact('cat'));
    }
    public function update(category $cat,Request $req){
        // $rules=[
        //     'name'=>'required|unique:category',
        // ];
        // $msg=[
        //     'name.required'=>'tên danh mục không được để trống',
        //     'name.unique'=>'tên danh mục đã tồn tại',
        // ];
        // $req->validate($rules,$msg);
        $form_data=$req->only('name','status');
      
        if($cat->update($form_data)){
            return redirect()->route('category1')->with('yes','cập nhật thành công');
        }
        return redirect()->back()->with('no','cập nhật không thành công');
    }
    public function delete(category $cat){
        if($cat->delete()){
            return redirect()->route('category1')->with('yes','đã xóa danh mục');
        }
        return redirect()->back()->with('no','xóa thất bại');
    }
}