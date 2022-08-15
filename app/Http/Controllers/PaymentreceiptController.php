<?php

namespace App\Http\Controllers;

use App\Models\Paymentreceipt;
use App\Models\vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PaymentreceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = vendor::all();
        $paymentreceipts = Paymentreceipt::all();
         return view('paymentreceipts', compact('vendors' , 'paymentreceipts'));
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
            'vendor_id' => 'required',
            'amount' => 'required',
        ]);
        $vendor = vendor::find($data['vendor_id']);
        $vendor->total = ($vendor->total-$data['amount']);
        $vendor->save();
        Paymentreceipt::create($data);
        return redirect()->route('vendor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paymentreceipt  $paymentreceipt
     * @return \Illuminate\Http\Response
     */
    public function show(Paymentreceipt $paymentreceipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paymentreceipt  $paymentreceipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Paymentreceipt $paymentreceipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paymentreceipt  $paymentreceipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paymentreceipt $paymentreceipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paymentreceipt  $paymentreceipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paymentreceipt $paymentreceipt)
    {
        //
    }
}
