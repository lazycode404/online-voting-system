<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\Election;
use App\Models\SMSTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ElectionController extends Controller
{
    public function index()
    {
        $election = Election::all();
        return view('admin.pages.election.view', compact('election'));
    }

    public function create()
    {
        return view('admin.pages.election.create');
    }

    public function submit(Request $request)
    {
        $this->validate(
            $request,
            [
                'electname' => 'required',
                'startdate' => 'required',
                'enddate' => 'required'
            ],
            [
                'electname.required' => 'The election name is required.',
                'startdate.required' => 'The start date is required.',
                'enddate.required' => 'The end date is required.'
            ]
        );

        $election = new Election();
        $election->election_name = $request->electname;
        $election->stardate = $request->startdate;
        $election->enddate = $request->enddate;
        $election->status = 0;
        $election->save();
        session()->flash('success', 'Election successfully created!');
        return redirect('admin/election/create');
    }

    public function edit($id)
    {
        $election = DB::table('election')->where('election_id', $id)->first();
        return view('admin.pages.election.edit', compact('election'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'electname' => 'required',
                'startdate' => 'required',
                'enddate' => 'required'
            ],
            [
                'electname.required' => 'The election name is required.',
                'startdate.required' => 'The start date is required.',
                'enddate.required' => 'The end date is required.'
            ]
        );

        DB::table('election')
            ->where('election_id', $request->id)
            ->update(['election_name' => $request->electname, 'stardate' => $request->startdate, 'enddate' => $request->enddate]);
        session()->flash('success', 'Election successfully updated!');
        return redirect('admin/election/view');
    }
    public function start(Request $request)
    {

        DB::beginTransaction();

        try {
            DB::table('election')
                ->update(['status' => 0]);

            DB::table('election')
                ->where('election_id', $request->elect_id)
                ->update(['status' => 1]);

                $selectedQuery = SMSTemplate::find(1);

                $queryResult = DB::select($selectedQuery->sms_query);

                foreach ($queryResult as $row) {
                    $smsContent = $selectedQuery->sms_message;

                    foreach ($row as $column => $value) {
                        $smsContent = str_replace("{{$column}}", $value, $smsContent);
                    }
                    $phone_number = $row->cellnum;
                    $sender_name = "WebTechCo";

                    $client = new Client();

                    $response = $client->post('https://semaphore.co/api/v4/messages', [
                        'form_params' => [
                            'apikey' => '2e488c53b94e69c7f6285c73a4cd5ac1',
                            'number' => $phone_number,
                            'message' => $smsContent,
                            'sendername' => $sender_name
                        ],
                    ]);

                    $statusCode = $response->getStatusCode();
                }
                $responseBody = $response->getBody()->getContents();
                DB::commit();
                session()->flash('success', 'Election is now officially open!');
                return redirect('admin/election/view');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', $e);
            return redirect('admin/election/view');
        }
    }
    public function stop(Request $request)
    {
        DB::table('election')
            ->where('election_id', $request->elect_id2)
            ->update(['status' => 0]);
        session()->flash('success', 'Election is now officially close!');
        return redirect('admin/election/view');
    }
}
