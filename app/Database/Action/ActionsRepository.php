<?php namespace App\Database\Action;

use App\Database\Core\BaseRepository;

class ActionsRepository extends BaseRepository
{

    public function __construct(Action $model)
    {
        $this->model = $model;
    }

    public function create(array $request)
    {
        $startTime = date("h:i:s", strtotime($request->get('startTime')));
        $endTime = date("h:i:s", strtotime($request->get('endTime')));

        return $this->model->create([
            'code' => $request->get('code'),
            'name' => $request->get('name'),
            'status' => $request->get('status'),
            'place' => $request->get('location'),
            'date' => $request->get('date'),
            'startTime' => $startTime,
            'endTime' => $endTime,
            'description' => $request->get('description')
        ]);
    }

    /**
     * Change status of action.
     *
     * @param $actionId
     * @param $status
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function changeActionStatus($actionId, $status)
    {
        $action = $this->getById($actionId);
        $action->status = $status;
        $action->save();

        return $action;
    }

    public function getSingleAction($actionId, $array)
    {
        return $this->with($array)->getById();
    }

    public function getFailedActionDonors($actionId)
    {
        return $this->model->with(['donors.location'])->find($actionId)->donors()->wherePivot('status', 0)->get();
    }

    public function getPassedActionDonors($actionId)
    {
        return $this->model->with(['donors.location'])->find($actionId)->donors()->wherePivot('status', 1)->get();
    }

    public function getFirstIncomingAction()
    {
        return $this->model->incoming()->first();
    }

    public function getAllActions()
    {
        return $this->orderBy('created_at','ASC')->get();
    }

    public function getCommingDonors($actionId)
    {
        return $this->model->find($actionId)->comming()->wherePivot('going', 1)->get();    }

    public function getNotCommingDonors($actionId)
    {
        return $this->model->find($actionId)->comming()->wherePivot('going', 2)->get();
    }
}