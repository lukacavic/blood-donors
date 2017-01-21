<?php namespace App\Database\Repositories;

use App\Database\Models\Donor;
use Intervention\Image\Facades\Image;

class DonorsRepository extends BaseRepository
{
    public function __construct(Donor $model)
    {
        $this->model = $model;
    }

    public function getActiveDonors()
    {
        return Donor::with('location', 'bloodtype', 'actions', 'roles')->active()->orderBy('firstName', 'ASC')->get();
    }

    public function createNew(array $request)
    {
        return Donor::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'sex' => $request['sex'],
            'address' => $request['address'],
            'location_id' => $request['location_id'],
            'mobile' => $request['mobile'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'username' => $request['username'],
            'bloodtype_id' => $request['bloodtype_id'],
            'birthday' => $request['birthday']
        ]);

    }

    public function getDonorsWithMobile()
    {
        return Donor::whereNotNull('mobile')->get();
    }

    public function archiveDonor($donorId)
    {
        $donor = $this->getById($donorId);
        $donor->archived = 1;
        $donor->save();

        return $donor;
    }

    public function getArchivedDonors()
    {
        return Donors::with('location', 'bloodtype')->archived()->get();
    }

    public function getMostActiveDonors()
    {
        return $this->model->take(8)->get();
    }

    public function attachProfilePhoto($donorId, $all)
    {
        $donor = $this->getById($donorId);
        $donor->profilePhoto = $all['photo'];
        $donor->save();
        return $donor;
    }

    public function updateProfile($id, $request)
    {
        $user = $this->getById($id);

        if ($request->avatar != null) {

            $imageName = time() . $request->avatar->getClientOriginalName();

            $request->avatar->move(
                config('global.DONOR_AVATARS_FOLDER'), $imageName
            );

            $uploadedFile = config('global.DONOR_AVATARS_FOLDER') . $imageName;

            Image::make($uploadedFile)->fit(160, 160)->save(config('global.DONOR_AVATARS_FOLDER') . $imageName);

            $user->avatar = $imageName;

            return $user->save();

        }

        $user->fill($request->all(['excerpt' => 'avatar']));

        return $user->save();
    }

    public function registerNewDonor($request)
    {
        $role = settings('default_role');
        $donor = $this->create($request);
        $donor->roles()->attach($role);

        return $donor;

    }

    public function deleteDonor($donorId)
    {
        $donor = $this->getById($donorId);
        if ($donor->isSuperAdmin() && $donor->id == auth()->user()->id) {
            return false;
        }
        return $donor->delete();
    }

    public function getAllDonorsForSelect()
    {
        $donors = $this->model->get([
            'id',
            'firstName',
            'lastName',
        ]);
        $items = [];
        foreach ($donors as $donor) {
            $items[$donor->id] = $donor->firstName . ' ' . $donor->lastName;
        }
        return $items;
    }

    public function getTopDonor()
    {
        return $this->getTopDonors()->first();
    }

    public function getTopDonors($count)
    {
        return $this->model->with('actions')->take($count)->get()->sortBy(function ($donors) {
            return $donors->actions->count();
        }, SORT_REGULAR, true);
    }

    public function makeDonorSuperAdministrator($id)
    {
        return $this->updateById($id, ['administrator' => 1]);
    }

    public function getDonorsForSMSContact()
    {
        return $this->model->WantsSMSContact()->get();
    }

    public function getDonorByMobile($get)
    {
        return $this->where('mobile', $get)->first();
    }

    public function changeDonorPassword($donorId, $all)
    {
        return $this->updateById($donorId, ['password' => $all['password']]);
    }

    public function getDonorsForEmailContact()
    {
        return $this->model->WantsEmailContact()->get();
    }

    /**
     * Updates donor by id.
     *
     * @param $donorId
     * @param $data
     */
    public function update($donorId, $data)
    {
        $this->model->findOrFail($donorId)->update($data);
    }

    public function getSingle($donorId)
    {
        return $this->model->with(['actions', 'bloodtype'])->findOrFail($donorId);
    }
    
}