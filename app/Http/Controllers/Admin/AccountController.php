<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $account = Admin::all();
        return view('admin.pages.accounts.view',compact('account'));
    }

    public function create()
    {
        return view('admin.pages.accounts.create');
    }

    public function submit(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $account = New Admin();
        if(Admin::where('username',$request->username)->first())
        {
            session()->flash('error', 'Username is already exists!');
            return back();
        }
        else
        {
            $account->username = $request->username;
            $account->password = Hash::make($request->password);
            $account->role = $request->role;
            $account->status = 1;
            $account->save();
            session()->flash('success', 'Account successfully created!');
            return redirect('admin/accounts/create');
        }

    }

    public function edit($id)
    {
        $account = DB::table('admins')->where('id',$id)->first();
        return view('admin.pages.accounts.edit',compact('account'));
    }

    public function update(Request $request)
    {
        $admin = Admin::find($request->id);
        $data = $request->validate([
            'username' => 'required',
            'role' => 'required',
            'status' => 'required'
        ]);

        $admin->update($data);

        if(!empty($request->password))
        {
            $admin->password = Hash::make($request->password);
            $admin->save();
        }
        session()->flash('success', 'Account successfully updated!');
        return redirect('admin/accounts/view');
    }
}
