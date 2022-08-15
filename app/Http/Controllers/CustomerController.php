<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\customer;
use App\Models\fatora;
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
        $customer = customer::all();
        $city =city::all();
        return response()->view('customers', ['customer' => $customer,'cities'=>$city]);

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

        $customer = customer::create([
            'customer_name' => $request->customer_name,
            'salakhana' => $request->salakhana,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
            'total' => 0
          ]);

          session()->flash('success', 'تم اضافة زبون بنجاح');
          return redirect(route('customer.index'));
        }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        $customer->customer_name = $request->input('customer_name');
        $customer->salakhana     = $request->input('salakhana');
        $customer->city          = $request->input('city');
        $customer->phone_number  = $request->input('phone_number');

        $customer->save();
        return redirect(route('customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        $id = $customer->id;
        $ss =$customer->fatoras()->where('customer_id',$id)->get();
        $arrest =$customer->ArrestReceipts()->where('customer_id',$id)->get();

        if(count($ss) > 0 || count($arrest) > 0){
            session()->flash('danger', 'الزبون لديه معاملات لا يمكن حذفه');
            return redirect()->back();
        }else{
            $customer = $customer->delete();
            return redirect()->back();
        }
    }
}
