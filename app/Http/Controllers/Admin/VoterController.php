<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Election;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class VoterController extends Controller
{
    public function index()
    {
        $voters = DB::table('users')
                ->leftjoin('election','election.election_id','=','users.voter_electid')
                ->select('users.*','election.election_name')
                ->get();
        return view('admin.pages.voters.view',compact('voters'));
    }

    public function create()
    {
        $election = Election::all();
        return view('admin.pages.voters.create',compact('election'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'elec_id' => 'required',
            'cellnum' => 'required'
        ],
        [
            'fname.required'=> 'First name is required.',
            'lname.required' => 'Last name is required.',
            'address.required' => 'Address is required',
            'elec_id.required' => 'Election is required',
            'cellnum.required' => 'Cellphone number is required'
        ]);

        $voters = new User();
        $voters->code = mt_rand(1000000, 9999999);
        $voters->voter_fname = $request->fname;
        $voters->voter_lname = $request->lname;
        $voters->voter_mname = $request->mname;
        $voters->voter_address = $request->address;
        $voters->voter_cellnum = $request->cellnum;
        $voters->voter_status = 0;
        $voters->voter_electid = $request->elec_id;
        $voters->password = Hash::make('123456789');
        $voters->save();
        session()->flash('success', 'Voters successfully added!');
        return redirect('admin/voter/create');
    }
}
