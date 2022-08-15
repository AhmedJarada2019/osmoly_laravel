<?php

namespace App\Http\Controllers;

use App\Models\ArrestReceipts;
use App\Models\main;
use App\Models\salefatora;
use App\Models\buyfatora;
use App\Models\city;
use App\Models\vendor;
use App\Models\customer;
use App\Models\fatora;
use App\Models\Paymentreceipt;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $salefatora = salefatora::all();
        $fatoras = fatora::all();
        $buyfatora = buyfatora::all();
        $customer = customer::all();
        $vendor = vendor::all();
        $city  = city::all();
        $payments = Paymentreceipt::all();
        $arrests = ArrestReceipts::all();
        return response()->view('index',
        [
        'fatoras'=>$fatoras,
        'salefatoras' => $salefatora,
        'buyfatoras' => $buyfatora ,
        'customers' => $customer ,
        'vendors' => $vendor ,
        'cities'=>$city,
        'payments'=>$payments,
        'arrests'=>$arrests
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function show(main $main)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function edit(main $main)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, main $main)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function destroy(main $main)
    {
        //
    }
}
