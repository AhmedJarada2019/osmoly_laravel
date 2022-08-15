<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\customer;
use App\Models\fatora;
use App\Models\salefatora;
use App\Models\vendor;
use Illuminate\Http\Request;

class FatoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fatoras = fatora::all();
        $city  = city::all();
        $vendor = vendor::all();
        $customer = customer::all();
        return response()->view('index', [
        'customers' => $customer,
        'salefatoras' => $fatoras,
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

        }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total_sale =($request->sale_price *  $request->quantity) + $request->extra_cost;
        $total_buy = ($request->buy_price *  $request->quantity);
        $post = fatora::create([
            'vendor_id'     =>$request->vendor_id,
            'hazera_name'   => $request->hazera_name,
            'city'          => $request->city,
            'phone_number'  => $request->phone_number,
            'quantity'      => $request->quantity,
            'buy_price'     => $request->buy_price,
            'customer_id' => $request->customer_id,
            'salakhana'     => $request->salakhana,
            'sale_price'    => $request->sale_price,
            'extra_cost'    => $request->extra_cost,
            'salakhana'     => $request->salakhana,
            'total_sale'    => $total_sale,
            'total_buy'     => $total_buy,
            'sale_date'     => $request->sale_date,
            'buy_q_type'    => $request->buy_q_type,
            'sale_q_type'   => $request->sale_q_type,
          ]);

          $id = $request->vendor_id;
          $vendor = vendor::all();
          $v = $vendor->find($id);
          $total = $v->total + $total_buy;
          $v->total = $total;
          $v->save();

          $id = $request->customer_id;
          $customer = customer::all();
          $c = $customer->find($id);
          $total = $c->total + $total_sale;
          $c->total = $total;
          $c->save();

          session()->flash('success', 'fatora created successfully');
          return redirect(route('index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fatora  $fatora
     * @return \Illuminate\Http\Response
     */
    public function show(fatora $fatora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fatora  $fatora
     * @return \Illuminate\Http\Response
     */
    public function edit(fatora $fatora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fatora  $fatora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fatora $fatora)
    {
        $fatora->vendor_id       = $request->input('vendor_id');
        $fatora->hazera_name     = $request->input('hazera_name');
        $fatora->city            = $request->input('city');
        $fatora->phone_number    = $request->input('phone_number');
        $fatora->quantity        = $request->input('quantity');
        $fatora->quantity_type   = $request->input('quantity_type');
        $fatora->buy_price       = $request->input('buy_price');
        $fatora->customer_id     = $request->input('customer_id');
        $fatora->salakhana       = $request->input('salakhana');
        $fatora->sale_price      = $request->input('sale_price');
        $fatora->extra_cost      = $request->input('extra_cost');
        $fatora->total           = $request->input('total');
        $fatora->sale_date       = $request->input('sale_date');
        $fatora->buy_q_type      = $request->input('buy_q_type');
        $fatora->sale_q_type     = $request->input('sale_q_type');

        $fatora->save();
        return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fatora  $fatora
     * @return \Illuminate\Http\Response
     */
    public function destroy(fatora $fatora)
    {
        $fatora = $fatora->delete();
        return redirect()->back();
    }
}
