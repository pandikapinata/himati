<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use App\Sewa;
use App\Barang_Sewa;
use App\Barang;
use Carbon\Carbon;
use Mail;

class VerifController extends Controller
{
    public function index()
    {
        $verifs = Sewa::with('guest')->where('status_sewa','Waiting')->get();

        return view('admin.verif.index',compact('verifs'));
    }

    public function show($id)
    {
        $verif = Sewa::with('guest')->with('barang_sewa')->find($id);
        //return($verif);

        $total_harga=0; $length=0;
        foreach($verif->barang_sewa as  $brg_sewa){
            $end = Carbon::parse($brg_sewa->end_date);
            $start = Carbon::parse($brg_sewa->start_date);
            $length = $end->diffInDays($start);
            if($length==0){
                $length=1;
            }
            $harga_sewa= $brg_sewa->harga;
            // $jml_nilai = $jml_nilai + ($nilai_angka * $krs->mktawar->matakuliah->sks);
            $total_harga = $total_harga + ($harga_sewa*$brg_sewa->qty*$length);
            //dd($number);
        }

        return view('admin.verif.show',compact('verif','total_harga','length'));
    }

    public function sendEmail(Request $request, $id)
    {
        $verif = Sewa::with('guest')->with('barang_sewa')->find($id);
        //return($verif);

        $total_harga=0; $length=0;
        foreach($verif->barang_sewa as  $brg_sewa){
            $end = Carbon::parse($brg_sewa->end_date);
            $start = Carbon::parse($brg_sewa->start_date);
            $length = $end->diffInDays($start);
            if($length==0){
                $length=1;
            }
            $harga_sewa= $brg_sewa->harga;
            // $jml_nilai = $jml_nilai + ($nilai_angka * $krs->mktawar->matakuliah->sks);
            $total_harga = $total_harga + ($harga_sewa*$brg_sewa->qty*$length);
            //dd($number);
        }
        $verif -> status_sewa= 'Approved';
        $verif ->save();
        try{
            Mail::send('admin.mail.invoice', ['name' => $verif->guest->name, 'total_harga' =>$total_harga,
            'id' => $verif->id,'tgl_pesan' => $verif->tgl_pesan, 'vrf' => $verif->barang_sewa],
            function ($message) use ($verif)
            {
                $message->subject('Invoice Penyewaan Barang HMTI');
                $message->from('donotreply@hmti.com', 'HMTI');
                $message->to([$verif->guest->email,'pandikapinata@student.unud.ac.id']);
            });
            return redirect('/admin/verif')->with('message','Berhasil Kirim Email');
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }

    public function decline($id)
    {
        $verif = Sewa::with('guest')->with('barang_sewa')->find($id);
        $verif -> status_sewa= 'Decline';
        $verif ->save();
        $carts = Barang_Sewa::where('sewa_id',$verif->id)->get();
            //return($carts);
        foreach($carts as  $cart){
            $brg=Barang::find($cart->barang_id);
            $brg->stok_barang=$brg->stok_barang+$cart->qty;
            $brg->save();
        }

        try{
            Mail::send('admin.mail.decline', ['name' => $verif->guest->name,
            'id' => $verif->id,'tgl_pesan' => $verif->tgl_pesan],
            function ($message) use ($verif)
            {
                $message->subject('Invoice Penyewaan Barang HMTI');
                $message->from('donotreply@hmti.com', 'HMTI');
                $message->to($verif->guest->email);
            });
            return redirect('/admin/verif')->with('message','Berhasil Kirim Email');
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
        // return redirect('/admin/verif')->with('message','Berhasil Decline');
    }
}
