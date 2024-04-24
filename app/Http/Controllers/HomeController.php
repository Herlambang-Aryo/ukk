<?php

namespace App\Http\Controllers;

use App\Models\foto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $foto = foto::orderBy(
            'created_at',
            'desc'
        )->take(6)->get();

        // Kirim data foto ke tampilan
        return view('home', compact('foto'));
    }
}
