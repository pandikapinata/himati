<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oprec;
use App\Sie;
use Illuminate\Support\Facades\Input;
use App\Oprec_sie;
use Storage;
use Auth;
use App\Guest;
use DB;
use App\Pendaftaran;
use PDF;

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

        $oprecs = Oprec::with('oprec_sie')->find($id);
        $oprecs -> nama_kegiatan = $request->nama;

        $image = $request->file('foto_kegiatan');
        if ($image) {
            $filename = $oprecs->nama_kegiatan . "_" . date('m-d-Y', time()) . '.' . $image->getClientOriginalExtension();
            $oldFilename = $oprecs->media_kegiatan;
            Storage::delete($oldFilename);
            $oprecs->media_kegiatan = $filename;
            $image->move(public_path('assets/images/oprec'), $filename);

        }
        $oprecs->save();
        foreach($oprecs->oprec_sie as  $oprec){
            $oprec->delete();
        }

        $oprec     = Oprec::where('nama_kegiatan',$request->nama)->first();
        //return($oprec);
        //$i = 0;
        $checks=Input::get('cek');
        foreach ($checks as $list) {
            $oprec_sie = new Oprec_sie();
            $oprec_sie->oprec_id = $oprec->id;
            $oprec_sie->sie_id = $list;
            $oprec_sie->save();
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

    public function showOprec()
    {
        // SELECT oprecs.`id` FROM oprecs
        // WHERE oprecs.`id` NOT IN(SELECT pendaftarans.`oprec_id` FROM pendaftarans
        // WHERE pendaftarans.`guest_id`=4)

        $checkId = Auth::guard('guest')->user()->id;
        // return($checkId);
        $oprecs = Oprec::with('oprec_sie')->whereNotIn('id', function($q) use($checkId){
                $q->select('oprec_id')->from('pendaftarans')->where('guest_id',$checkId);
               // return($q);
        })->get();

        //return($result);
        return view('oprec', compact('oprecs','guest'));
    }

    public function regisForm($id)
    {
        $checkId = Auth::guard('guest')->user()->id;
        $guest = Guest::where('id',$checkId)->first();
        //$oprecs = Oprec::with('oprec_sie')->find($id);
        $oprecss = DB::table('oprecs')->select('oprec_id','nama_kegiatan','nama_sie','sies.id')
            ->join('oprec_sies', 'oprecs.id', '=', 'oprec_sies.oprec_id')
            ->join('sies', 'oprec_sies.sie_id', '=', 'sies.id')->where('oprec_id','=',$id)
            ->get();
        //return $oprecs;
        return response()->json(['oprecs' => $oprecss, 'guest' => $guest]);
    }

    public function registrasi(Request $request)
    {
        $pendaftaran = new Pendaftaran();
        $pendaftaran -> oprec_id = $request->oprec_id;
        $pendaftaran -> guest_id = $request->guest_id;
        $pendaftaran -> sie_pilihan = $request->sie;
        $pendaftaran -> no_telp = $request->telp;
        $pendaftaran -> user_line = $request->id_line;
        $pendaftaran -> alasan = $request->alasan;
        $pendaftaran -> save();
        return redirect('/open-requirement/index');
    }

    public function pendaftar()
    {
        $jml_pendaftar=0;
        $oprecs = Oprec::all();
        $jml_pendaftar=DB::table('pendaftarans')->select(DB::raw('pendaftarans.`oprec_id`,COUNT(pendaftarans.`guest_id`) as num'))
        ->groupBy('oprec_id')->get();

        //return ($jml_pendaftar);

        return view('admin.pendaftar.index',compact('oprecs','jml_pendaftar'));
    }

    public function detailPendaftar($id)
    {
        $jml_pendaftar=0;
        $oprecs = Oprec::with('pendaftaran')->find($id);
        $nama=$oprecs->nama_kegiatan;
        //return($nama);
        // $jml_pendaftar=DB::table('pendaftarans')->select(DB::raw('pendaftarans.`oprec_id`,COUNT(pendaftarans.`guest_id`) as num'))
        // ->groupBy('oprec_id')->get();
        return view('admin.pendaftar.list',compact('oprecs'));
    }

    public function detailPendaftarPDF()
    {
        $data=['Pandika'];
        $pdf = PDF::loadView('admin.pendaftar.list_export', $data);
        return $pdf->download('invoice.pdf');
    }


}
