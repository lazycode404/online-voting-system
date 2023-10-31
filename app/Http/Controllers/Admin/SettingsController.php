<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SMSTemplate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.pages.settings');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'newpass' => 'required',
            'conpass' => 'required'
        ],
        [
            'newpass.required'=> 'Enter new password.',
            'conpass.required' => 'Confirm your password.'
        ]);

        if($request->newpass == $request->conpass)
        {
            DB::table('admins')
            ->where('id',Auth::user()->id)
            ->update(['password'=>Hash::make($request->conpass)]);
            session()->flash('success', 'Password successfully updated!');
            return redirect('admin/settings');
        }
        else{
            session()->flash('error', 'Password does not match, please confirm your password!');
            return redirect('admin/settings');
        }
    }

    public function submitsms(Request $request)
    {
        //dd($request->templatequery);
        $request->validate([
            'templatename' => 'required',
            'template' => 'required',
        ],
        [
            'templatename.required'=> 'Enter template name.',
            'template.required' => 'Enter message',
        ]);

        $template = New SMSTemplate();
        $template->sms_desc = $request->templatename;
        $template->sms_message = $request->template;
        $template->save();

        session()->flash('success', 'SMS template successfully added!');
        return redirect('admin/settings');
    }
}
