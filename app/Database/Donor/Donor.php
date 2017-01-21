<?php

namespace App\Database\Donor;

use App\Database\Authorization\Role;
use App\Database\Core\BelongsToCommunity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Donor extends Authenticatable
{
    use SoftDeletes, DonorRelations, DonorScopes, DonorAttributes, BelongsToCommunity;

    protected $table = 'donors';

    protected $guarded = ['id', 'password_confirmation'];

    protected $dates = ['birthday'];


    public function isSuperAdmin()
    {
        return ($this->administrator == 1) ? true : false;
    }

    public function isArchived()
    {
        return $this->archived == 1;
    }

    public function isMale()
    {
        return $this->sex == config('global.DONOR_MALE');
    }

    public function isFemale()
    {
        return $this->sex == config('global.DONOR_FEMALE');
    }

    public function successDonations()
    {
        return $this->actions()->wherePivot('status', '=', config('global.ACTION_MANAGED_TO_DONATE'))->get();
    }

    public function failedDonations()
    {
        return $this->actions()->wherePivot('status', '=', config('global.ACTION_FAILED_TO_DONATE'))->get();
    }

    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::where('role_slug', $role)->firstOrFail()
        );
    }

    public function hasPermission(Permission $permission)
    {
        return $this->hasRole($permission->roles);
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('role_slug', $role);
        }
        return !!$role->intersect($this->roles)->count();
    }

}
