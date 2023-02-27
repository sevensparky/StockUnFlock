<?php

namespace Modules\Product\Http\Requests;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'supplier_id' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',
            'product_code' => 'nullable',
            'invoice_code' => 'nullable',
            'quantity' => 'required|numeric',
        ];
    }
}
