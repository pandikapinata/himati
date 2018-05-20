<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Guest;
use App\Sewa;
use App\Barang_Sewa;
use Auth;

class RentalController extends Controller
{
    public function index()
    {
        $rents = Barang::all();

        return view('rental',compact('rents'));
        // if(auth()->guard('guest')->check()){
        //     $rents = Barang::all();

        //     return view('rental',compact('rents'));
        // }
        // else{
        //     return redirect('guest/login');
        // }

    }

    public function cart(Request $request)
    {
        if(auth()->guard('guest')->check()){
            $brg_selected=$request->brg_id;
            $checkId = Auth::guard('guest')->user()->id;
            $sewa     = Sewa::where('guest_id',$checkId)
                        ->where('status_sewa',1)->get();

            if(empty($sewa[0])){
                $sewa = new Sewa();
                $sewa -> guest_id = $checkId;
                $sewa -> kode_sewa = substr(sha1(time()),5);
                $sewa->save();
                $sewa     = Sewa::where('guest_id',$checkId)
                            ->where('status_sewa',1)->get();
            }

            $sewa_id=$sewa[0]->id;
            $brg_sewa = Barang_Sewa::where('sewa_id',$sewa_id)->where('barang_id',$brg_selected)->get();

            $brg_sewa = new Barang_Sewa();
            $brg_sewa -> sewa_id = $sewa_id;
            $brg_sewa -> barang_id = $brg_selected;
            $brg_sewa -> qty = $request->qty;
            $brg_sewa -> hari_sewa = $request->hari;
            $brg_sewa -> harga = $request->harga;
            $brg_sewa->save();


            return redirect()->back();
        }
        else{
            return redirect('guest/login');
        }




        return redirect('/');
    }
}
