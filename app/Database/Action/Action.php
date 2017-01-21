<?php

namespace App\Database\Action;

use App\Database\Core\BaseModel;
use App\Database\Core\BelongsToCommunity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends BaseModel
{
    use SoftDeletes, ActionScopes, ActionRelations, ActionAttributes, BelongsToCommunity;

    protected $dates = ['start_date', 'published_at'];

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

    public function successProgress()
    {
        return 100;
    }

    public function success()
    {
        return $this->donors()->wherePivot('status', 1)->get();
    }

    public function failed()
    {
        return $this->donors()->wherePivot('status', 0)->get();
    }

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
