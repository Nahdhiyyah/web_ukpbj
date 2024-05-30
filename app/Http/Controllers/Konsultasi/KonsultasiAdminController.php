<?php

namespace App\Http\Controllers\Konsultasi;

use App\Http\Controllers\Controller;
use Alert;
use App\Models\Konsultasi\BalasanKonsultasiModel;
use App\Models\Konsultasi\KonsultasiModel;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_admin()
    {
        $admin_konsul = KonsultasiModel::orderBy('created_at', 'desc')->get();
        return View('admin.konsultasi.index_admin_konsul', compact('admin_konsul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_balasan($id)
    {
        $balasan = KonsultasiModel::findOrFail($id);
        return view('admin.konsultasi.create_admin_balas', compact('balasan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_balasan(Request $request, string $id)
    {
        $this->validate($request, [
            'balasan' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $konsul_id = KonsultasiModel::findOrFail($id);

        BalasanKonsultasiModel::create([
            'user_id' => $user_id,
            'konsul_id' => $konsul_id->id,
            'balasan' => $request->balasan,
        ]);

        // Update status konsultasi
        KonsultasiModel::where('id', $id)->update([
            'status' => $request->status,
        ]);

        Alert::success('success', 'Balasan anda berhasil dikirim!');

        //redirect to index
        return redirect()->route('daftar.konsul.admin');
    }

    /**
     * Display the specified resource.
     */
    public function konsul_show_status(string $id)
    {
        $user_konsul = KonsultasiModel::findOrFail($id);
        $admin_konsul = BalasanKonsultasiModel::get();
        // ----------update otomatis status konsultasi user--------
        $status = 'Sedang diproses';
        $user_konsul->update([
            'status' => $status,
        ]);

        return view('admin.konsultasi.show_admin_konsul', compact('user_konsul', 'admin_konsul'));
    }

    public function konsul_show(string $id)
    {
        $user_konsul = KonsultasiModel::findOrFail($id);
        $admin_konsul = BalasankonsultasiModel::get();
        return view('admin.konsultasi.show_admin_konsul', compact('user_konsul', 'admin_konsul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_balasan(string $id)
    {
        $admin_konsul = KonsultasiModel::findOrFail($id);
        $admin_balas = BalasanKonsultasiModel::where('konsul_id', $id)->get();

        return view('admin.konsultasi.edit_admin_balas', compact('admin_konsul', 'admin_balas'));
    }

    public function update_balasan(Request $request, string $id)
    {
        $this->validate($request, [
            'balasan' => 'required',
        ]);

        //get data Blog by ID
        KonsultasiModel::findOrFail($id);
        $admin_konsul = BalasanKonsultasiModel::where('konsul_id', $id);

        $admin_konsul->update([
            'balasan' => $request->balasan,
        ]);

        Alert::success('success', 'Status konsultasi berhasil diedit!');

        return redirect()->route('daftar.konsul.admin');
    }

    public function status_update(Request $request, string $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        //get data Blog by ID
        $admin_konsul = KonsultasiModel::findOrFail($id);

        $admin_konsul->update([
            'status' => $request->status,
        ]);
        Alert::success('success', 'Status konsultasi berhasil diedit!');

        return redirect()->route('daftar.konsul.admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $is_deleted = 'yes';
        $query = KonsultasiModel::findOrFail($id)->update(['is_deleted'=> $is_deleted]);
        BalasanKonsultasiModel::where('konsul_id', $id)->update(['is_deleted'=> $is_deleted]);
        
        if ($query == true) {
            Alert::success('success', 'Data berhasil dihapus!');
        } else {
            Alert::error('Error', 'Data gagal dihapus');
        }
        
        //redirect to index
        return redirect()->route('daftar.konsul.admin');
    }
}