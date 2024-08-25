<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Lead;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereNull('parent_id')->get();
        return view('digitalclock');

        // return view('users' , compact('users'));
    }

    public function users_json(Request $request)
    {
        $users = User::select(['id', 'name', 'email'])
        ->latest();
        return DataTables::of($users)
        ->addColumn('action', function ($user) {
            return view('backend.customers.includes.action', array('user' => $user));
        })

        ->rawColumns(['action'])
        ->make(true);
    }
    public static function recurringUsers($users)
    {
        return view('backend.customer.index');
        // echo '<ul>';
        // foreach ($users as $user) {
        //     echo '<li>' . $user->name;
        //     if ($user->children->isNotEmpty()) {
        //         self::recurringUsers($user->children);
        //     }
        //     echo '</li>';
        // }
        // echo '</ul>';
    }
    public function clock(){
        return view('digitalclock');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = config('custom.lead_status');
        return view('backend.customers.create', compact('statuses'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeadRequest $request)
    {
        Lead::create($request->validated());
        return to_route('admin.customers.index');
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
        return view('backend.customers.create', compact('statuses' ,'lead'));

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
