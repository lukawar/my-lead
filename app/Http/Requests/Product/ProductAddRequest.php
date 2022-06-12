<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'required|string',
            'short_description'  => 'required|string',
            'long_description'  => 'required|string',
            'netto_price' => 'required|numeric',
            'tax' => 'required|integer',
            'condition' => 'sometimes|integer',
            'category_id' => 'sometimes|integer'
        ];
    }
}
