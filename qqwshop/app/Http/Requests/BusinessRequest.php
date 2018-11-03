<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
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
            'login_name'=>'required',
            'login_pwd'=>'required',
            'shop_name'=>'required',
            'company_name'=>'required',
            'company_phone'=>'required',
            'company_address'=>'required',
            'contacts_name'=>'required',
            'contacts_qq'=>'required',
            'contacts_phone'=>'required',
            'contacts_email'=>'required',
            'b_l_n'=>'required',
            't_r_c'=>'required',
            'o_c_c'=>'required',
            'l_r'=>'required',
            'l_r_id'=>'required',
            'n_o_a_b'=>'required',
            'bank_branch'=>'required',
            'bank_account'=>'required',
        ];
    }
}
