<?php

namespace App\Http\Controllers\Admin\Data_Pengadaan;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class SatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $pagination = 10;

        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 'admin' || $role == 'super_admin') {
                $ta = date('Y');
                $satker = DB::table('satkers')
                    ->where('satkers.kd_satker_str', '<=', 22)
                    ->select('satkers.kd_klpd', 'satkers.nama_klpd', 'satkers.jenis_klpd', 'satkers.kd_satker', 'satkers.kd_satker_str', 'satkers.nama_satker')
                    ->get();

                return view('admin.data_pengadaan.satker')->with(
                    'satker', $satker,
                );

            } else {
                // return view('error');
                Alert::error('error', 'Anda tidak bisa mengakses halaman yang anda tuju!');
                return back();
            }
        }
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