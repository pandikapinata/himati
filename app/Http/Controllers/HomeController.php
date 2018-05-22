<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Fungsionaris;
use App\Period;
use App\Newsfeed;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $period = Period::find(1);
        $kabinet=$period->kabinet;
        $period_awal=$period->period_awal;
        $period_akhir=$period->period_akhir;
       // return $period_akhir;
        // $Content="<strong>Google</strong>&nbsp;(NASDAQ: GOOG) merupakan salah satu perusahaan yang paling mengagumkan di seluruh dunia, banyak&nbsp;<em>googling,&nbsp;</em>sebuah istilah yang digunakan untuk mencari informasi pada web. Apa yang dimulai dari proyek 2 orang mahasiswa lulusan Stanford University &ndash; Larry Page dan Sergey Brin &ndash; pada tahun 1996, Google menjadi&nbsp;<em><strong>web search engine</strong>&nbsp;</em>yang paling sering digunakan di internet dengan 1 milyar pencarian per hari pada tahun 2009, dan juga aplikasi inovatif lainnya seperti Gmail, Google Earth, Google Maps, dan Picasa. Google bertumbuh dari hanya 1 karyawan yang";
        // $Content = strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$Content));
        // return($Content);
        $kegiatan = Kegiatan::latest()->get();

        $news = Newsfeed::latest()->get();

        $ketuawakil = DB::table('Fungsionaris')
                    ->join('jabatans', 'jabatans.id', '=', 'fungsionaris.jabatan_id')
                    ->whereBetween('jabatan_id', [1, 3])->where('periode_awal','=',$period_awal)
                    ->where('periode_akhir','=',$period_akhir)->orderBy('jabatan_id', 'asc')->get();

        $sekben = DB::table('Fungsionaris')
                    ->join('jabatans', 'jabatans.id', '=', 'fungsionaris.jabatan_id')
                    ->whereBetween('jabatan_id', [4, 7])->where('periode_awal','=',$period_awal)
                    ->where('periode_akhir','=',$period_akhir)->get();

        return view('index',compact('kegiatan','ketuawakil','sekben','kabinet','news'));
    }

    public function show($id)
    {
        $news_sidebar = Newsfeed::latest()->get();
        $news = Newsfeed::find($id);

        return view('detail_berita',compact('news','news_sidebar'));
    }

    public function listBerita()
    {
        $news_sidebar = Newsfeed::latest()->get();
        $news = Newsfeed::latest()->paginate(1);
        return view('list_berita', compact('news','news_sidebar'));
    }

    public function commingSoon()
    {
        return view('coming_soon');
    }
}
