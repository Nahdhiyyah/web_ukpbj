<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi\AdminKonsulModel;
use App\Models\Konsultasi\UserKonsulModel;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class AdminKonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_admin()
    {
        $admin_konsul = DB::table('user_konsul_models')
            ->join('users', 'user_konsul_models.user_id', '=', 'users.id')
            ->select('user_konsul_models.id as konsul_id',
                'user_konsul_models.*',
                'users.id as user_id',
                'users.name',
                'users.avatar')
            ->get();

        return View('admin.konsultasi.index_admin_konsul', compact('admin_konsul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_balasan($id)
    {
        $balasan = UserKonsulModel::findOrFail($id);

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
        $user_konsul_id = UserKonsulModel::findOrFail($id);

        AdminKonsulModel::create([
            'user_id' => $user_id,
            'user_konsul_id' => $user_konsul_id->id,
            'balasan' => $request->balasan,
        ]);

        Alert::success('success', 'Balasan anda berhasil dikirim!');

        //redirect to index
        return redirect()->route('daftar.konsul.admin')->with(['balas' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function konsul_show(string $id)
    {
        $user_konsul = UserKonsulModel::findOrFail($id);
        $admin_konsul = DB::table('admin_konsul_models')
            ->join('users', 'admin_konsul_models.user_id', '=', 'users.id')
            ->select('admin_konsul_models.id as balas_id',
                'admin_konsul_models.*',
                'users.id as user_id',
                'users.name',
                'users.avatar',
                'users.role')
            ->get();

        return view('admin.konsultasi.show_admin_konsul', compact('user_konsul', 'admin_konsul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function status_edit($id)
    {
        $admin_konsul = UserKonsulModel::findOrFail($id);

        return view('admin.konsultasi.edit_status_konsul', compact('admin_konsul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function status_update(Request $request, string $id)
    {
        $this->validate($request, [
            'subjek' => 'required',
            'message' => 'required',
            'status' => 'required',
            'attachment' => 'file|mimes:jpeg,jpg,png,pdf|max:2048',
        ]);

        //get data Blog by ID
        $admin_konsul = UserKonsulModel::findOrFail($id);

        if ($request->file('attachment') == '') {

            $admin_konsul->update([
                'subjek' => $request->subjek,
                'message' => $request->message,
                'status' => $request->status,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/konsultasi/'.$admin_konsul->attachment);

            //upload new image
            $attach = $request->file('attachment');
            $attach->storeAs('public/konsultasi', $attach->getClientOriginalName());

            $admin_konsul->update([
                'subjek' => $request->subjek,
                'message' => $request->message,
                'status' => $request->status,
                'attachment' => $attach->getClientOriginalName(),
            ]);

        }
        Alert::success('success', 'Status konsultasi berhasil diedit!');

        return redirect()->route('daftar.konsul.admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UserKonsulModel::findOrFail($id)->delete();
        AdminKonsulModel::where('user_konsul_id', $id)->delete();

        Alert::success('success', 'Data berhasil dihapus!');

        //redirect to index
        return redirect()->route('daftar.konsul.admin');
    }
}