<?php


namespace App\Http\Requests\Backend\Donors;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class CreateNewDonorRequest extends Request
{
    /**
     * Redirect to this route, when validation fails!
     *
     * @var string
     */
    protected $redirectRoute = "donor.add";

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
            'username' => 'required|unique:donors',
            'email' => 'email|unique:donors'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Ime nije upisano',
            'last_name.required' => 'Prezime nije upisano',
            'username.required' => 'Korisničko ime nije upisano',
            'username.unique' => 'Korisničko ime zauzeto',
            'email.unique' => 'Email adresa se već koristi',
            'email.email' => 'Email adresa nije valjana',
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
        flash()->error('Darivatelj nije dodan, provjerite podatke i pokušajte ponovno.');

        return parent::failedValidation($validator);
    }
}
