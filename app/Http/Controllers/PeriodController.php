<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;

class PeriodController extends Controller
{

    public function period()
    {

        $periods = Period::find(1);

        return view('admin.periode.update', compact('periods'));

    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'period_awal' => 'required',
            'period_akhir' => 'required',
            'kabinet' => 'required'
        ]);
        $periods = Period::find(1);
        //return($openkrs);
        $periods->period_awal = $request->period_awal;
        $periods->period_akhir = $request->period_akhir;
        $periods->kabinet = $request->kabinet;
        $periods->save();
        return redirect('admin/period');
    }
}
