<?php


namespace App\Http\Requests\Backend\Donors;


use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class EditDonorRequest extends Request
{
    /**
     * Redirect to this route, when validation fails!
     *
     * @var string
     */
    //protected $redirectRoute = "donor.edit";

    public function authorize()
    {
        return true;
    }

    /**
     * The rules for validation!
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:donors,username,'.$this->segment(2),
            'email' => 'email|unique:donors,email,'.$this->segment(2),
        ];
    }

   // public function

    /**
     * What to do when validation fails?
     * Show session error, redirect back!
     *
     * @param Validator $validator
     * @return mixed
     */
    protected function failedValidation(Validator $validator)
    {
        flash()->error('Podaci nisu spremljeni, molimo pokušajte ponovno!');

        return parent::failedValidation($validator);
    }
}