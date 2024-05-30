<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeTenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tender = DB::table('tender')->select('tender.*')
                    // ->join('tender_selesai', 'tender.kd_klpd', '=', 'tender_selesai.kd_klpd')
                    // ->select('tender.kd_tender', 'tender.nama_satker', 'tender_selesai.pagu', 'tender_selesai.hps', 'tender_selesai.nilai_negosiasi', 'tender_selesai.nilai_kontrak', 'tender_selesai.nilai_terkoreksi', 'tender_selesai.nama_penyedia')
                    // ->orderBy('tender_selesai.tgl_penetapan_pemenang')
                    ->get();

        return view('user.data_pengadaan.homeTender')->with('tender', $tender);
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