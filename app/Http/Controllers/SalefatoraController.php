<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\salefatora;
use App\Models\vendor;
use Illuminate\Http\Request;

class SalefatoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salefatora = salefatora::all();
        $city  = city::all();
        $vendor = vendor::all();
        return response()->view('salefatoras', [
        'salefatoras' => $salefatora,
        'cities'=>$city,
        'vendors'=>$vendor,
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
        $post = salefatora::create([
            'vendor_id'=>$request->vendor_id,
            'hazera_name' => $request->hazera_name,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'sale_date' => $request->sale_date,
            'quantity_type' => $request->quantity_type
          ]);

          


          session()->flash('success', 'fatora created successfully');
          return redirect(route('index'));
        }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\salefatora  $salefatora
     * @return \Illuminate\Http\Response
     */
    public function show(salefatora $salefatora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\salefatora  $salefatora
     * @return \Illuminate\Http\Response
     */
    public function edit(salefatora $salefatora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\salefatora  $salefatora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, salefatora $salefatora)
    {
        //
        // $salefatora = salefatora::find($salefatora);

        $salefatora->vendor_id     = $request->input('vendor_id');
        $salefatora->hazera_name   = $request->input('hazera_name');
        $salefatora->city          = $request->input('city');
        $salefatora->phone_number  = $request->input('phone_number');
        $salefatora->quantity      = $request->input('quantity');
        $salefatora->total         = $request->input('total');
        $salefatora->quantity_type = $request->input('quantity_type');
        $salefatora->sale_date     = $request->input('sale_date');

        $salefatora->save();
        return redirect(route('salefatora.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\salefatora  $salefatora
     * @return \Illuminate\Http\Response
     */
    public function destroy(salefatora $salefatora)
    {
        //
        $salefatora = $salefatora->delete();
        return redirect()->back();
    }
}
