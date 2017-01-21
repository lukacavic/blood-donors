<?php

namespace App\Database\Models;

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
