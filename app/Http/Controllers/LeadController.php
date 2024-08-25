<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadMessageRequest;
use App\Http\Requests\LeadRequest;
use App\Models\Lead;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.leads.index');

        return view('users' , compact('users'));
    }

    public function leads_json(Request $request)
    {
        $leads = Lead::latest();
        return DataTables::of($leads)
        ->addColumn('action', function ($lead) {
            return view('backend.leads.includes.action', array('lead' => $lead));
        })

        ->rawColumns(['action'])
        ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = config('custom.lead_status');
        return view('backend.leads.create', compact('statuses'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeadRequest $request)
    {
        Lead::create($request->validated());
        return to_route('admin.leads.index');
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
        $lead = Lead::findOrFail($id);
        $statuses = config('custom.lead_status');
        return view('backend.leads.edit', compact('statuses' ,'lead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeadMessageRequest $request, string $id)
    {
        $lead = Lead::findOrFail($id);
        $data = $request->all();
        $data['user_id'] = 1;
        $data['lead_message'] = $request->lead_message;
        $lead->lead_update()->create($data);
        return to_route('admin.leads.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
