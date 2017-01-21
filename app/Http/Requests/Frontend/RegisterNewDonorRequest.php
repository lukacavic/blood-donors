<?php

namespace App\Http\Requests\Frontend;


use App\Http\Requests\Request;

class RegisterNewDonorRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (settings('site_recaptcha') == 1) {
            return [
                'firstName' => 'required',
                'lastName' => 'required',
                'username' => 'required|unique:donors',
                'password' => 'required|confirmed',
                'g-recaptcha-response' => 'required|captcha',
            ];
        }

        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => 'required|unique:donors',
            'password' => 'required|confirmed'
        ];

    }

    public function messages()
    {
        return [
            'firstName.required' => trans('auth.register_firstname_required'),
            'lastName.required' => trans('auth.register_lastname_required'),
            'username.required' => trans('auth.register_username_required'),
            'username.unique' => trans('auth.register_username_unique'),
            'password.required' => trans('auth.register_password_required'),
            'password.confirmed' => trans('auth.register_password_match'),
            'g-recaptcha-response.required' =>trans('validation.captcha_required'),
            'g-recaptcha-response.captcha' => trans('validation.captcha')
        ];
    }
}
