<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oprec;
use App\Sie;
use Illuminate\Support\Facades\Input;
use App\Oprec_sie;
use Storage;

class OprecController extends Controller
{
    public function index()
    {
        $oprecs = Oprec::all();
        $sies = Sie::all();
        return view('admin.oprec.index',compact('oprecs','sies'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|max:255',
        ]);

        $oprecs = new Oprec();
        $oprecs -> nama_kegiatan = $request->nama;

        $image = $request->file('foto_kegiatan');
        if ($image) {
            $filename = $oprecs->nama_kegiatan . "_" . date('m-d-Y', time()) . '.' . $image->getClientOriginalExtension();
            $oprecs->media_kegiatan = $filename;
            $image->move(public_path('assets/images/oprec'), $filename);
        }
        $oprecs->save();

        $oprec     = Oprec::where('nama_kegiatan',$request->nama)->first();
        //return($oprec);
        $i = 0;
        $checks=Input::get('cek');
        foreach ($checks as $list) {
            $oprec_sie = new Oprec_sie();
            $oprec_sie->oprec_id = $oprec->id;
            $oprec_sie->sie_id = $list;
            $oprec_sie->save();
            $i++;
        }

        session()->flash('message', 'Sukses Memasukkan Sie Kegiatan, '.$request->nama);
        return redirect('/admin/oprec');
    }

    public function show($id)
    {
        $oprecs = Oprec::with('oprec_sie')->find($id);
        //return($oprec);
        return view('admin.oprec.show',compact('oprecs'));
    }

    public function edit($id)
    {
        $oprecs = Oprec::with('oprec_sie')->find($id);
        $sies = Sie::all();
        $op_sie_ids = $oprecs->oprec_sie->pluck('sie_id')->toArray();
        return view('admin.oprec.update',compact('oprecs','op_sie_ids','sies'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|max:255',
        ]);

        $oprecs = Oprec::find($id);
        $oprecs -> nama_kegiatan = $request->nama;

        $image = $request->file('foto_kegiatan');
        if ($image) {
            $filename = $oprecs->nama_kegiatan . "_" . date('m-d-Y', time()) . '.' . $image->getClientOriginalExtension();
            $oldFilename = $oprecs->media_kegiatan;
            Storage::delete($oldFilename);
            $oprecs->media_kegiatan = $filename;
            $image->move(public_path('assets/images/kegiatan'), $filename);

        }
        $oprecs->save();

        $oprec     = Oprec::where('nama_kegiatan',$request->nama)->first();
        //return($oprec);
        $i = 0;
        $checks=Input::get('cek');
        foreach ($checks as $list) {
            $oprec_sie = new Oprec_sie();
            $oprec_sie->oprec_id = $oprec->id;
            $oprec_sie->sie_id = $list;
            $oprec_sie->save();
            $i++;
        }

        session()->flash('message', 'Sukses Mengupdate Sie Kegiatan, '.$request->nama);
        return redirect('/admin/oprec');
    }

    public function destroy(Request $request,$id)
    {
        $oprecs = Oprec::with('oprec_sie')->find($id);
        Storage::delete($oprecs->media_kegiatan);
        foreach($oprecs->oprec_sie as  $oprec){
            $oprec->delete();
        }
        $oprecs->delete();

        session()->flash('delete', 'Sukses Menghapus Data Berita');
        return redirect('/admin/oprec');
    }
}
