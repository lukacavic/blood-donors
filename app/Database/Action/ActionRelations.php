<?php namespace App\Database\Action;

use App\Database\Donor\Donor;

trait ActionRelations
{
    public function donors()
    {
        return $this->belongsToMany(Donor::class, 'action_donor', 'action_id', 'donor_id')->withPivot(['status']);
    }

    public function comming()
    {
        return $this->belongsToMany(Donor::class, 'action_donor_going')->withPivot(['going']);
    }
}