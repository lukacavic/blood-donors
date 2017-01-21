<?php

namespace App\Http\Controllers\Backend;

use App\Database\Repositories\BloodTypesRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BloodTypes\EditBloodTypeRequest;
use Illuminate\Http\Request;

class BloodTypesController extends Controller
{
    protected $bloodTypesRepository;

    public function __construct(BloodTypesRepositoryInterface $bloodTypesRepository)
    {
        $this->bloodTypesRepository = $bloodTypesRepository;
    }

    public function index()
    {
        $bloodTypes = $this->bloodTypesRepository->getAllBloodTypes(['donor']);

        return view('bloodtypes::index', compact('bloodTypes'));
    }

    public function postAdd(Request $request)
    {
        $this->bloodTypesRepository->create($request->toArray());

        flash()->success(trans('bloodtypes.added'));

        return redirect(route('blood-types'));
    }

    public function delete($bloodTypeId)
    {
        $bloodType = $this->bloodTypesRepository->getById($bloodTypeId);

        if ($bloodType->has('donor')) {
            flash()->error(trans('bloodtypes.deleted_error'));

            return redirect()->route('blood-types');
        }

        flash()->success(trans('bloodtypes.deleted'));

        return redirect()->route('blood-types');
    }


    public function postEdit($bloodTypeId, EditBloodTypeRequest $request)
    {
        $this->bloodTypesRepository->updateById($bloodTypeId, $request->all());

        flash()->success(trans('bloodtypes.updated'));

        return redirect()->route('blood-types');
    }
}