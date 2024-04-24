<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Http\Requests\StorefotoRequest;
use App\Http\Requests\UpdatefotoRequest;
use App\Models\album;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('foto.index', [
            'foto'=> foto::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('foto.create', [
            'album'=> album::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorefotoRequest $request)
    {
        $foto = new Foto();
        $foto->user_id = auth()->user()->id;
        $foto->album_id = $request->album_id;
        $foto->judul = $request->judul;
        $foto->deskripsi = $request->deskripsi;
        $foto->tgl_unggah = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i');
        if($request->file('image')){
            if ($foto->image) {
                Storage::delete($foto->image);
            }
            $foto->image = $request->file('image')->store('galeri-foto/'. auth()->user()->username);
        }
        $foto->lokasi_file = $foto->image;
        $foto->save();
        return redirect('/foto')->with('success', 'Foto berhasil diunggah!');

    }

    /**
     * Display the specified resource.
     */
    public function show(foto $foto)
    {
        return view ('foto.detail',[
            'foto' =>$foto,
            'album' =>album::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(foto $foto)
    {
        // if ($foto->user_id !== auth()->user()->id){
        //     abort(401);
        // }
        return view ('foto.edit',[
            'foto' =>$foto,
            'album' =>album::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatefotoRequest $request, foto $foto)
    {
        $foto = foto::find($foto->id);
        $foto->user_id = auth()->user()->id;
        $foto->album_id = $request->album_id;
        $foto->judul = $request->judul;
        $foto->deskripsi = $request->deskripsi;
        $foto->tgl_unggah = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i');
        if($request->file('image')){
            if ($foto->image) {
                Storage::delete($foto->image);
            }
            $foto->image = $request->file('image')->store('galeri-foto/'. auth()->user()->username);
        }
        $foto->lokasi_file = $foto->image;
        $foto->save();
        return redirect('/foto')->with('success', 'Foto berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(foto $foto)
    {
        if ($foto->user_id !== auth()->user()->id){
            abort(401);
        }

        if($foto->image){
            Storage::delete($foto->image);
        }

        foto::destroy($foto->id);
        return redirect('/foto')->with('suceess', 'foto berhasil dihapus.');
    }
}
