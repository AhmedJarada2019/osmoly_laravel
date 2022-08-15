<?php

namespace App\Http\Controllers;

use App\Models\vendor;
use Illuminate\Http\Request;

class Vendor_report extends Controller
{
    public function vendor_report(Request $request , vendor $vendor)
    {
        // dd($request->all());
        $fatora =array();
        $sum_total=0;
        $vendor_id     = $request->input('vendor_id');
        $vendor_name   = $request->input('vendor_name');
        $hazera        = $request->input('hazera');
        $date_from     = $request->input('date_from');
        $date_to       = $request->input('date_to');
        // ->whereBetween('sale_date',[$date_from,$date_to])->where('hazera_name',$hazera)->get();
        $reports = vendor::find($vendor_id)->fatoras()->whereBetween('sale_date',[$date_from,$date_to])->get();
        foreach ($reports as $report) {
           if($report->hazera_name == $hazera){
            array_push($fatora,$report);
            $sum_total += $report->total_buy;
           }
        }
        return view('vendor_report', compact('fatora','sum_total'));
    }
}
