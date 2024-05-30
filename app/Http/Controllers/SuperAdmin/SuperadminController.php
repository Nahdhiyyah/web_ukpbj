<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 'super_admin') {
                $manage_user = User::orderBy('created_at', 'desc')->get();

                return view('superAdmin.manage_user_index')->with('manage_user', $manage_user);
            } else {
                return view('user.error');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('admin.gallery.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'judul' => 'required',
    //         'tanggal' => 'required',
    //         'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
    //     ]);

    //     //upload image
    //     $image = $request->file('gambar');
    //     $image->storeAs('public/gallery', $image->hashName());

    //     //create post
    //     Gallery::create([
    //         'judul' => $request->judul,
    //         'tanggal' => $request->tanggal,
    //         'gambar' => $image->hashName(),
    //     ]);

    //     //redirect to index
    //     return redirect()->route('gallery.index')->with(['success' => 'Data Berhasil Disimpan!']);

    // }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $manage_user = User::findOrFail($id);

    //     return view('admin.gallery.show', compact('manage_user'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $manage_user = User::findorfail($id);

    //     return view('admin.gallery.edit', compact('manage_user'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'password' => 'required',
    //         'role' => 'required',
    //     ]);

    //     //get data Blog by ID
    //     $gallery = Gallery::findOrFail($id);

    //     if ($request->file('gambar') == '') {

    //         $gallery->update([
    //             'judul' => $request->judul,
    //             'tanggal' => $request->tanggal,
    //         ]);

    //     } else {

    //         //hapus old image
    //         Storage::disk('local')->delete('public/gallery/'.$gallery->gambar);

    //         //upload new image
    //         $image = $request->file('gambar');
    //         $image->storeAs('public/gallery', $image->hashName());

    //         $gallery->update([
    //             'judul' => $request->judul,
    //             'tanggal' => $request->tanggal,
    //             'gambar' => $image->hashName(),
    //         ]);

    //     }

    //     return redirect()->route('gallery.index')->with(['success' => 'Data Berhasil Diupdate!']);
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $gallery = Gallery::findOrFail($id);

    //     //delete image
    //     Storage::delete('public/gallery'.$gallery->gambar);

    //     //delete post
    //     $gallery->delete();

    //     //redirect to index
    //     return redirect()->route('gallery.index')->with(['success' => 'Data Berhasil Dihapus!']);
    // }
}