<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function create() {
        return view('admin.mail.create');
    }

    public function store(Request $request) {
        $request->validate([
            'file' => 'max:2024|mimes:docx,doc,pdf,jpeg,jpg,png,csv,xls,xlsx', //8MB
            'body' => 'required'
        ]);

        $image = $request->file('file');
        $details = [
            'body' => $request->body,
            'file' => $image,
        ];

        if($request->department) {
            $users = User::where('department_id', $request->department)->get();
            foreach($users as $user) {
                \Mail::to($user->email)->send(new SendMail($details));
            }            
        } elseif($request->person) {
            $user = User::where('id', $request->person)->first();
            \Mail::to($user->email)->send(new SendMail($details));
            //\SendMail::to($user->email)->send();
        } else {
            $users = User::all();
            foreach($users as $user) {
                \Mail::to($user->email)->send(new SendMail($details));
            }
        }
        return redirect()->back()->with('message', 'Email Sent!');
    }
}
