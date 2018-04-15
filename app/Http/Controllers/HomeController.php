<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;

class HomeController extends Controller
{
    public function index()
    {

        $kegiatan = Kegiatan::latest()->get();

        return view('index',compact('kegiatan'));
    }
}
