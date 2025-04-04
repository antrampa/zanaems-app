<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = Leave::latest()->get();
        return view('admin.leave.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leaves = Leave::latest()->where('user_id',auth()->user()->id)->get();
        return view('admin.leave.create', compact('leaves'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'from'=>'required',
            'to'=>'required',
            'description'=>'required',
            'type'=>'required'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['message'] = '';
        $data['status'] = 0;
        Leave::create($data);
        return redirect()->back()->with('message', 'Leave Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $leave = Leave::find($id);
        return view('admin.leave.edit', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'from'=>'required',
            'to'=>'required',
            'description'=>'required',
            'type'=>'required'
        ]);

        $data = $request->all();
        $leave = Leave::find($id);
        $data['user_id'] = auth()->user()->id;
        $data['message'] = '';
        $data['status'] = 0;
        $leave->update($data);
        return redirect()->route('leaves.create')->with('message','Leave updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Leave::find($id)->delete();
        return redirect()->route('leaves.create')->with('message','Leave deleted');
    }

    public function acceptReject(Request $request, string $id) 
    {
        $status = $request->status;
        $message = $request->message;
        $leave = Leave::find($id);
        $leave->update([
            'status' => $status,
            'message' => $message
        ]);
        return redirect()->route('leaves.index')->with('message','Leave updated');
    }
}
