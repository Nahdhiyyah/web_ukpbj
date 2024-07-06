<?php

namespace App\Http\Controllers\Pengaduan;

use App\Http\Controllers\Controller;
use App\Models\PengaduanModel;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanMasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_user()
    {
        $user_pengaduan = PengaduanModel::orderBy('created_at', 'desc')->get();

        return View('user.pengaduan.index_user_pengaduan', compact('user_pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function user_create()
    {
        return view('user.pengaduan.create_user_pengaduan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function user_store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'attachment' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
        ]);

        $user_id = Auth::user()->id;

        //upload image
        $attach = $request->file('attachment');
        $attach->storeAs('public/pengaduan', $attach->getClientOriginalName());
        PengaduanModel::create([
            'user_id' => $user_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'attachment' => $attach->getClientOriginalName(),
        ]);

        Alert::success('success', 'Data Berhasil Disimpan!');

        //redirect to index
        return redirect()->route('daftar.pengaduan.user');
    }

    /**
     * Display the specified resource.
     */
    public function user_show(string $id)
    {
        $user_pengaduan = PengaduanModel::findOrFail($id);
        return view('user.pengaduan.show_user_pengaduan', compact('user_pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function user_edit(string $id)
    // {
    //     $user_pengaduan = PengaduanModel::findorfail($id);

    //     return view('user.pengaduan.edit_user_pengaduan', compact('user_pengaduan'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function user_update(Request $request, string $id)
    // {
    //     $this->validate($request, [
    //         'judul' => 'required',
    //         'isi' => 'required',
    //         'attachment' => 'file|mimes:jpeg,jpg,png,pdf|max:2048',
    //     ]);

    //     //get data Blog by ID
    //     $user_pengaduan = PengaduanModel::findOrFail($id);

    //     if ($request->file('attachment') == '') {

    //         $user_pengaduan->update([
    //             'judul' => $request->judul,
    //             'isi' => $request->isi,
    //         ]);

    //     } else {

    //         //hapus old image
    //         Storage::disk('local')->delete('public/pengaduan/'.$user_pengaduan->attachment);

    //         //upload new image
    //         $attach = $request->file('attachment');
    //         $attach->storeAs('public/pengaduan', $attach->getClientOriginalName());

    //         $user_pengaduan->update([
    //             'judul' => $request->judul,
    //             'isi' => $request->isi,
    //             'attachment' => $attach->getClientOriginalName(),
    //         ]);

    //     }
    //     Alert::success('success', 'Pengaduan anda berhasil diupdate!');

    //     return redirect()->route('daftar.pengaduan.user');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus_pengaduan_user(string $id)
    {
        $is_deleted = 'yes';
        $user_pengaduan = PengaduanModel::findOrFail($id);
        
        // Delete records
        $user_pengaduan->update(['is_deleted' => $is_deleted]);

        Alert::success('success', 'Pengaduan anda berhasil dihapus!');

        // Redirect to index
        return redirect()->route('daftar.pengaduan.user');
    }
}