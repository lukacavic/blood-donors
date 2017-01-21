<?php namespace App\Database\Action;

trait ActionAttributes
{
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
}