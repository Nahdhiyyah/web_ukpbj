<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Admin\Pengadaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SeputarPengadaanController extends Controller
{
    public function index(Request $request)
    {

        if (Auth::id()) {
            $role = Auth()->user()->role;

            if ($role == 'admin' || $role == 'super_admin') {

                $pengadaan = Pengadaan::orderBy('created_at', 'desc')->get();

                return view('admin.seputar_pengadaan.index')->with([
                    'pengadaans' => $pengadaan,
                ]);

            } else {
                // return view('user.error');
                Alert::error('Error', 'Anda tidak bisa mengakses halaman yang anda tuju!');
                return back();
            }
        }
    }

    public function create()
    {
        return view('admin.seputar_pengadaan.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'file' => 'required|file|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmps',
            'judul' => 'required',
            'isi' => 'required',
        ]);

        //upload file
        $file = $request->file('file');
        $file->storeAs('public/pengadaans', $file->getClientOriginalName());

        //create post
        Pengadaan::create([
            'file' => $file->getClientOriginalName(),
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        Alert::success('success', 'Seputar Pengadaan berhasil disimpan!');

        //redirect to index
        return redirect()->route('pengadaan.index');
    }

    public function edit(string $id)
    {
        $pengadaan = Pengadaan::findOrFail($id);

        return view('admin.seputar_pengadaan.edit', compact('pengadaan'));
    }

    public function update(Request $request, $id)
    {
        //validate form
        $this->validate($request, [
            'file' => 'file|mimes:pdf, post_max_size = 8M',
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $pengadaan = Pengadaan::findOrFail($id);

        //check if image is uploaded
        if ($request->file('file') == true) {

            //delete old image
            Storage::disk('local')->delete('public/pengadaans/'.$pengadaan->file);

            //upload new image
            $file = $request->file('file');
            $file->storeAs('public/pengadaans', $file->getClientOriginalName());

            //update post with new file
            $pengadaan->update([
                'file' => $file->getClientOriginalName(),
                'judul' => $request->judul,
                'isi' => $request->isi,
            ]);

        } else {

            //update post without file
            $pengadaan->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
            ]);
        }

        Alert::success('Success', 'Seputar Pengadaan berhasil diupdate!');

        //redirect to index
        return redirect()->route('pengadaan.index');
    }

    public function destroy(string $id)
    {
        $pengadaan = Pengadaan::findOrFail($id);

        //delete file
        Storage::delete('public/pengadaans/'.$pengadaan->file);

        //delete materi
        $pengadaan->delete();

        Alert::success('Success', 'Seputar Pengadaan berhasil dihapus!');

        //redirect to index
        return redirect()->route('pengadaan.index');
    }
}