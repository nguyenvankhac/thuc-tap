<?php
namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {

        return [
              'name'=>'required',
              'category_id'=>'required|exists:category,id',
              'price'=>'required|numeric|min:1000',
                'sale_price'=>'required|numeric|between:0,'.request('price'),
                'upload'=> 'required|file|mimes:jpg,jpeg,png,gif'
              
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Tên sản phẩm không được để trống',
            'category_id.required'=>'Danh mục không được để trống',
            'category_id.exists'=>'Danh mục không tồn tại trong CSDL',
            'price.required'=>'Gía không được để trống',
            'price.numeric'=>'Gía phải là sô',
            'price.min'=>'Gía nhỏ nhất là 1000',
            'sale_price.between'=>'Gía KM chỉ cho phép từ 0 - '.request('price'),
            'upload.mimes'=>'Định dạng file cho phép là:jpg,jpeg,png,gif'
        ];
    }
}

