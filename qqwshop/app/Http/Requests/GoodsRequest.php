<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsRequest extends FormRequest
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
            'goods_type_id'=>'required',
            'goods_type_id2'=>'required',
            'goods_type_id3'=>'required',
            'goods_name'=>'required',
            'brand_id'=>'required',
            'goods_logo'=>'required',
            'description'=>'required',
            'goods_image'=>'required',
            'attr_name'=>'required',
            'attr_value'=>'required',
            'sku_name'=>'required',
            'sku_value'=>'required',
        ];
    }
}
