<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifController extends Controller
{
    public function index()
    {
        $guests = Guest::all();

        return view('admin.verif.index',compact('guests'));
    }
}
