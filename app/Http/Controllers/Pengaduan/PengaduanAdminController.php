<?php

namespace App\Http\Controllers\Pengaduan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengaduanModel;
use App\Models\User;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_admin()
    {
        $admin_pengaduan = PengaduanModel::orderBy('created_at', 'desc')->get();
        return View('admin.pengaduan.index_admin_pengaduan', compact('admin_pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_balasan($id)
    {
        $balasan = PengaduanModel::findOrFail($id);
        return view('admin.pengaduan.create_admin_balas', compact('balasan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_balasan(Request $request, string $id)
    {
        $this->validate($request, [
            'balasan' => 'required',
        ]);

        $user_id_petugas = Auth::user()->id;
        $pengaduan = PengaduanModel::findOrFail($id);

        $pengaduan->update([
            'user_id_petugas' => $user_id_petugas,
            'balasan' => $request->balasan,
            'status' => $request->status, 
        ]);

        Alert::success('success', 'Balasan anda berhasil dikirim!');

        //redirect to index
        return redirect()->route('daftar.pengaduan.admin');
    }

    /**
     * Display the specified resource.
     */
    public function pengaduan_show_status(string $id)
    {
        $pengaduan = PengaduanModel::findOrFail($id);
        // ----------update otomatis status konsultasi user--------
        $status = 'Sedang diproses';
        $pengaduan->update([
            'status' => $status,
        ]);

        return view('admin.pengaduan.show_admin_pengaduan', compact('pengaduan'));
    }

    public function pengaduan_show(string $id)
    {
        $pengaduan = PengaduanModel::findOrFail($id);
        return view('admin.pengaduan.show_admin_pengaduan', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit_balasan(string $id)
    // {
    //     $admin_balas = PengaduanModel::findOrFail($id);
    //     return view('admin.pengaduan.edit_admin_balas', compact('admin_balas'));
    // }

    // public function update_balasan(Request $request, string $id)
    // {
    //     $this->validate($request, [
    //         'balasan' => 'required',
    //     ]);

    //     //get data Blog by ID
    //     $admin_balas = PengaduanModel::findOrFail($id);
    //     $admin_balas->update([
    //         'balasan' => $request->balasan,
    //     ]);

    //     Alert::success('success', 'Status konsultasi berhasil diedit!');

    //     return redirect()->route('daftar.pengaduan.admin');
    // }

    // public function status_update(Request $request, string $id)
    // {
    //     $this->validate($request, [
    //         'status' => 'required',
    //     ]);

    //     //get data Blog by ID
    //     $pengaduan= PengaduanModel::findOrFail($id);

    //     $pengaduan->update([
    //         'status' => $request->status,
    //     ]);
    //     Alert::success('success', 'Status konsultasi berhasil diedit!');

    //     return redirect()->route('daftar.pengaduan.admin');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $is_deleted = 'yes';
        $query = PengaduanModel::findOrFail($id)->update(['is_deleted'=> $is_deleted]);        
        if ($query == true) {
            Alert::success('success', 'Data berhasil dihapus!');
        } else {
            Alert::error('Error', 'Data gagal dihapus');
        }
        
        //redirect to index
        return redirect()->route('daftar.pengaduan.admin');
    }
}