<?php namespace App\Database\Repositories;

use App\Database\Models\Role;
use App\Database\Repositories\RolesRepositoryInterface;

class RolesRepository extends BaseRepository
{
    public function __construct(Role $model)
    {
        $this->model = $model;
    }
}