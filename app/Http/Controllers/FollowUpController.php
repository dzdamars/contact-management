<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FollowUp;
use App\Models\Customer;
use Illuminate\Http\Request;

class FollowUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FollowUp::orderBy('updated_at', 'desc')->paginate(15);
        return view('tasks.index', compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cust_id)
    {
        $customer = Customer::findOrFail($cust_id);
        $users = User::where('is_admin', false)->get();
        return view('tasks.create',compact('customer','users'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = FollowUp::create([
            'agent_id' => $request->agent,
            'cust_id'   => $request->customer,
            'stat'      => 'uncontacted',
            'remarks'   => $request->remarks ?? 'initial assigment'
            ]);
            HistoryController::store($data);
            return redirect(route('assignable-list'))->with('status','Agent Assigned..');
        }
        
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = FollowUp::findOrFail($id);
        $statValues = FollowUp::getPossibleStatuses();
        // dd($statValues);
        return view('tasks.edit',compact('task','statValues'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = FollowUp::findOrFail($id);
        $task->update([
            'stat'  => $request->stat,
            'remarks'=>$request->remarks
        ]);
        // dd($task);
        HistoryController::store($task);
        return redirect(route('tasks.index'))->with('success', "Follow Up's Status Updated..");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
