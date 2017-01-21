<?php namespace App\Http\Controllers\Backend;

use App\Database\Models\Donor;
use App\Database\Repositories\DonorsRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Backend\Donors\AttachDonorProfilePhotoRequest;
use App\Http\Requests\Backend\Donors\ChangeDonorPasswordRequest;
use App\Http\Requests\Backend\Donors\CreateNewDonorRequest;
use App\Http\Requests\Backend\Donors\EditDonorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DonorsController extends Controller
{
    protected $donors;

    public function __construct(DonorsRepository $donors)
    {
        $this->donors = $donors;
    }

    /**
     * Show active donors.
     *
     * @return mixed
     */
    public function index()
    {
        $donors = Donor::with(['location'])->active()->get();

        return view('donors::index', compact('donors'));
    }

    /**
     * Show archived donors.
     *
     * @return mixed
     */
    public function archivedDonors()
    {
        $donors = Donor::with(['location'])->archived()->get();

        return view('donors::archived', compact('donors'));
    }

    /**
     * Show single donor.
     *
     * @param $donorId
     * @return mixed
     */
    public function getSingle($donorId)
    {
        $donor = Donor::with(['actions'])->findOrFail($donorId);

        return view('backend.donors.single', compact('donor'));
    }

    /**
     * Show form for adding new Donor.
     *
     * @return mixed
     */
    public function getAdd()
    {
        return view('donors::add');
    }


    /**
     * Create new donor.
     *
     * @param CreateNewDonorRequest $request
     * @return mixed
     */
    public function postAdd(CreateNewDonorRequest $request)
    {
        $this->donors->createNew($request->all());

        flash()->success('Novi darivatelj je dodan u sustav.');

        return redirect()->route('donors');
    }

    /**
     * Show form for editing donor.
     *
     * @param $donorId
     * @return mixed
     */
    public function getEditDonor($donorId)
    {
        $donor = Donor::findOrFail($donorId);

        return view('donors::edit', compact('donor'));
    }

    public function postEditDonor(EditDonorRequest $request, $donorId)
    {
        $this->donors->update($donorId, $request->all());

        flash()->success('Uspješno spremljeno!');

        return redirect()->route('donors');
    }

    public function changePassword($donorId, ChangeDonorPasswordRequest $request)
    {
        $this->donors->changeDonorPassword($donorId, $request->all());

        flash()->success(trans('donors.password_changed_success'));

        return redirect()->route('donors');
    }

    public function attachProfilePhoto(AttachDonorProfilePhotoRequest $request, $donorId)
    {
        $this->donors->attachProfilePhoto($donorId, $request->all());

        flash()->success(trans('donors.profile_photo_updated'));

        return redirect(route('donors'));
    }



    public function deleteUser($donorId)
    {
        if ($this->donors->deleteDonor($donorId)) {
            flash()->success(trans('donors.deleted'));

            return redirect(route('donors'));
        }
        flash()->error(trans('donors.error_delete'));

        return redirect()->back();
    }

    public function changeDonorRole(Request $request, $donorId)
    {
        $donor = $this->donors->getById($donorId);

        $donor->roles()->sync($request->get('role'));

        if ($request->has('administrator')) {
            $this->donors->updateById($donorId, $request->only('administrator'));
        }

        flash()->success(trans('donors.role_changed'));

        return redirect()->route('donors');
    }

    public function archiveDonor($donorId)
    {
        $this->donors->archiveDonor($donorId);

        flash()->success(trans('donors.archived'));

        return redirect()->route('donors');
    }



    /**
     * Show single donor page.
     *
     * @param $donorId
     * @return mixed
     */

}
