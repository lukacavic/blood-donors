<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Database\Models\Permission\Permission;
use App\Database\Repositories\RolesRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    protected $rolesRepository;

    public function __construct(RolesRepositoryInterface $rolesRepository)
    {
        $this->rolesRepository = $rolesRepository;
    }

    public function postDelete($roleId)
    {
        $this->rolesRepository->deleteById($roleId);

        flash()->success(trans('roles.deleted'));

        return redirect()->route('settings.roles');
    }

    public function postEdit($roleId, Request $request)
    {
        $this->rolesRepository->updateById($roleId, $request->all());

        flash()->success(trans('roles.edited'));

        return redirect()->route('settings.roles');
    }

    public function getSingleRole($roleId)
    {
        $role = $this->rolesRepository->with(['permissions'])->getById($roleId);

        return view('backend.settings.roles.single', compact('role'));
    }

    public function updateRolePermissions($roleId, Request $request)
    {
        $role = $this->rolesRepository->getById($roleId);

        foreach($request->get('permissions') as $permission) {
            if($role->permissions()->get()->contains(Permission::find($permission))) {
                flash()->error(trans('roles.permission_exists'));

                return redirect()->back();
            }

            $role->permissions()->sync($request->get('permissions'));
        }

        $role->permissions()->sync($request->get('permissions'));

        flash()->success(trans('roles.permission_added'));

        return redirect()->route('settings.roles');
    }

    public function removeRolePermission($roleId, $permissionId)
    {
        $role = $this->rolesRepository->getById($roleId);

        $role->permissions()->detach($permissionId);

        flash()->success(trans('roles.permission_removed'));

        return redirect()->route('settings.roles');
    }
}