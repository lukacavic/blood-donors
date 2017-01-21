<?php  namespace App\Http\Requests\Backend\Donors;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class ChangeDonorPasswordRequest extends Request
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
            'password'=>'required|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'password.required'=>trans('donors.error_password_required'),
            'password.confirmed'=>trans('donors.error_password_confirmed')
        ];
    }

    /**
     * What to do when validation fails?
     * Show session error, redirect back!
     *
     * @param Validator $validator
     * @return mixed
     */
    protected function failedValidation(Validator $validator)
    {
        flash()->error(trans('donors.password_change_error'));

        return parent::failedValidation($validator);
    }
}
