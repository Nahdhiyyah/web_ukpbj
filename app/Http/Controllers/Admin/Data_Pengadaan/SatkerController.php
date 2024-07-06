<?php

namespace App\Http\Controllers\Admin\Data_Pengadaan;

use Alert;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 'Pengelola Layanan' || $role == 'Super Admin') {
                $ta = date('Y');
                $satker = DB::table('satker')
                    ->where('satker.kd_satker_str', '<=', 22)
                    ->select('satker.kd_klpd',
                        'satker.nama_klpd',
                        'satker.jenis_klpd',
                        'satker.kd_satker',
                        'satker.kd_satker_str',
                        'satker.nama_satker')
                    ->get();

                return view('admin.data_pengadaan.satker')->with(
                    'satker', $satker,
                );

            } else {
                Alert::error('Error', 'Anda tidak bisa mengakses halaman yang anda tuju!');

                return back();
            }
        }
    }
}