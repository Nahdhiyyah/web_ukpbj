<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Alert;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 'admin' || $role == 'super_admin') {
                $gallery = Gallery::orderBy('created_at', 'desc')->get();

                return view('admin.gallery.gallery')->with('gallery', $gallery);
            } else {
                Alert::error('Error', 'Anda tidak bisa mengakses halaman yang anda tuju!');
                return back();
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'tanggal' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'kategori' => 'required'
        ]);

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/gallery', $image->hashName());

        //create post
        Gallery::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'gambar' => $image->hashName(),
            'kategori' => $request->kategori,
        ]);
        
        Alert::success('Success', 'Gallery anda berhasil disimpan!');

        //redirect to index
        return redirect()->route('gallery.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = Gallery::findorfail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'tanggal' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //get data Blog by ID
        $gallery = Gallery::findOrFail($id);

        if ($request->file('gambar') == '') {

            $gallery->update([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'kategori' => $request->kategori,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/gallery/'.$gallery->gambar);

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/gallery', $image->hashName());

            $gallery->update([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'gambar' => $image->hashName(),
                'kategori' => $request->kategori,
            ]);

        }
        Alert::success('Success', 'Gallery anda berhasil diupdate!');

        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        //delete image
        Storage::delete('public/gallery'.$gallery->gambar);

        //delete post
        $gallery->delete();

        Alert::success('success', 'Gallery anda berhasil dihapus!');

        //redirect to index
        return redirect()->route('gallery.index');
    }
}