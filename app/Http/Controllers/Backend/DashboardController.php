<?php namespace App\Http\Controllers\Backend;

use App\Database\Models\Action;
use App\Database\Repositories\DonorsRepository;
use App\Database\Repositories\DonorsRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JavaScript;

class DashboardController extends Controller
{
    protected $donors;

    public function __construct(DonorsRepository $donors)
    {
        $this->donors = $donors;
    }

    public function index()
    {
        $actionsTotal = null;

        $actionsLabels = Action::all()->lists('code');
        foreach (Action::with('donors')->get() as $action) {
            $actionsTotal[$action->name] = $action->donors()->wherePivot('status',1)->count();
        }
        JavaScript::put([
            'actionsLabels' => $actionsLabels,
            'actionsTotal' => $actionsTotal
        ]);


        $topDonors = $this->donors->getTopDonors(settings('dashboard_topdonor_count'));

        return view('dashboard::index', compact('topDonors','actionsLabels','actionsTotal'));
    }
}
