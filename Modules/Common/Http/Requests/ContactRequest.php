<?php

namespace Modules\Common\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'info' => 'nullable|min:3',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric',
            'mobile' => 'nullable|numeric',
            'address' => 'nullable',
        ];
    }
}
