<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use DB;

class HomeMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::orderBy('created_at', 'desc')->get();
        return View('user.materi.homeMateriInformasi')->with('materis', $materi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index_materi()
    {
        $materi = DB::table('materis')->where('kategori', 'Materi')->get();
        return View('user.materi.homeMateri')->with('materis', $materi);
    }

    public function index_sdp()
    {
        $materi = DB::table('materis')->where('kategori', 'SDP')->get();
        return View('user.materi.homeSDP')->with('materis', $materi);
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