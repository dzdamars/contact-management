<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\FollowUp;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::paginate(20);
        return view('customers.index', compact('customers'));
    }

    public function assignableList() {
        $customers = Customer::paginate(20);
        foreach ($customers as $key => $customer) {
            if ($customer->task()->exists()) {
                $customers->forget($key);
            }
        } 
        // $customers = $data->paginate(20);
        return view('customers.assignable', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'phone' => 'required|max:15',
            'email' =>  'required|email'
        ]);

        $data = Customer::create([
            'name'  =>  $request->name,
            'phone' =>  $request->phone,
            'email' =>  $request->email
        ]);
        return redirect(route('customers.index'))->with('success', 'Data Saved...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit',compact('customer'));
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
        $customer = Customer::findOrFail($id);
        $customer->update([
            'name' => $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email
        ]);
        return redirect(route('customers.index'))->with('success', 'Data Updated...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect(route('customers.index'))->with('delete', 'Data has been deleted...');
    }
}
