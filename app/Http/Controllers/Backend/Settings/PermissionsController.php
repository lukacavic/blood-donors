<?php


namespace App\Http\Controllers\Backend\Settings;


use App\Database\Repositories\PermissionsRepositoryInterface;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    protected $permissionsRepository;

    public function __construct(PermissionsRepositoryInterface $permissionsRepository)
    {
        $this->permissionsRepository = $permissionsRepository;
    }
}