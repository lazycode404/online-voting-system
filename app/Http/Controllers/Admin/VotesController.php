<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VotesController extends Controller
{
    public function index()
    {
        $votes = DB::table('votes')
            ->select('votes.*')
            ->get();

        $election = DB::table('election')
            ->select('election.*')
            ->get();

        $count_votes = DB::table('votes')
                    ->distinct('voter')
                    ->count('voter');
        return view('admin.pages.votes', compact('votes','election','count_votes'));
    }
}
