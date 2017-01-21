<?php

namespace App\Database\LOV;

use Illuminate\Database\Eloquent\Model;

class LOV extends Model
{
    protected $table = 'lov';

    public function scopeContactTypes($query)
    {
        return $query->whereCodeLov('CONTACT_TYPE');
    }

    public function scopeBloodTypes($query)
    {
        return $query->whereCodeLov('BLOOD_TYPE');
    }
}
