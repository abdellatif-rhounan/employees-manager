<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first-name'                => 'required|string|max:50',
            'last-name'                 => 'required|string|max:50',
            'identity-number'           => [
                                            'required', 'alpha_num', 'max:30',
                                            Rule::unique('employees', 'identity_number')
                                        ],
            'date-of-birth'             => 'required|date',
            'nationality'               => 'required|string|max:255',
            //**********************
            'email'                     => ['required', 'email', 'max:100',
                                            Rule::unique('employees')
                                        ],
            'phone'                     => [
                                            'nullable', 'string', 'max:30',
                                            Rule::unique('employees')
                                        ],
            'address'                   => 'nullable|string|max:255',
            'social-insurance-number'   => [
                                            'nullable', 'string', 'max:50',
                                            Rule::unique('employees', 'social_insurance_number')
                                        ],
            //*************************
            'department'                => 'required|string|max:255',
            'position'                  => 'required|string|max:255',
            'status'                    => 'nullable|alpha:ascii|max:30',
            'city-center'               => 'nullable|string|max:255',
            'country'                   => 'nullable|string|max:255',
            'salary'                    => 'nullable|numeric|min:0|max:1000000000',
            'account-rib'               => 'nullable|string|max:50',
            'hire-date'                 => 'required|date',
            'termination-date'          => 'nullable|date',
        ];
    }
}
