<?php

namespace App\Http\Requests\Frontend;


use App\Http\Requests\Request;

class LoginDonorRequest extends Request
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
                'username' => 'required',
                'password' => 'required',
                'g-recaptcha-response' => 'required|captcha',
            ];
        }
        return [
            'username' => 'required',
            'password' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' =>trans('validation.captcha_required'),
            'g-recaptcha-response.captcha' => trans('validation.captcha')
        ];
    }


}
