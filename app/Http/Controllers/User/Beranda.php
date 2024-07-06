<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Berita;
use App\Models\Admin\E_Purchasing;
use App\Models\Admin\NonTender;
use App\Models\Admin\Pengumuman;
use App\Models\Admin\SwakelolaModel;
use App\Models\Admin\TenderModel;
use App\Models\BannerModel;

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
        $tender = TenderModel::get();
        $banner = BannerModel::where('is_deleted', 'no')->get();

        return view('user.beranda', compact('pengumuman', 'berita', 'e_purchasing', 'non_tender', 'p_swakelola', 'tender', 'banner'));
    }
}