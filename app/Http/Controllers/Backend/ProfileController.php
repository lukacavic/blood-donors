<?php namespace App\Http\Controllers\Backend;

use App\Database\Repositories\DonorsRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Donors\ChangeDonorPasswordRequest;
use App\Http\Requests\Backend\Profile\UpdateProfileRequest;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    protected $donorsRepository;

    public function __construct(DonorsRepositoryInterface $donorsRepository)
    {
        $this->donorsRepository = $donorsRepository;
    }

    public function getEdit()
    {
        Session::put('donorId', auth()->user()->id);
        $donor = auth()->user();
        return view('backend.donors.single', compact('donor'));
    }

    public function postEdit(UpdateProfileRequest $request)
    {
        $donor = Session::get('donorId');

        $this->donorsRepository->updateProfile($donor, $request);

        flash()->success(trans('profile.saved'));

        return redirect()->route('profile.edit');
    }

    public function changePassword(ChangeDonorPasswordRequest $request)
    {
        $donor = Session::get('donorId');

        $this->donorsRepository->changeDonorPassword($donor, $request->all());

        flash()->success(trans('donors.password_changed_success'));

        return redirect()->back();
    }
}