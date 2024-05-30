<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Alert;
use View;

class HomeSirupSwakelolaController extends Controller
{
    public function index()
    {
        $swakelola = DB::table('sirup_swakelola')
        ->orderBy('tanggal_terakhir_di_update', 'desc')
        ->get();

        return View('user.data_pengadaan.home_sirup_swakelola', compact('swakelola'));
    }
}