<?php namespace App\Database\Donor;

trait DonorScopes
{
//Scopes
    public function scopeMale($query)
    {
        return $query->where('sex', config('global.DONOR_MALE'));
    }

    public function scopeFemale($query)
    {
        return $query->where('sex', config('global.DONOR_FEMALE'));
    }

    public function scopeArchived($query)
    {
        return $query->where('archived', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('archived', 0);
    }

    public function scopeSuperAdministrators($query)
    {
        return $query->where('administrator', 1);
    }

    public function scopeWithMobile($query)
    {
        return $query->where('mobile', '!=', null)->where('mobile','!=','');
    }

    public function scopeWithEmail($query)
    {
        return $query->where('email', '!=', null)->where('email','!=','');
    }

    public function scopeWantsSMSContact($query)
    {
        return $query->where('contactType', config('global.DONOR_CONTACT_SMS'))->withMobile();
    }

    public function scopeWantsCardContact($query)
    {
        return $query->where('contactType', config('global.DONOR_CONTACT_CARD'));
    }

    public function scopeWantsEmailContact($query)
    {
        return $query->where('contactType', config('global.DONOR_CONTACT_EMAIL'))->withEmail();
    }
}