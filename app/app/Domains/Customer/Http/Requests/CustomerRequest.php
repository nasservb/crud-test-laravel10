<?php

namespace App\Domains\Customer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => 'string|min:3|max:50|nullable',
            'last_name' => 'string|min:3|max:50|nullable',
            'email' => 'email|max:50|required',
            'phone_number' => 'string|min:3|max:50|nullable',
            'bank_account_number' => 'string|min:13|max:50|nullable',
            'date_of_birth' => 'date|after_or_equal:1990|before_or_equal:2015|nullable',
        ];
    }
}
