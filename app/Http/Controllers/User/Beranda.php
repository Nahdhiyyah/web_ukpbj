<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Pengumuman;
use App\Models\Admin\Berita;
use App\Models\Admin\E_Purchasing;
use App\Models\Admin\NonTender;
use App\Models\Admin\SwakelolaModel;
use Illuminate\View\View;
use Illuminate\Http\RedirectRespons;
use Illuminate\Support\Facades\Storage;
use DB;

class Beranda extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengumuman = Pengumuman::latest()->paginate(10);
        $berita = Berita::latest()->paginate(10);
        $e_purchasing = E_Purchasing::get();
        $non_tender = NonTender::get();
        $p_swakelola = SwakelolaModel::get();
        $tender = DB::table('tender')->get();
        return view('user.beranda', compact('pengumuman', 'berita', 'e_purchasing', 'non_tender', 'p_swakelola', 'tender'));
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}