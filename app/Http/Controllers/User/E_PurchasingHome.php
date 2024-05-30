<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\E_Purchasing;
use DB;
use Illuminate\Http\Request;

class E_PurchasingHome extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ta = date('Y');
        $e_purchasing = DB::table('e_purchasing')
            ->leftJoin('komoditas', 'komoditas.kd_komoditas', '=', 'e_purchasing.kd_komoditas')
            ->leftJoin('satkers', 'satkers.kd_satker', '=', 'e_purchasing.satker_id')
            ->select('e_purchasing.no_paket',
                'e_purchasing.nama_paket',
                'e_purchasing.total',
                'e_purchasing.total_harga',
                'e_purchasing.jml_jenis_produk',
                'e_purchasing.kuantitas',
                'satkers.nama_satker',
                'satkers.kd_satker',
                'komoditas.nama_komoditas',
                'komoditas.jenis_katalog')
            ->where('tahun_anggaran', $ta)
            ->orWhere('kd_satker_str', '=', 22)
            ->orderBy('e_purchasing.tanggal_buat_paket')
            ->get();

        $grouped = collect($e_purchasing)->groupBy('no_paket');
        return view( 'user.data_pengadaan.homeE_purchasing', compact('grouped', 'e_purchasing'));

    }

    public function detail_paket($no_paket)
    {
        $ta = date('Y');
        $no_paket = DB::table('e_purchasing')
            ->leftJoin('satkers', 'satkers.kd_satker', '=', 'e_purchasing.satker_id')
            ->where('no_paket', $no_paket)
            ->select('e_purchasing.no_paket',
                'e_purchasing.nama_paket',
                'e_purchasing.total',
                'e_purchasing.total_harga',
                'e_purchasing.kuantitas',
                'e_purchasing.jml_jenis_produk',
                'e_purchasing.kd_produk',
                'e_purchasing.ongkos_kirim',
                'satkers.nama_satker',
                'satkers.kd_satker')
            ->get();

        return View('user.data_pengadaan.e_purchasinghome.detail_paket')->with('paket', $no_paket);
    }

    public function detail_satker($kd_satker)
    {
        $ta = date('Y');
        $kd_satker = DB::table('e_purchasing')
            ->leftJoin('satkers', 'satkers.kd_satker', '=', 'e_purchasing.satker_id')
            ->where('kd_satker', $kd_satker)
            ->select('e_purchasing.no_paket',
                'e_purchasing.nama_paket',
                'e_purchasing.total',
                'e_purchasing.total_harga',
                'e_purchasing.kuantitas',
                'e_purchasing.jml_jenis_produk',
                'e_purchasing.kd_produk',
                'e_purchasing.ongkos_kirim',
                'satkers.nama_satker',
                'satkers.kd_satker')
            ->get();

        return View('user.data_pengadaan.e_purchasinghome.detail_satker_epurchasing')->with('satker', $kd_satker);
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