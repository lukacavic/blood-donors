<?php

namespace App\Database\Location;

use App\Database\Core\BaseModel;
use App\Database\Donor\Donor;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends BaseModel
{
    use SoftDeletes;

    protected $table = 'locations';

    protected $guarded = ['id'];

    public function donors()
    {
        return $this->hasMany(Donor::class, 'location_id');
    }
}
