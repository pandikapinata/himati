<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use Illuminate\Http\Request;
use Storage;

class KegiatanController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kegiatan = Kegiatan::all();

        return view('admin.kegiatan.index',compact('kegiatan'));
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
            'deskripsi' => 'required',
        ]);

        $activ = new Kegiatan();
        $activ -> nama_kegiatan = $request->nama;
        $activ -> desk_kegiatan = $request->deskripsi;

        $image = $request->file('foto_kegiatan');
        if ($image) {
            $filename = $activ->nama_kegiatan . "_" . date('m-d-Y', time()) . '.' . $image->getClientOriginalExtension();
            $activ->media_kegiatan = $filename;
            $image->move(public_path('assets/images'), $filename);

        }

        $activ->save();
       /* $nama_foto = time().'.'.$request->foto_kegiatan->getClientOriginalExtension();
        $request->foto_kegiatan->move(public_path('assets/images'), $nama_foto);
        $activ->media_kegiatan = $nama_foto; */

        session()->flash('message', 'Sukses Memasukkan Kegiatan, '.$request->nama);
        return redirect('/admin/kegiatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);

        return view('admin.kegiatan.update',compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'foto_kegiatan' => 'image',
        ]);

        $activ = Kegiatan::find($id);
        $activ -> nama_kegiatan = $request->input('nama');
        $activ -> desk_kegiatan = $request->input('deskripsi');

        /*if ($request->hasFile('foto_kegiatan')) {
            $image = $request->file('foto_kegiatan');
            $filename = $activ->nama_kegiatan . "_" . date('m-d-Y', time()) . '.' . $image->getClientOriginalExtension();
            $oldFilename = $activ->media_kegiatan;
            Storage::delete($oldFilename);
            $activ->media_kegiatan = $filename;
            $image->move(public_path('assets/images'), $filename);

        }*/
        $image = $request->file('foto_kegiatan');
        if ($image) {
            $filename = $activ->nama_kegiatan . "_" . date('m-d-Y', time()) . '.' . $image->getClientOriginalExtension();
            $oldFilename = $activ->media_kegiatan;
            Storage::delete($oldFilename);
            $activ->media_kegiatan = $filename;
            $image->move(public_path('assets/images'), $filename);

        }
        $activ->save();

        session()->flash('message', 'Sukses Mengupdate Kegiatan, '.$request->nama);
        return redirect('/admin/kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $activ = Kegiatan::find($id);
        Storage::delete($activ->media_kegiatan);
        $activ->delete();

        session()->flash('delete', 'Sukses Menghapus Data Kegiatan');
        return redirect('/admin/kegiatan');
    }
}
