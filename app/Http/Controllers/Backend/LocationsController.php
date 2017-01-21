<?php

namespace App\Http\Controllers\Backend;

use App\Database\Models\Location;
use App\Database\Repositories\LocationsRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Locations\CreateNewLocationRequest;
use App\Http\Requests\Backend\Locations\EditLocationRequest;

class LocationsController extends Controller
{

    public function index()
    {
        $locations = Location::with(['donors'])->get();

        return view('locations::index', compact('locations'));
    }

    public function postAdd(CreateNewLocationRequest $request)
    {
        Location::create($request->all());

        flash()->success('Lokacija je dodana');

        return redirect(route('locations'));
    }

    public function deleteLocation($locationId)
    {
        $location = Location::findOrFail($locationId);

        if ($location->has('donors')) {
            flash()->error('Darivatelji su pridruženi ovoj lokaciji!');

            return redirect(route('locations'));
        }

        flash()->success('Lokacija izbrisana');

        return redirect(route('locations'));
    }

    public function postEditLocation($locationId, EditLocationRequest $request)
    {
        Location::findOrFail($locationId)->update($request->all());

        flash()->success('Podaci spremljeni');

        return redirect()->route('locations');
    }
}