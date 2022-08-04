<?php
namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class categoryaddrequst extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
              'name'=>'required|unique:category',
              
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'tên danh mục không được để trống',
            'name.unique'=>'tên danh mục  đã tồn tại trong csdl',
        ];
    }
}

