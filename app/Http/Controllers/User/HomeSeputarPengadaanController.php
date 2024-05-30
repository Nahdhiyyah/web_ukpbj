<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Pengadaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectRespons;
use DB;

class HomeSeputarPengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengadaan = Pengadaan::latest()->get();
        return View('user.seputarPengadaan.homeSeputarPengadaan')->with('pengadaans', $pengadaan);
    }

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
        $pengadaan = Pengadaan::findOrFail($id);
        return view('user.seputarPengadaan.detailSeputarPengadaan', compact('pengadaan'));
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