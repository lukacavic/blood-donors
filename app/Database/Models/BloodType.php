<?php

namespace App\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class BloodType extends BaseModel
{
    use SoftDeletes;

    protected $table = 'blood_types';

    protected $guarded = ['id'];

    //Relations

    public function donor()
    {
        return $this->hasMany(Donor::class,'bloodtype_id');
    }

}
