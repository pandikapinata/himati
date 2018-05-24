<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();

        return view('admin.barang.index',compact('barang'));
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
            'kd_brg' => 'required',
            'hrg_brg' => 'required',
            'stok_brg' => 'required',
        ]);
        //dd($request->all());
        $brg = new Barang();
        $brg -> nama_barang = $request->nama;
        $brg -> kode_barang = $request->kd_brg;
        $brg -> harga_sewa = $request->hrg_brg;
        $brg -> stok_barang = $request->stok_brg;

        $image = $request->file('foto_barang');
        if ($image) {
            $filename = $brg->nama_barang . "_" . date('m-d-Y', time()) . '.' . $image->getClientOriginalExtension();
            $brg->foto_barang = $filename;
            $image->move(public_path('assets/images/barang'), $filename);
        }

        $brg->save();

        session()->flash('message', 'Sukses Memasukkan Barang, '.$request->nama);
        return redirect('/admin/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::find($id);

        return view('admin.barang.update',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|max:255',
            'kd_brg' => 'required',
            'hrg_brg' => 'required',
            'stok_brg' => 'required',
        ]);

        $brg = Barang::find($id);
        $brg -> nama_barang = $request->nama;
        $brg -> kode_barang = $request->kd_brg;
        $brg -> harga_sewa = $request->hrg_brg;
        $brg -> stok_barang = $request->stok_brg;

        $image = $request->file('foto_barang');
        if ($image) {
            $filename = $brg->nama_fungsionaris . "_" . date('m-d-Y', time()) . '.' . $image->getClientOriginalExtension();
            $brg->foto_barang = $filename;
            $image->move(public_path('assets/images/barang'), $filename);
        }

        $brg->save();

        session()->flash('message', 'Sukses Memasukkan Barang, '.$request->nama);
        return redirect('/admin/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        Storage::delete($barang->foto_barang);
        $barang->delete();

        session()->flash('delete', 'Sukses Menghapus Data Barang');
        return redirect('/admin/barang');
    }
}
