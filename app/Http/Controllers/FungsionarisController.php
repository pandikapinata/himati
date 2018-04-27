<?php

namespace App\Http\Controllers;

use App\Fungsionaris;
use Illuminate\Http\Request;
use Storage;
use App\Jabatan;

class FungsionarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::all();
        $funct = Fungsionaris::with('jabatan')->get();

        return view('admin.fungsionaris.index',compact('funct','jabatan'));
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
        $this->validate($request,[
            'nama' => 'required|max:255',
            'jabatan' => 'required',
            'period_akhir' => 'required',
            'period_awal' => 'required',
        ]);

        $funct = new Fungsionaris();
        $funct -> nama_fungsionaris = $request->nama;
        $funct -> jabatan_id = $request->jabatan;
        $funct -> periode_awal = $request->period_awal;
        $funct -> periode_akhir = $request->period_akhir;

        $image = $request->file('media_profile');
        if ($image) {
            $filename = $funct->nama_fungsionaris . "_" . date('m-d-Y', time()) . '.' . $image->getClientOriginalExtension();
            $funct->media_profile = $filename;
            $image->move(public_path('assets/images'), $filename);
        }

        $funct->save();

        session()->flash('message', 'Sukses Memasukkan Kegiatan, '.$request->nama);
        return redirect('/admin/fungsionaris');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fungsionaris  $fungsionaris
     * @return \Illuminate\Http\Response
     */
    public function show(Fungsionaris $fungsionaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fungsionaris  $fungsionaris
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jabatan = Jabatan::all();
        $funct = Fungsionaris::find($id);

        return view('admin.fungsionaris.update',compact('funct','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fungsionaris  $fungsionaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|max:255',
            'jabatan' => 'required',
            'period_akhir' => 'required',
            'period_awal' => 'required',
        ]);

        $funct = Fungsionaris::find($id);
        $funct -> nama_fungsionaris = $request->input('nama');
        $funct -> jabatan_id = $request->input('jabatan');
        $funct -> periode_awal = $request->input('period_awal');
        $funct -> periode_akhir = $request->input('period_akhir');

        $image = $request->file('media_profile');
        if ($image) {
            $filename = $funct->nama_fungsionaris . "_" . date('m-d-Y', time()) . '.' . $image->getClientOriginalExtension();
            $oldFilename = $funct->media_profile;
            Storage::delete($oldFilename);
            $funct->media_profile = $filename;
            $image->move(public_path('assets/images'), $filename);
        }

        $funct->save();

        session()->flash('message', 'Sukses Mengubah Fungsionaris, '.$request->nama);
        return redirect('/admin/fungsionaris');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fungsionaris  $fungsionaris
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funct = Fungsionaris::find($id);
        Storage::delete($funct->media_profile);
        $funct->delete();

        session()->flash('delete', 'Sukses Menghapus Data Kegiatan');
        return redirect('/admin/fungsionaris');
    }
}
