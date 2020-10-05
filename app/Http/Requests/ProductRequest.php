<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //
            'name' =>'required|unique:products,name|min:5|max:255',
            'unit_price' => 'required|alpha_num',
            'promotion_price' => 'alpha_num',
            'image' =>'required|image',
            'desc' => 'required|min:10|max|255',
            'content' => 'required|min:30'
        ];
    }
}
