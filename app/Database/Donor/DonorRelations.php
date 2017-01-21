<?php namespace App\Database\Donor;

use App\Database\Action\Action;
use App\Database\Authorization\Role;
use App\Database\Location\Location;
use App\Database\LOV\LOV;
use App\Database\Models\BloodType;

trait DonorRelations
{
    public function contacts()
    {
        return $this->hasMany(DonorContact::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function bloodtype()
    {
        return $this->belongsTo(LOV::class, 'bloodtype_id');
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class, 'action_donor', 'donor_id', 'action_id')->withPivot('status');
    }

    public function going()
    {
        return $this->belongsToMany(Action::class, 'action_donor_going')->withPivot(['going']);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'donors_role', 'donors_id', 'role_id');
    }


}