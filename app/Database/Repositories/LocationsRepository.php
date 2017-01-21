<?php namespace App\Database\Repositories;

use App\Database\Models\Location;
use App\Http\Requests\Backend\Locations\CreateNewLocationRequest;

class LocationsRepository extends BaseRepository
{
    public function __construct(Location $model)
    {
        $this->model = $model;
    }

    public function getAllLocations(array $with)
    {
        return $this->with($with)->orderBy('name')->get();
    }

    public function addNewLocation(CreateNewLocationRequest $request)
    {
        return $this->model->create([
            'code'  =>  $request->get('code'),
            'name'  =>  $request->get('name'),
            'description'   =>  $request->get('description')
        ]);
    }
}