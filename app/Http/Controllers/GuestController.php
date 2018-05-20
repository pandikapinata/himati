<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::all();

        return view('admin.guest.index',compact('guests'));
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
            'username' => 'required|max:30|max:255|unique:guests',
            'password' => 'required|min:6',
        ]);
        #dd($request->all());

        $guest = new Guest();
        $guest -> name = $request->input('nama');
        $guest -> email = $request->input('email');
        $guest -> username = $request->input('username');
        $guest -> password = Hash::make($request->input('password'));
        $guest -> save();

        session()->flash('message', 'Sukses Memasukkan Barang, '.$request->nama);
        return redirect('/admin/guests');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guests = Guest::find($id);

        return view('guest.auth.setting', compact('guests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        #dd($request->all());

        $guest = Guest::find($id);
        $guest -> name = $request->input('nama');
        $guest -> email = $request->input('email');
        $guest -> username = $request->input('username');
        $guest -> password = Hash::make($request->input('password'));
        $guest -> save();

        return redirect()->route('setting.edit', $guest->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guest = Guest::find($id);
        $guest->delete();

        return redirect('/admin/guests');
    }
}
