<?php
namespace App\Database\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Donor extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'donors';

    protected $guarded = ['id','password_confirmation'];

    protected $dates = ['birthday'];

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function getFullNameLinkAttribute()
    {
        return link_to_route('donor.single', $this->fullName, ['id'=>$this->id], ['class'=>'text-bold']);
    }
    
    //TODO: This is not good, need to fix.
    public function getBirthdayAttribute($value)
    {
        return ($value != null && $value instanceof Carbon) ? $value->toFormattedDateString() : '';
    }

    public function getAddressAttribute($value)
    {
        return $value . ', ' . $this->location->name;
    }

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

    //Mutators

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    //Scopes
    public function scopeMale($query)
    {
        return $query->where('sex', config('global.DONOR_MALE'));
    }

    public function scopeFemale($query)
    {
        return $query->where('sex', config('global.DONOR_FEMALE'));
    }

    public function scopeArchived($query)
    {
        return $query->where('archived', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('archived', 0);
    }

    public function scopeSuperAdministrators($query)
    {
        return $query->where('administrator', 1);
    }

    public function scopeWithMobile($query)
    {
        return $query->where('mobile', '!=', null)->where('mobile','!=','');
    }

    public function scopeWithEmail($query)
    {
        return $query->where('email', '!=', null)->where('email','!=','');
    }

    public function scopeWantsSMSContact($query)
    {
        return $query->where('contactType', config('global.DONOR_CONTACT_SMS'))->withMobile();
    }

    public function scopeWantsCardContact($query)
    {
        return $query->where('contactType', config('global.DONOR_CONTACT_CARD'));
    }

    public function scopeWantsEmailContact($query)
    {
        return $query->where('contactType', config('global.DONOR_CONTACT_EMAIL'))->withEmail();
    }

    //Relations

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function bloodtype()
    {
        return $this->belongsTo(BloodType::class, 'bloodtype_id');
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class, 'action_donor', 'donor_id', 'action_id')->withPivot('status');
    }

    public function going()
    {
        return $this->belongsToMany(Action::class, 'action_donor_going')->withPivot(['going']);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'donors_role', 'donors_id', 'role_id');
    }






}
