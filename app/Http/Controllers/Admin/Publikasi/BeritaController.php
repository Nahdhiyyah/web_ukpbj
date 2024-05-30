<?php

namespace App\Http\Controllers\Admin\Publikasi;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Admin\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 'admin' || $role == 'super_admin') {
                
                $berita = Berita::orderBy('created_at', 'desc')->get();

                return view('admin.berita.berita')->with([
                    'berita' => $berita,
                ]);

            } else {
                // return view('user.error');
                Alert::error('error', 'Anda tidak bisa mengakses halaman yang anda tuju!');

            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/berita', $image->hashName());

        //create post
        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'gambar' => $image->hashName(),
        ]);

        Alert::success('Success', 'Berita anda berhasil disimpan!');

        //redirect to index
        return redirect()->route('berita.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $berita = Berita::findorfail($id);

        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //get data Blog by ID
        $berita = Berita::findOrFail($id);

        if ($request->file('gambar') == '') {

            $berita->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/berita/'.$berita->gambar);

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/berita', $image->hashName());

            $berita->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'gambar' => $image->hashName(),
            ]);

        }

        Alert::success('Success', 'Data Berita anda berhasil diupdate!');

        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);

        //delete image
        Storage::delete('public/berita'.$berita->gambar);

        //delete post
        $berita->delete();

        Alert::success('success', 'Data Berita anda berhasil dihapus!');

        //redirect to index
        return redirect()->route('berita.index');
    }
}