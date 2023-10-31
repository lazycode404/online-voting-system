<?php

namespace App\Http\Controllers\Admin;

use App\Models\Election;
use App\Models\Position;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index()
    {
        $candidate = DB::table('candidate')
                    ->leftjoin('position','position.position_id','=','candidate.position')
                    ->leftjoin('election','election.election_id','=','candidate.election')
                    ->select('candidate.*','position.position_name','election.election_name')
                    ->get();
        return view('admin.pages.candidate.view',compact('candidate'));
    }

    public function create()
    {
        $election = Election::all();
        $position = DB::table('position')->where('status',1)->get();
        return view('admin.pages.candidate.create',compact('position','election'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'photo' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'pos_id' => 'required',
            'elec_id' => 'required',
            'editor1'=> 'required',
        ],
        [
            'photo.required'=> 'Candidate photo is required.',
            'fname.required' => 'Candidate firstname is required',
            'lname.required' => 'Candidate lastname is required',
            'pos_id.required'=> 'Candidate position is required',
            'elec_id.required'=> 'Candidate election is required',
            'editor1.required' => 'Candidate platform is required'
        ]);

        $image = $request->photo;
        $filename = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/images/candidate');
        $image->move($destinationPath,$filename);

        $candidate = New Candidate();

        $candidate->image = $filename;
        $candidate->fname = $request->fname;
        $candidate->lname = $request->lname;
        $candidate->mname = $request->mname;
        $candidate->suffix = $request->suffix;
        $candidate->position = $request->pos_id;
        $candidate->election = $request->elec_id;
        $candidate->platform = $request->editor1;
        $candidate->save();
        session()->flash('success', 'Candidate successfully created!');
        return redirect('admin/candidate/create');
    }

    public function showplatform($id)
    {
        $platform = Candidate::find($id);
        return response()->json($platform);
    }

    public function edit($id)
    {
        $election = Election::all();
        $position = DB::table('position')->where('status',1)->get();
        $candidate = DB::table('candidate')->where('id',$id)->first();
        return view('admin.pages.candidate.edit', compact('candidate','position','election'));
    }

    public function update(Request $request)
    {
        if($request->photo == NULL)
        {
            $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'pos_id' => 'required',
                'elec_id' => 'required',
                'editor1'=> 'required',
            ],
            [
                'fname.required' => 'Candidate firstname is required',
                'lname.required' => 'Candidate lastname is required',
                'pos_id.required'=> 'Candidate position is required',
                'elec_id.required'=> 'Candidate election is required',
                'editor1.required' => 'Candidate platform is required'
            ]);

            DB::table('candidate')
            ->where('id',$request->cand_id)
            ->update(
                [
                    'fname'=>$request->fname,
                    'lname'=>$request->lname,
                    'mname'=>$request->mname,
                    'suffix'=>$request->suffix,
                    'position'=>$request->pos_id,
                    'election'=>$request->elec_id,
                    'platform'=>$request->editor1
                ]
            );
            session()->flash('success', 'Candidate successfully created!');
            return redirect('admin/candidate/view');
        }
        else
        {

            $image = $request->photo;
            $filename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images/candidate');
            $image->move($destinationPath,$filename);

            $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'pos_id' => 'required',
                'elec_id' => 'required',
                'editor1'=> 'required',
            ],
            [
                'fname.required' => 'Candidate firstname is required',
                'lname.required' => 'Candidate lastname is required',
                'pos_id.required'=> 'Candidate position is required',
                'elec_id.required'=> 'Candidate election is required',
                'editor1.required' => 'Candidate platform is required'
            ]);

            DB::table('candidate')
            ->where('id',$request->cand_id)
            ->update(
                [
                    'image'=>$filename,
                    'fname'=>$request->fname,
                    'lname'=>$request->lname,
                    'mname'=>$request->mname,
                    'suffix'=>$request->suffix,
                    'position'=>$request->pos_id,
                    'election'=>$request->elec_id,
                    'platform'=>$request->editor1
                ]
            );
            session()->flash('success', 'Candidate successfully created!');
            return redirect('admin/candidate/view');
        }
    }
}
