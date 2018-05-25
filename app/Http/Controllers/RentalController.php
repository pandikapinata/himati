<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Guest;
use App\Sewa;
use App\Barang_Sewa;
use Auth;
use Carbon\Carbon;
use Mail;

class RentalController extends Controller
{
    public function index()
    {
        $rents = Barang::all();
        $jml_brg=0;
        if(auth()->guard('guest')->check()){
            $checkId = Auth::guard('guest')->user()->id;
            $sewa     = Sewa::where('guest_id',$checkId)
                        ->where('status_sewa','Jadi')->get();
            //return($sewa);
            if($sewa->isEmpty()){
                $jml_brg=0;
            }else{
                $sewa_id=$sewa[0]->id;
                $jml_brg =  Barang_Sewa::where('sewa_id',$sewa_id)->count();
                //return($jml_brg);
            }
            return view('rental',compact('rents','jml_brg'));
        }

        return view('rental',compact('rents','jml_brg'));

    }

    public function cart(Request $request)
    {
        if(auth()->guard('guest')->check()){
            $brg_selected=$request->brg_id;
            $checkId = Auth::guard('guest')->user()->id;
            $sewa    = Sewa::where('guest_id',$checkId)
                        ->where('status_sewa','Jadi')->get();
            $stok   = Barang::where('id',$brg_selected)->first();
            //return($stok->stok_barang);
            if($request->qty>$stok->stok_barang){
                session()->flash('delete', 'Sukses Menghapus Data Kegiatan');
                return redirect('/rental');
            }
            if(empty($sewa[0])){
                $sewa = new Sewa();
                $sewa -> guest_id = $checkId;
                $sewa->save();
                $sewa     = Sewa::where('guest_id',$checkId)
                            ->where('status_sewa','Jadi')->get();
            }

            $sewa_id=$sewa[0]->id;
            $brg_sewa = Barang_Sewa::where('sewa_id',$sewa_id)->where('barang_id',$brg_selected)->get();

            $brg_sewa = new Barang_Sewa();
            $brg_sewa -> sewa_id = $sewa_id;
            $brg_sewa -> barang_id = $brg_selected;
            $brg_sewa -> qty = $request->qty;
            $brg_sewa -> start_date=  $request->startdate;
            $brg_sewa -> end_date=  $request->enddate;
            $brg_sewa -> harga = $request->harga;
            $brg_sewa->save();


            return redirect()->back();
        }
        else{
            return redirect('guest/login');
        }
        return redirect()->back();
    }

