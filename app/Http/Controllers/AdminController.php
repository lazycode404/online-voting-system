<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(
            ['username' => $request->username, 'password' => $request->password],
            $request->get('remember')
        ))
        {
            return redirect()->route('admin.dashboard');
        } else {
            session()->flash('error', 'Either Username/Password is incorrect');
            return back()->withInput($request->only('username'));
        }
    }
    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
