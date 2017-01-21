<?php

namespace App\Database\Donor;

use App\Database\LOV\LOV;
use Illuminate\Database\Eloquent\Model;

class DonorContact extends Model
{
    public function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }

    public function contactType()
    {
        return $this->belongsTo(LOV::class, 'contact_type');
    }
}
