<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Gallery;

class HomeGalleryController extends Controller
{
    public function index(){
        $gallery = Gallery::get();
        $grouped = collect($gallery)->groupBy('kategori');
        return view('user.gallery.home_gallery', compact('grouped'));
    }

    public function detail_gallery($kategori){
        $gallery = Gallery::where('kategori', $kategori)->get();
        return view('user.gallery.detail_gallery', compact('gallery'));
    }
}