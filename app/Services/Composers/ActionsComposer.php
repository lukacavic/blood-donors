<?php namespace App\Services\Composers;

use App\Database\Repositories\ActionsRepository;
use Illuminate\Contracts\View\View;

class ActionsComposer
{
    protected $actions;

    public function __construct(ActionsRepository $actions)
    {
        $this->actions = $actions;
    }

}