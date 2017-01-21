<?php namespace App\Database\Observers;

use App\Database\Models\Donor;

class DonorObserver
{

    /**
     * @param Donor $donor
     */
    public function creating(Donor $donor)
    {
        $donor->password = config('global.default-password');
    }

    /**
     * @param Donor $donor
     */
    public function created(Donor $donor)
    {
        $defaultRole = settings('default-role');

        $donor->roles()->attach($defaultRole);
    }

    /**
     * @param Donor $donor
     */
    public function deleting(Donor $donor)
    {
        //
    }
}