<?php

namespace App\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends BaseModel
{
    use SoftDeletes;
    
    protected $dates = ['start_date','published_at'];

    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($action) {
            $action->donors()->detach();
        });

        static::deleting(function ($action) {
            $action->comming()->detach();
        });
    }

    //Attributes
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getDescriptionAttribute($value)
    {
        return ucfirst($value);
    }

    public function getNameWithCodeAttribute()
    {
        return $this->name . ' - ' . $this->code;
    }

    public function getNameLinkAttribute()
    {
        return link_to_route('action', $this->name, ['id'=>$this->id], ['class'=>'text-bold']);
    }

    public function getLocationAttribute($value)
    {
        return ucfirst($value);
    }

    public function getActionDateAttribute()
    {
        return $this->start_date->toFormattedDateString();
    }

    public function successProgress()
    {
        return 100;
    }

    public function success() {
        return $this->donors()->wherePivot('status', 1)->get();
    }

    public function failed() {
        return $this->donors()->wherePivot('status', 0)->get();
    }

    //Scopes
    public function scopeFinished($query)
    {
        return $query->where('status',config('global.ACTION_FINISHED'));
    }

    public function scopeIncoming($query)
    {
        return $query->where('status',config('global.ACTION_INCOMING'));
    }
    
    //Quering

    //Relations

    /**
     * Relation for action donors of success / fail donations
     *
     * @return mixed
     */
    public function donors()
    {
        return $this->belongsToMany(Donor::class, 'action_donor', 'action_id', 'donor_id')->withPivot(['status']);
    }


    /**
     * Relation for donors comming/not coming to action
     *
     * @return mixed
     */
    public function comming()
    {
        return $this->belongsToMany(Donor::class, 'action_donor_going')->withPivot(['going']);
    }

    //Presenters

    public function getStatus()
    {
        switch ($this->status) {
            case config('global.ACTION_INCOMING'):
                return '<span class="label label-success">' . strtoupper(trans('actions.type_incoming')) . '</span>';
                break;
            case config('global.ACTION_FINISHED'):
                return '<span class="label label-primary">' . strtoupper(trans('actions.type_finished')) . '</span>';
                break;
        }
    }

    public function getTitle()
    {
        $type = ($this->status == config('global.ACTION_INCOMING')) ? 'text-green' : '';

        return Html::linkRoute('action', $this->name, $this->id, ['class' => 'text-bold ' . $type]);
    }

}
