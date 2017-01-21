<?php namespace App\Http\Controllers\Backend;

use App\Database\Repositories\DonorsRepositoryInterface;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    protected $donorsRepository;

    public function __construct(DonorsRepositoryInterface $donorsRepository)
    {
        $this->donorsRepository = $donorsRepository;
    }

    public function reciveSms(Request $request)
    {
        $donor = \App\Database\Models\Donor\Donor::where('mobile',$request->get('From'))->first();
        $action = \App\Database\Models\Action\Action::where('status', config('global.ACTION_INCOMING'))->first();

        if ($donor == null) {
            return \Response::json([
                'success' => false,
                'message'=>'Donor not found',
                'data' => $request->toArray()
            ], 401);

        } else {
            $answer = $request->get('Body');

            if (strtolower($answer) == strtolower('DA')) {
                $action->comming()->sync(array(
                    $donor->id => array('going' => 1)), false);
            } elseif (strtolower($answer) == strtolower('NE')) {
                $action->comming()->sync(array(
                    $donor->id => array('going' => 2)), false);
            } else {
                /*return \Response::json([
                    'success' => false,
                    'message'=>'Input not recognized',
                    'data' => $request->toArray()
                ], 400);*/
                $xml = '<Response><Say>Hello - your app just answered the phone. Neat, eh?</Say></Response>';
                $response = \Response::make($xml, 200);
                $response->header('Content-Type', 'text/xml');
                return $response;
            }

            /*return \Response::json([
                'success' => true,
                'message'=>'Sent...',
                'data' => $request->toArray()
            ],
                201
            );*/
            $xml = '<Response><Say>Hello - your app just answered the phone. Neat, eh?</Say></Response>';
            $response = \Response::make($xml, 200);
            $response->header('Content-Type', 'text/xml');
            return $response;

        }




    }
}
