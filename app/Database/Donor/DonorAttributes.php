<?php namespace App\Database\Donor;

use Illuminate\Support\Facades\Hash;

trait DonorAttributes
{
    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function getFullNameLinkAttribute()
    {
        return link_to_route('donor.single', $this->fullName, ['id'=>$this->id], ['class'=>'text-bold']);
    }

    //TODO: This is not good, need to fix.
    public function getBirthdayAttribute($value)
    {
        return ($value != null && $value instanceof Carbon) ? $value->toFormattedDateString() : '';
    }

    public function getAddressAttribute($value)
    {
        return $value . ', ' . $this->location->name;
    }

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}