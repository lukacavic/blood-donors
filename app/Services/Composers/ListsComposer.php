<?php namespace App\Services\Composers;


use App\Database\Authorization\Permission;
use App\Database\Authorization\Role;
use App\Database\Donor\Donor;
use App\Database\Donor\DonorsRepository;
use App\Database\Location\Location;
use App\Database\Models\BloodType;
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
        $view->with('donors', Donor::pluck('first_name', 'id'));
    }
}