<?php

namespace App\Database\Models;

class Role extends BaseModel
{
    protected $table = 'roles';

    protected $guarded = ['id','editable'];
    
    //Attributes
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
    
    //Relations
    public function donors()
    {
        return $this->belongsToMany(Donor::class,'donors_role','role_id','donors_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
