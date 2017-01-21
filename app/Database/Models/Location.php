<?php

namespace App\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends BaseModel
{
    use SoftDeletes;

    protected $table = 'locations';

    protected $guarded = ['id'];

    //Relations
    public function donors()
    {
        return $this->hasMany(Donor::class, 'location_id');
    }
}
