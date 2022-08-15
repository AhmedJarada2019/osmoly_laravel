<?php

namespace App\Http\Controllers;

use App\Models\buyfatora;
use App\Models\city;
use App\Models\customer;
use Illuminate\Http\Request;

class BuyfatoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $buyfatora = buyfatora::all();
        $city = city::all();
        return response()->view('buyfatoras', ['buyfatora' => $buyfatora,'cities'=>$city]);

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
        $buyfatora = buyfatora::create([

            'customer_id' => $request->customer_id,
            'salakhana' => $request->salakhana,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'buy_date' => $request->buy_date,
            'quantity_type' => $request->quantity_type
          ]);

          session()->flash('success', 'fatora created successfully');
          return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\buyfatora  $buyfatora
     * @return \Illuminate\Http\Response
     */
    public function show(buyfatora $buyfatora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\buyfatora  $buyfatora
     * @return \Illuminate\Http\Response
     */
    public function edit(buyfatora $buyfatora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\buyfatora  $buyfatora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, buyfatora $buyfatora)
    {

        $buyfatora->name = $request->input('customer_name');
        $buyfatora->salakhana     = $request->input('salakhana');
        $buyfatora->city          = $request->input('city');
        $buyfatora->phone_number  = $request->input('phone_number');
        $buyfatora->quantity      = $request->input('quantity');
        $buyfatora->total         = $request->input('total');
        $buyfatora->quantity_type = $request->input('quantity_type');
        $buyfatora->buy_date      = $request->input('buy_date');


        $buyfatora->save();
        return redirect(route('buyfatora.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\buyfatora  $buyfatora
     * @return \Illuminate\Http\Response
     */
    public function destroy(buyfatora $buyfatora)
    {
        $buyfatora = $buyfatora->delete();
        return redirect()->back();
    }

}
