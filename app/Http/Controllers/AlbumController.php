<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Http\Requests\StorealbumRequest;
use App\Http\Requests\UpdatealbumRequest;
use App\Models\foto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('album.index',[
        'album'=> Album::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('album.create', [
            'album'=> Album::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorealbumRequest $request)
    {
        $album = new Album;
        $album->user_id = Auth::id();
        $album->nama = $request->nama;
        $album->deskripsi = $request->deskripsi;
        $album->save();
        return redirect(route('album.index'))->with(['status' => 'Album berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(album $id)
    {
        // $album = Album::with('foto')->findOrFail($id);
        $album = album::findOrFail($id);
        $data = [
            'album' => $album
        ];
        return view('album.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(album $album)
    {
        $album = Album::find($album->id);
        $data = compact('album');
        return view('album.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatealbumRequest $request, album $album)
    {
        $album = Album::find($album->id);
        $data = $request->all();
        $album->update($data);
        return redirect(route('album.index'))->with(['status' => 'Data album berhasil diubah']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(album $album)
    {
        if ($album->user_id !== auth()->user()->id){
            abort(401);
        }
        $foto = foto::where('album_id', $album->id)->get();

        foreach ($foto as $p){
            if($p->image){
            Storage::delete($p->image);
        }
        $p->delete();
        }
        
        album::destroy($album->id);
        return redirect(route('album.index'))->with(['status' => 'Data album berhasil dihapus']);

    }
}
