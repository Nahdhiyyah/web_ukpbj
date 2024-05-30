<?php

namespace App\Http\Controllers\Admin\Publikasi;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Admin\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if (Auth::id()) {
            $role = Auth()->user()->role;

            if ($role == 'admin' || $role == 'super_admin') {

                $pengumuman = Pengumuman::where('is_deleted', 'no')->orderBy('created_at', 'desc')->get();

                return view('admin.pengumuman.pengumuman')->with([
                    'pengumuman' => $pengumuman,
                ]);

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
        return view('admin.pengumuman.create');

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
            'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
            'document' => 'required|file|mimes:pdf,doc,docx',
        ]);

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/pengumuman', $image->hashName());

        $document = $request->file('document');
        $document->storeAs('public/document', $document->getClientOriginalName());

        $user_id = Auth::user()->id;

        //create post
        Pengumuman::create([
            'user_id' => $user_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'gambar' => $image->hashName(),
            'document' => $document->getClientOriginalName(),
        ]);

        Alert::success('Success', 'Pengumuman anda berhasil disimpan!');

        //redirect to index
        return redirect()->route('pengumuman.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view('admin.pengumuman.show', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengumuman = Pengumuman::findorfail($id);

        return view('admin.pengumuman.edit', compact('pengumuman'));
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
            'document' => 'file|mimes:pdf,doc,docx',
        ]);

        //get data Pengumuman by ID
        $pengumuman = Pengumuman::findOrFail($id);

        if ($request->file('gambar') && $request->file('document') == false) {

            $pengumuman->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
            ]);

        } elseif ($request->file('gambar') == true) {

            //hapus old image
            Storage::disk('local')->delete('public/pengumuman/'.$pengumuman->gambar);

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/pengumuman', $image->hashName());

            $pengumuman->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'gambar' => $image->hashName(),
            ]);

        } elseif ($request->file('document') == true) {

            // delete old document
            Storage::disk('local')->delete('public/document/'.$pengumuman->document);

            // upload new document
            $document = $request->file('document');
            $document->storeAs('public/document', $document->getClientOriginalName());

            $pengumuman->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'document' => $document->getClientOriginalName(),
            ]);
        }
        Alert::success('Success', 'Pengumuman anda berhasil diupdate!');

        return redirect()->route('pengumuman.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $is_deleted = 'yes';
        $query = Staff::findOrFail($id)->update(['is_deleted' => $is_deleted]);

        if ($query == true) {
            Alert::success('success', 'Data berhasil dihapus!');
        } else {
            Alert::error('Error', 'Data gagal dihapus');
        }

        //redirect to index
        return redirect()->route('pengumuman.index');
    }
}