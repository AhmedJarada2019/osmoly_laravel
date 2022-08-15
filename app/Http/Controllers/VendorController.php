<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\fatora;
use App\Models\vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vendor = vendor::all();
        $city =city::all();
        return response()->view('vendors', ['vendor' => $vendor,'cities'=>$city]);

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

        $vendor = vendor::create([
            'vendor_name' => $request->vendor_name,
            'hazera' => $request->hazera,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
            'total' => 0
          ]);

          session()->flash('success', 'تم اضافة مورد بنجاح');
          return redirect(route('vendor.index'));
        }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , vendor $vendor)
    {

        $vendor_name   = $request->input('vendor_name');
        $hazera_name   = $request->input('hazera');
        $date_from     = $request->input('date_from');
        $date_to       = $request->input('date_to');
        $report = $vendor->fatoras()->where('vendor_id',$vendor->id)->whereBetween('sale_date',[$date_from,$date_to])->where('hazera_name',$hazera_name)->get();
        // dd($report);
        // return view('vendor_report');
        // return response()->view('vendor_report', ['report' => $report]);

        return view('vendor_report', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendor $vendor)
    {
        //
        $vendor->vendor_name   = $request->input('vendor_name');
        $vendor->hazera        = $request->input('hazera');
        $vendor->city          = $request->input('city');
        $vendor->phone_number  = $request->input('phone_number');

        $vendor->save();
        return redirect(route('vendor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendor $vendor)
    {
        //
        $id = $vendor->id;
        $ss =$vendor->fatoras()->where('vendor_id',$id)->get();
        $pp =$vendor->paymentreceipt()->where('vendor_id',$id)->get();

        if(count($ss) > 0 || count($pp) > 0){
            session()->flash('danger', 'المورد لديه معاملات لا يمكن حذفه');
            return redirect()->back();
        }else{
            $vendor = $vendor->delete();
            return redirect()->back();
        }
    }
    }
