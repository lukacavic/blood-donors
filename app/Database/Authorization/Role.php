<?php

namespace App\Database\Authorization;

use App\Database\Core\BaseModel;
use App\Database\Donor\Donor;

class Role extends BaseModel
{
    protected $table = 'roles';

    protected $guarded = ['id','editable'];
    
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
    
    public function donors()
    {
        return $this->belongsToMany(Donor::class,'donors_role','role_id','donors_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
