<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'max:11'],
            'birth_date' => ['required', 'date', 'before:'.now()],
            'gender' => ['required'],
            'country' => ['required'],
            'occupation' => ['required'],
            'pain_type' => ['required']
        ];
    }
}
