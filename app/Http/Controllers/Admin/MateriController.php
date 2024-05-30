<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Admin\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function index(Request $request)
    {

        if (Auth::id()) {
            $role = Auth()->user()->role;

            if ($role == 'admin' || $role == 'super_admin') {
                $materi = Materi::orderBy('created_at', 'desc')->get();

                return view('admin.materis.index')->with([
                    'materis' => $materi,
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
        return view('admin.materis.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'file' => 'required|file|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmps',
            'kategori' => 'required',
            'judul' => 'required',
            'isi' => 'required',
        ]);

        //upload file
        $file = $request->file('file');
        $file->storeAs('public/materis', $file->getClientOriginalName());

        //create post
        Materi::create([
            'file' => $file->getClientOriginalName(),
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        Alert::success('Success', 'Materi anda berhasil disimpan!');

        //redirect to index
        return redirect()->route('materi.index');
    }

    public function edit(string $id)
    {
        $materi = Materi::findOrFail($id);

        return view('admin.materis.edit', compact('materi'));
    }

    public function update(Request $request, $id)
    {
        //validate form
        $this->validate($request, [
            'file' => 'file|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmps, post_max_size = 8M',
            'kategori' => 'required',
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $materi = Materi::findOrFail($id);

        //check if image is uploaded
        if ($request->file('file') == true) {

            //delete old image
            Storage::disk('local')->delete('public/materis/'.$materi->file);

            //upload new image
            $file = $request->file('file');
            $file->storeAs('public/materis', $file->getClientOriginalName());

            //update post with new file
            $materi->update([
                'file' => $file->getClientOriginalName(),
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'isi' => $request->isi,
            ]);

        } else {

            //update post without file
            $materi->update([
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'isi' => $request->isi,
            ]);
        }
        Alert::success('Success', 'Materi anda berhasil diupdate!');

        //redirect to index
        return redirect()->route('materi.index');
    }

    public function destroy(string $id)
    {
        $materi = Materi::findOrFail($id);

        //delete file
        Storage::delete('public/materis/'.$materi->file);

        //delete materi
        $materi->delete();

        Alert::success('Success', 'Materi anda berhasil dihapus!');

        //redirect to index
        return redirect()->route('materi.index');
    }
}