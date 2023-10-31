<?php

namespace App\Http\Controllers\Admin;

use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Position;

class PositionController extends Controller
{
    public function index()
    {
        $position = Position::all();
        return view('admin.pages.position.view',compact('position'));
    }

    public function create()
    {
        return view('admin.pages.position.create');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'posname' => 'required',
            'maxvote' => 'required'
        ],
        [
            'posname.required'=> 'The position name is required.',
            'maxvote.required' => 'The maximum vote is required.'
        ]);

        $position = New Position();
        $position->position_name = $request->posname;
        $position->max_vote = $request->maxvote;
        $position->status = 1;
        $position->save();
        session()->flash('success', 'Position successfully created!');
        return redirect('admin/position/create');
    }

    public function edit($id)
    {
        $position = DB::table('position')->where('position_id',$id)->first();
        return view('admin.pages.position.edit',compact('position'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'posname' => 'required',
            'maxvote' => 'required'
        ],
        [
            'posname.required'=> 'The position name is required.',
            'maxvote.required' => 'The maximum vote is required.'
        ]);

        DB::table('position')
        ->where('position_id',$request->id)
        ->update(['position_name'=>$request->posname,'max_vote'=>$request->maxvote]);
        session()->flash('success', 'Position successfully updated!');
        return redirect('admin/position/view');
    }

    public function delete(Request $request)
    {
        $position = DB::table('position')->where('position_id',$request->posid)->delete();
        session()->flash('success', 'Position successfully deleted!');
        return redirect('admin/position/view');
    }

    public function disable(Request $request)
    {
        DB::table('position')
        ->where('position_id',$request->pos_id)
        ->update(['status'=>0]);
        session()->flash('success', 'Position successfully inactive!');
        return redirect('admin/position/view');
    }

    public function enable(Request $request)
    {
        DB::table('position')
        ->where('position_id',$request->positionid)
        ->update(['status'=>1]);
        session()->flash('success', 'Position successfully active!');
        return redirect('admin/position/view');
    }
}
