<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class customer_report extends Controller
{

    public function customer_report(Request $request , customer $customer)
    {
        // dd($request->all());
        $fatora =array();
        $sum_total=0;
        $customer_id     = $request->input('customer_id');
        $customer_name   = $request->input('customer_name');
        $salakhana       = $request->input('salakhana');
        $date_from       = $request->input('date_from');
        $date_to         = $request->input('date_to');

        $reports = customer::find($customer_id)->fatoras()->whereBetween('sale_date',[$date_from,$date_to])->get();
        foreach ($reports as $report) {
           if($report->salakhana == $salakhana){
            array_push($fatora,$report);
            $sum_total += $report->total_sale;
           }
        }
        return view('customer_report', compact('fatora','sum_total'));
    }

}
