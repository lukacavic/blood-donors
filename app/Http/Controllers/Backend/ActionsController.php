<?php namespace App\Http\Controllers\Backend;

use App\Database\Action\Action;
use App\Database\Action\ActionsRepository;
use App\Database\Donor\DonorsRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Actions\CreateNewActionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Services_Twilio_RestException;

class ActionsController extends Controller
{
    protected $actions;

    protected $donors;

    public function __construct(ActionsRepository $actions, DonorsRepository $donors)
    {
        $this->actions = $actions;
        $this->donors = $donors;
    }

    /**
     * Show all actions.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $actions = Action::all();

        return view('actions::index', compact('actions'));
    }

    /**
     * Show view for creating new action.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdd()
    {
        return view('actions::add');
    }

    /**
     * Create new action.
     *
     * @param CreateNewActionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAdd(CreateNewActionRequest $request)
    {
        $this->actions->create($request);

        flash()->success('Nova akcija je dodana!');

        return redirect()->route('actions');
    }

    /**
     * Process deleting action
     *
     * @param $actionId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAction($actionId)
    {
        Action::findOrFail($actionId)->delete();

        flash()->success('Akcija uspješno izbrisana!');

        return redirect()->route('actions');
    }

    /**
     * Change action status.
     *
     * @param $actionId
     * @param Request $request
     * @return mixed
     */
    public function changeActionStatus($actionId, Request $request)
    {
        Action::findOrFail($actionId)->update($request->only('status'));

        flash()->success(trans('actions.status_updated'));

        return redirect()->back();
    }

    /**
     * Show single action, with passed donations, with faied donations.
     * Also, show donors coming or not coming to action.
     *
     * @param $actionId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSingle($actionId)
    {
        $action = Action::with(['comming','donors'])->findOrFail($actionId);

        $comming = $this->actions->getCommingDonors($actionId);
        $notComming = $this->actions->getNotCommingDonors($actionId);

        return view('actions::single', compact('action',  'comming', 'notComming'));
    }

    /**
     * Add donor to action list. Donor has given blood, or donor didn't donated blood.
     *
     * @param $actionId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToActionList($actionId, Request $request)
    {
        $action = $this->actions->getById($actionId);

        if ($request->get('donors') == null) {
            flash()->error(trans('actions.donor_notselected'));

            return redirect()->back();
        }

        foreach ($request->get('donors') as $donor) {
            if ($action->donors()->get()->contains($this->donorsRepository->getById($donor))) {
                flash()->error(trans('actions.donor_existsforaction'));
                return redirect()->back();
            }
        }

        //If "Managed to donate" button is selected, add donor to success list
        if ($request->has('success')) {

            $action->donors()->attach($request->get('donors'),
                array('status' => config('global.ACTION_MANAGED_TO_DONATE')));

            flash()->success(trans('actions.donors_notified_success'));

            return redirect()->back();

        }

        //If "Failed to donate" button is selected, add donor to failed list
        if ($request->has('fail')) {

            $action->donors()->attach($request->get('donors'),
                array('status' => config('global.ACTION_FAILED_TO_DONATE')));

            flash()->success(trans('actions.donors_notified_failed'));

            return redirect()->back();
        }

        return redirect()->back();

    }

    /**
     * Remove donor from actions list
     *
     * @param $actionId
     * @param $donorId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeFromActionList($actionId, $donorId, Request $request)
    {
        $action = $this->actions->getById($actionId);
        $action->donors()->detach($donorId);

        flash()->success(trans('actions.donor_removed'));

        return redirect()->back();
    }

    /**
     * Send email or SMS (based on donor contact type) to all donors who have contact type
     * email or SMS
     *
     * @param $actionId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function askDonors($actionId)
    {
        //Get all donors
        $donors = $this->donorsRepository->getActiveDonors();

        //Get latest active action
        $action = $this->actions->getFirstIncomingAction($actionId);

        //Data for SMS and email
        $data = [
            'location' => $action->place,
            'date' => $action->date->toFormattedDateString(),
            'startTime' => $action->startTime,
            'endTime' => $action->endTime,
            'description' => $action->description
        ];

        //4. Loop each donor
        foreach ($donors as $donor) {
            switch ($donor->contactType) {
                case config('global.DONOR_CONTACT_SMS'):
                    try {
                        SMS::queue('actions::._partials._messages.comingToActionSms', $data,
                            function ($sms) use ($donor) {
                                $sms->to($donor->mobile);
                            });
                    } catch (Services_Twilio_RestException $e) {
                        flash()->error(trans('actions.system_error') . $r->getMessage());

                        return redirect()->route('actions');
                    }
                    break;
                case config('global.DONOR_CONTACT_EMAIL'):
                    Mail::queue('actions::._partials._messages.comingToActionMail', $data,
                        function ($mail) use ($donor) {
                            $mail->from(settings('community_email'), settings('community_name'));
                            $mail->subject(trans('actions.next_action_info'));
                            $mail->to($donor->email);
                        });
                    break;

                default:

            }
        }

        //5. All finished, put flash message and redirect
        flash()->success(trans('actions.message_sent'));

        return redirect()->route('actions');
    }

    /**
     * @param $actionId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function donorCommingToAction($actionId, Request $request)
    {
        //Get action from URL
        $action = $this->actions->getById($actionId);

        // Add donors from request to action.
        $action->comming()->sync(array(
            auth()->user()->id => array('going' => $request->get('type'))
        ), false);

        //All finished, put flash message and redirect
        flash()->success(trans('actions.comming_thanks'));

        return redirect()->back();
    }
}