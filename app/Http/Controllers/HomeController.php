<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Fungsionaris;
use App\Period;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $period = Period::find(1);
        $kabinet=$period->kabinet;
        $period_awal=$period->period_awal;
        $period_akhir=$period->period_akhir;
       // return $period_akhir;

        $kegiatan = Kegiatan::latest()->get();
        $ketuawakil = DB::table('Fungsionaris')
                    ->join('jabatans', 'jabatans.id', '=', 'fungsionaris.jabatan_id')
                    ->whereBetween('jabatan_id', [1, 3])->where('periode_awal','=',$period_awal)
                    ->where('periode_akhir','=',$period_akhir)->orderBy('jabatan_id', 'asc')->get();

        $sekben = DB::table('Fungsionaris')
                    ->join('jabatans', 'jabatans.id', '=', 'fungsionaris.jabatan_id')
                    ->whereBetween('jabatan_id', [4, 7])->where('periode_awal','=',$period_awal)
                    ->where('periode_akhir','=',$period_akhir)->get();

        return view('index',compact('kegiatan','ketuawakil','sekben','kabinet'));
    }
}
