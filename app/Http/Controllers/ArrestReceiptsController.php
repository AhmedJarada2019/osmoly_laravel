<?php

namespace App\Http\Controllers;

use App\Models\ArrestReceipts;
use App\Models\customer;
use Illuminate\Http\Request;

class ArrestReceiptsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = customer::all();
        $ArrestReceipts = ArrestReceipts::all();
         return view('arrestreceipts', compact('customers' , 'ArrestReceipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id' => 'required',
            'amount' => 'required',
        ]);
        $customer = customer::find($data['customer_id']);
        $customer->total = ($customer->total-$data['amount']);
        $customer->save();
         ArrestReceipts::create($data);
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArrestReceipts  $arrestReceipts
     * @return \Illuminate\Http\Response
     */
    public function show(ArrestReceipts $arrestReceipts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArrestReceipts  $arrestReceipts
     * @return \Illuminate\Http\Response
     */
    public function edit(ArrestReceipts $arrestReceipts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArrestReceipts  $arrestReceipts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArrestReceipts $arrestReceipts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArrestReceipts  $arrestReceipts
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArrestReceipts $arrestReceipts)
    {
        //
    }
}
