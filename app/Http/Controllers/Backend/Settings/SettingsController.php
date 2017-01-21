<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Database\Models\Role;
use App\Database\Repositories\RolesRepositoryInterface;
use Efriandika\LaravelSettings\Facades\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    protected $roleRepository;


    public function __construct(RolesRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getSettingsGeneral()
    {
        return view('settings::general');
    }


    public function getSettingsRoles()
    {
        $roles = $this->roleRepository->with(['permissions'])->get();
        return view('settings::roles.roles', compact('roles'));
    }


    public function getSettingsCommunity()
    {
        return view('settings::community');
    }


    public function postSettings(Request $request)
    {
        foreach($request->except('_token') as $key => $value) {
            Settings::set($key, $value);
        }

        flash()->success(trans('settings.save'));

        return redirect()->back();
    }
}
