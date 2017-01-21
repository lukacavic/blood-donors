<?php namespace App\Database\Repositories;

use App\Database\Models\Permission;
use App\Database\Repositories\PermissionsRepositoryInterface;

class PermissionsRepository extends BaseRepository
{
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }
}