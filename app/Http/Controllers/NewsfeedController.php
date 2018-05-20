<?php

namespace App\Http\Controllers;

use App\Newsfeed;
use Illuminate\Http\Request;
use Storage;

class NewsfeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsfeeds=Newsfeed::all();

        return view('admin.newsfeed.index',compact('newsfeeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newsfeed.create');
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
            'judul_berita' => 'required|max:255',
        ]);

        $news = new Newsfeed();
        $news -> judul_berita = $request->judul_berita;
        $news -> isi_berita = $request->content;

        $image = $request->file('foto_berita');
        if ($image) {
            $filename = $news->judul_berita . "_" . date('m-d-Y', time()) . '.' . $image->getClientOriginalExtension();
            $news->foto_berita = $filename;
            $image->move(public_path('assets/images/berita'), $filename);
        }

        $news->save();

        session()->flash('message', 'Sukses Memasukkan Berita, '.$request->judul_berita);
        return redirect('/admin/newsfeed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newsfeed  $newsfeed
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = Newsfeed::find($id);

        return view('admin.newsfeed.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsfeed  $newsfeed
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = Newsfeed::find($id);

        return view('admin.newsfeed.update',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsfeed  $newsfeed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul_berita' => 'required|max:255',

        ]);

        $news = Newsfeed::find($id);
        $news -> judul_berita = $request->judul_berita;
        $news -> isi_berita = $request->content;

        $image = $request->file('foto_berita');
        if ($image) {
            $filename = $news->judul_berita . "_" . date('m-d-Y', time()) . '.' . $image->getClientOriginalExtension();
            $oldFilename = $news->foto_berita;
            Storage::delete($oldFilename);
            $news->foto_berita = $filename;
            $image->move(public_path('assets/images/berita'), $filename);

        }
        $news->save();

        session()->flash('message', 'Sukses Mengupdate Berita, '.$request->judul_berita);
        return redirect('/admin/newsfeed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsfeed  $newsfeed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $news = Newsfeed::find($id);
        Storage::delete($news->foto_berita);
        $news->delete();

        session()->flash('delete', 'Sukses Menghapus Data Berita');
        return redirect('/admin/newsfeed');
    }
}
