<?php


namespace App\Services\Installer\Steps;


use App\Database\Models\Donor\Donor;
use MarvinLabs\SetupWizard\Steps\BaseStep;

class MakeSuperAdministratorStep extends BaseStep
{

    /**
     * @param array $formData An array containing all the form data for that step
     *
     * @return boolean true if the step has been applied successfully
     */
    function apply($formData)
    {
        return Donor::create([
            'firstName'=>'Super',
            'lastName'=>'Administrator'
        ]);
    }

    /**
     * @return boolean true if the step has been undone successfully
     */
    function undo()
    {
        // TODO: Implement undo() method.
    }
}