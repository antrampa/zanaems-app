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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.leave.create');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
