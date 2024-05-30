<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index(Request $request)
    {

        if (Auth::id()) {
            $role = Auth()->user()->role;

            if ($role == 'admin' || $role == 'super_admin') {
                $produk = Produk::orderBy('created_at', 'desc')->get();

                return view('admin.produks.index')->with([
                    'produks' => $produk,
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
        return view('admin.produks.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'file' => 'required|file|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmps',
            'kategori' => 'required',
            'nomor' => 'required',
            'tahun' => 'required',
            'isi' => 'required',
        ]);

        //upload file
        $file = $request->file('file');
        $file->storeAs('public/produks', $file->getClientOriginalName());

        //create post
        Produk::create([
            'file' => $file->getClientOriginalName(),
            'kategori' => $request->kategori,
            'nomor' => $request->nomor,
            'tahun' => $request->tahun,
            'isi' => $request->isi,
        ]);

        Alert::success('success', 'Produk Hukum anda berhasil disimpan!');

        //redirect to index
        return redirect()->route('produk.index');
    }

    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);

        return view('admin.produks.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        //validate form
        $this->validate($request, [
            'file' => 'file|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmps',
            'kategori' => 'required',
            'nomor' => 'required',
            'tahun' => 'required',
            'isi' => 'required',
        ]);

        $produk = Produk::findOrFail($id);

        //check if image is uploaded
        if ($request->file('file') == true) {

            //delete old image
            Storage::disk('local')->delete('public/produks/'.$produk->file);

            //upload new image
            $file = $request->file('file');
            $file->storeAs('public/produks', $file->getClientOriginalName());

            //update post with new file
            $produk->update([
                'file' => $file->getClientOriginalName(),
                'kategori' => $request->kategori,
                'nomor' => $request->nomor,
                'tahun' => $request->tahun,
                'isi' => $request->isi,
            ]);

        } else {

            //update post without file
            $produk->update([
                'kategori' => $request->kategori,
                'nomor' => $request->nomor,
                'tahun' => $request->tahun,
                'isi' => $request->isi,
            ]);
        }
        Alert::success('Success', 'Produk Hukum anda berhasil diupdate!');

        //redirect to index
        return redirect()->route('produk.index');
    }

    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);

        //delete file
        Storage::delete('public/produks/'.$produk->file);

        //delete materi
        $produk->delete();

        Alert::success('Success', 'Produk Hukum anda berhasil dihapus!');

        //redirect to index
        return redirect()->route('produk.index');
    }
}