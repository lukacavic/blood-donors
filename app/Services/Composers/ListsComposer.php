<?php namespace App\Services\Composers;

use App\Database\Models\BloodType;
use App\Database\Models\Donor;
use App\Database\Models\Location;
use App\Database\Models\Permission;
use App\Database\Models\Role;
use App\Database\Repositories\DonorsRepository;
use Illuminate\Contracts\View\View;

class ListsComposer
{
    protected $donors;

    public function __construct(DonorsRepository $donors)
    {
        $this->donors = $donors;
    }

    public function composeLocationsLists(View $view)
    {
        $view->with('locations', Location::lists('name', 'id'));
    }

    public function composeBloodTypesLists(View $view)
    {
        $view->with('bloodtypes', BloodType::lists('name', 'id'));
    }

    public function composerRolesLists(View $view)
    {
        $view->with('roles', Role::lists('role_title', 'id'));
    }

    public function composePermissionsLists(View $view)
    {
        $view->with('permissions', Permission::lists('permission_title', 'id'));
    }

    public function composerDonorsLists(View $view)
    {
        $view->with('donors', Donor::pluck('id', 'first_name'));
    }
}