    public function showcart()
    {
        if(auth()->guard('guest')->check()){
            $barang = Barang::all();
            $checkId = Auth::guard('guest')->user()->id;
            $sewa     = Sewa::where('guest_id',$checkId)
                        ->where('status_sewa','Jadi')->get();
            //return($sewa);
            if($sewa->isEmpty()){
                return redirect('/rental');
                // $sewa_id=0;
                // $total_harga=0;
                // $cart = Barang_Sewa::with('barang')->where('sewa_id',$sewa_id)->get();
                // $jml_brg =  Barang_Sewa::where('sewa_id',$sewa_id)->count();

                // return view('guest.cart',compact('cart','total_harga','jml_brg'));
            }else{

                $sewa_id=$sewa[0]->id;
                $cart = Barang_Sewa::with('barang')->where('sewa_id',$sewa_id)->get();
                $jml_brg =  Barang_Sewa::where('sewa_id',$sewa_id)->count();

                $total_harga=0; $length=0;
                foreach($cart as  $carts){
                    $end = Carbon::parse($carts->end_date);
                    $start = Carbon::parse($carts->start_date);
                    $length = $end->diffInDays($start);
                    if($length==0){
                        $length=1;
                    }
                    $harga_sewa= $carts->harga;
                    // $jml_nilai = $jml_nilai + ($nilai_angka * $krs->mktawar->matakuliah->sks);
                    $total_harga = $total_harga + ($harga_sewa*$carts->qty*$length);
                    //dd($number);
                }
                return view('guest.cart',compact('cart','total_harga','jml_barang','jml_brg'));
            }
        }
        else{
            return redirect('guest/login');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $barang = Barang::all();
        $item = Barang_Sewa::with('barang')->find($id);
        return $item;
    }

    public function save_cart(Request $request, $id)
    {
        $item = Barang_Sewa::find($id);
        $brg_selected=$item->barang_id;
        $stok   = Barang::where('id',$brg_selected)->first();
        //return($stok->stok_barang);
        if($request->qty>$stok->stok_barang){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }else{
            //return("TAI");
            //id = $request->id;
            $item -> qty = $request->qty;
            $item -> start_date=  $request->start_date;
            $item -> end_date=  $request->end_date;
            $item->save();

            return response()->json([
                'success' => true,
                'message' => 'Cart Updated'
            ]);

        }

    }

    public function destroy($id)
    {
        Barang_Sewa::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Cart Deleted'
        ]);
    }

    public function checkOut(Request $request, $id)
    {
        if(auth()->guard('guest')->check()){
            $sewa = Sewa::find($id);
            $sewa->tgl_pesan = Carbon::now();
            $sewa -> total_bayar=  $request->total_harga;
            $sewa->save();
            return redirect('/rental/cart/checkoutConfirm');
        }
        else{
            return redirect('guest/login');
        }
        return redirect()->back();

    }

    public function checkOutConfirm()
    {
        if(auth()->guard('guest')->check()){

            $checkId = Auth::guard('guest')->user()->id;

            $sewa     = Sewa::where('guest_id',$checkId)
                        ->where('status_sewa','Jadi')->get();

            if($sewa->isEmpty()){
                return redirect('/rental/cart');
            }
            $checkout = Sewa::with('guest')->with('barang_sewa')
                        ->where('guest_id',$checkId)->where('status_sewa','Jadi')->get();
            //dd($checkout[0]->barang_sewa[0]->start_date);
            // return($checkout[0]->sewa_id);
            $sewa_id=$sewa[0]->id;
            $cart = Barang_Sewa::with('barang')->where('sewa_id',$sewa_id)->get();
            $jml_brg =  Barang_Sewa::where('sewa_id',$sewa_id)->count();

            $total_harga=0; $length=0;
            foreach($cart as  $carts){
                $end = Carbon::parse($carts->end_date);
                $start = Carbon::parse($carts->start_date);
                $length = $end->diffInDays($start);
                if($length==0){
                    $length=1;
                }
                $harga_sewa= $carts->harga;
                // $jml_nilai = $jml_nilai + ($nilai_angka * $krs->mktawar->matakuliah->sks);
                $total_harga = $total_harga + ($harga_sewa*$carts->qty*$length);
                //dd($number);
            }
                return view('guest.checkout',compact('checkout','cart','total_harga','jml_barang','jml_brg'));
        }
        else{
            return redirect('guest/login');
        }
        return redirect()->back();
    }

    public function transaksi()
    {
        $rents = Barang::all();
        $jml_brg=0;
        if(auth()->guard('guest')->check()){
            $checkId = Auth::guard('guest')->user()->id;
            $sewa     = Sewa::where('guest_id',$checkId)
                        ->where('status_sewa','Pending')->get();
            //return($sewa);
            if($sewa->isEmpty()){
                $jml_brg=0;
                return redirect('/rental');
            }else{
                $jml_brg=0;
                $total_harga=$sewa[0]->total_bayar;
                return view('guest.trx',compact('sewa','total_harga','jml_brg'));
            }
        }
        else{
            return redirect('guest/login');
        }
        return redirect()->back();

    }

    public function updateStok($id)
    {
        if(auth()->guard('guest')->check()){
            $sewa = Sewa::find($id);
            $sewa -> status_sewa= 'Pending';
            $sewa->save();
            $carts = Barang_Sewa::where('sewa_id',$sewa->id)->get();
            //return($carts);
            foreach($carts as  $cart){
                $brg=Barang::find($cart->barang_id);
                $brg->stok_barang=$brg->stok_barang-$cart->qty;
                $brg->save();
            }
            return redirect('/rental/transaksi');
        }
        else{
            return redirect('guest/login');
        }
        return redirect()->back();

    }

    public function transaksiUpload(Request $request,$id)
    {
        if(auth()->guard('guest')->check()){
            $checkId = Auth::guard('guest')->user()->name;
            $sewa = Sewa::find($id);

            $image = $request->file('bukti');
            //return($image);
            if ($image) {
                $filename = $checkId . "_" . time() . '.' . $image->getClientOriginalExtension();
                $sewa->bukti_pembayaran = $filename;
                $image->move(public_path('assets/images/berkas_pembayaran'), $filename);
            }
            $sewa -> status_sewa= 'Waiting';
            $sewa -> keterangan = $request->keterangan;
            $sewa->save();

            $verif = Sewa::with('guest')->with('barang_sewa')->find($id);
            try{
                Mail::send('admin.mail.waiting', ['name' => $verif->guest->name,
                'id' => $verif->id,'tgl_pesan' => $verif->tgl_pesan],
                function ($message) use ($verif)
                {
                    $message->subject('Notifikasi Penyewaan Barang HMTI');
                    $message->from('donotreply@hmti.com', 'HMTI');
                    $message->to($verif->guest->email);
                });

                Mail::send('admin.mail.adminnotif', ['name' => $verif->guest->name,
                'id' => $verif->id,'tgl_pesan' => $verif->tgl_pesan],
                function ($message) use ($verif)
                {
                    $message->subject('Notifikasi Penyewaan Barang HMTI');
                    $message->from('donotreply@hmti.com', 'HMTI');
                    $message->to('pandikapinata@student.unud.ac.id');
                });

                return redirect('rental')->with('message','Berhasil Kirim Email ke, '. $verif->guest->name);
            }
            catch (Exception $e){
                return response (['status' => false,'errors' => $e->getMessage()]);
            }

            return redirect('rental');
        }
        else{
            return redirect('guest/login');
        }
        return redirect()->back();

    }





}
