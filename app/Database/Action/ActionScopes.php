<?php namespace App\Database\Action;

trait ActionScopes
{
    public function scopeFinished($query)
    {
        return $query->where('status',config('global.ACTION_FINISHED'));
    }

    public function scopeIncoming($query)
    {
        return $query->where('status',config('global.ACTION_INCOMING'));
    }
}