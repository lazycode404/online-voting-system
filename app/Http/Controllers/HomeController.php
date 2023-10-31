<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Election;
use App\Models\Position;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $election = DB::table('election')
            ->where('status', 1)
            ->select('election.*')
            ->get();

        $positions = DB::table('position')
            ->select('position.*')
            ->get();
        $candidates = DB::table('candidate')
            ->where('candidate.election', $election[0]->election_id)
            ->select('candidate.*')
            ->get();

        return view('home', compact('election', 'positions', 'candidates'));
    }
    public function showplatform($id)
    {
        $platform = Candidate::find($id);
        return response()->json($platform);
    }

    public function submit(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->input('votes') as $positionId => $selectedCandidates) {
                $position = Position::where('position_id', $positionId);
                if (!$position) {
                    continue;
                }
                foreach ($selectedCandidates as $candidateId) {
                    $vote = new Vote();
                    $vote->ballot_no = 'BN'.$request->ballot_no;
                    $vote->voter = auth()->id();
                    $vote->candidate = $candidateId;
                    $vote->position = $positionId;
                    $vote->election = $request->election_id;
                    $vote->save();

                    DB::table('users')
                        ->where('id', auth()->id())
                        ->update(['voter_status' => 1, 'voter_datevoted' => Carbon::now()]);
                }
            }
            DB::commit();
            Auth::logout();
            session()->flash('success', 'Thank you for voting!');
            return redirect('/login');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }
}
