<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:5', 'max:200'],
            'birth' => ['required', 'date', 'before:'.now()->toDateString()],
            'phone' => ['required', 'string', 'max:25'],
            'email' => ['nullable', 'email', 'max:200'],
        ];
    }
}
