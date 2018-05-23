<?php

namespace App\Http\Controllers;

use App\Sie;
use Illuminate\Http\Request;

class SieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sies = Sie::all();
        return view('admin.sie.index',compact('sies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|max:255',
        ]);

        $sies = new Sie();
        $sies -> nama_sie = $request->nama;

        $sies->save();

        session()->flash('message', 'Sukses Memasukkan Sie Kegiatan, '.$request->nama);
        return redirect('/admin/master-sie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sie  $sie
     * @return \Illuminate\Http\Response
     */
    public function show(Sie $sie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sie  $sie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sie = Sie::find($id);
        return view('admin.sie.update',compact('sie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sie  $sie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|max:255',
        ]);

        $sies = Sie::find($id);
        $sies -> nama_sie = $request->nama;

        $sies->save();

        session()->flash('message', 'Sukses Mengupdate Sie Kegiatan, '.$request->nama);
        return redirect('/admin/master-sie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sie  $sie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sie = Sie::find($id);
        $sie->delete();

        session()->flash('delete', 'Sukses Menghapus Data Kegiatan');
        return redirect('/admin/master-sie');
    }
}
