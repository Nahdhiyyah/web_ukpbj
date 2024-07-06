<?php

namespace App\Http\Controllers\Pengaduan;

use App\Http\Controllers\Controller;
use App\Models\PengaduanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Log;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_admin()
    {
        $admin_pengaduan = PengaduanModel::where('is_deleted', 'no')->orderBy('created_at', 'desc')->get();

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

    public function status_update(Request $request, string $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        //get data Blog by ID
        $pengaduan = PengaduanModel::findOrFail($id);

        $pengaduan->update([
            'status' => $request->status,
        ]);

        Log::info('Updated data:', $pengaduan->toArray());

        Alert::success('success', 'Status konsultasi berhasil diedit!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus_pengaduan_admin(string $id)
    {
        $is_deleted = 'yes';
        $query = PengaduanModel::findOrFail($id)->update(['is_deleted' => $is_deleted]);
        if ($query == true) {
            Alert::success('success', 'Data berhasil dihapus!');
        } else {
            Alert::error('Error', 'Data gagal dihapus');
        }

        //redirect to index
        return redirect()->route('daftar.pengaduan.admin');
    }
}
