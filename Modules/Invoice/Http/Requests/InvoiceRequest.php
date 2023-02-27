<?php

namespace Modules\Invoice\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'supplier_id' => 'nullable',
            'customer_id' => 'nullable',
            'product_id' => 'nullable',
            'category_id' => 'nullable',
            'invoice_no' => 'nullable',
            // 'total_sum' => 'required',
            'description' => 'nullable',
        ];
    }
}
