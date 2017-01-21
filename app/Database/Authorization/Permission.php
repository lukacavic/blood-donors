<?php

namespace App\Database\Authorization;

use App\Database\Core\BaseModel;

class Permission extends BaseModel
{
    protected $table = 'permissions';

    protected $guarded = ['id'];

    //Relations

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
