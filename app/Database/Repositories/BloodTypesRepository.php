<?php namespace App\Database\Repositories;

use App\Database\Models\BloodType;

class BloodTypesRepository extends BaseRepository
{
    public function __construct(BloodType $model)
    {
        $this->model = $model;
    }

    public function getAllBloodTypes($array)
    {
        return $this->with($array)->orderBy('name')->get();
    }

    public function hasRelatedItems($bloodTypeId)
    {
        $item = $this->getById($bloodTypeId);
        if($item->has('donor')) {
            return false;
        }

        return true;
    }


}