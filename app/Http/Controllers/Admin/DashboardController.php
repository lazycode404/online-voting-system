<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $election = DB::table('election')
            ->select('election.*')
            ->get();


        $positions = DB::table('position')
            ->select('position.*')
            ->get();

        $candidates = DB::table('candidate')
            ->where('candidate.election', $election[0]->election_id)
            ->select('candidate.*')
            ->get();

        $voted = DB::table('users')
            ->where('voter_electid', $election[0]->election_id)
            ->where('voter_status', 1)
            ->count();
        $notvoted = DB::table('users')
            ->where('voter_electid', $election[0]->election_id)
            ->where('voter_status', 0)
            ->count();

        $count_active = DB::table('election')
                        ->where('status',1)
                        ->count();

        return view('admin.pages.dashboard', compact('election', 'positions', 'candidates', 'voted','notvoted','count_active'));
    }
}
