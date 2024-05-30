<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Konsultasi\AdminKonsulModel;
use App\Models\Konsultasi\UserKonsulModel;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_user()
    {
        // $user_konsul = UserKonsulModel::get();
        $user_konsul = DB::table('user_konsul_models')
            ->join('users', 'user_konsul_models.user_id', '=', 'users.id')
            ->select('user_konsul_models.id as konsul_id',
                'user_konsul_models.*',
                'users.id as user_id',
                'users.name',
                'users.avatar')
            ->get();

        return View('user.konsultasi.index_user_konsul', compact('user_konsul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function user_create()
    {
        return view('user.konsultasi.create_user_konsul');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function user_store(Request $request)
    {
        $this->validate($request, [
            'subjek' => 'required',
            'message' => 'required',
            'attachment' => 'file|mimes:jpeg,jpg,png,pdf|max:2048',
        ]);

        $user_id = Auth::user()->id;

        //create post
        if ($request->file('attachment') == '') {
            UserKonsulModel::create([
                'user_id' => $user_id,
                'subjek' => $request->subjek,
                'message' => $request->message,
            ]);
        } else {
            //upload image
            $attach = $request->file('attachment');
            $attach->storeAs('public/konsultasi', $attach->getClientOriginalName());
            UserKonsulModel::create([
                'user_id' => $user_id,
                'subjek' => $request->subjek,
                'message' => $request->message,
                'attachment' => $attach->getClientOriginalName(),
            ]);
        }

        Alert::success('success', 'Data Berhasil Disimpan!');

        //redirect to index
        return redirect()->route('daftar.konsul.user');
    }

    public function user_create_balas($id)
    {
        $user_balas = UserKonsulModel::findOrFail($id);

        return view('user.konsultasi.create_user_balas', compact('user_balas'));
    }

    public function user_store_balas(Request $request, string $id)
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

        Alert::success('success', 'Balasan anda terkirim!');

        //redirect to index
        return redirect()->route('daftar.konsul.user');
    }

    /**
     * Display the specified resource.
     */
    public function user_show(string $id)
    {
        $user_konsul = UserKonsulModel::findOrFail($id);
        $balasan = DB::table('admin_konsul_models')
            ->join('users', 'admin_konsul_models.user_id', '=', 'users.id')
            ->select('admin_konsul_models.id as balas_id',
                'admin_konsul_models.*',
                'users.id as user_id',
                'users.name',
                'users.avatar',
                'users.role')
            ->get();

        return view('user.konsultasi.show_user_konsul', compact('user_konsul', 'balasan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function user_edit(string $id)
    {
        $user_konsul = UserKonsulModel::findorfail($id);

        return view('user.konsultasi.edit_user_konsul', compact('user_konsul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function user_update(Request $request, string $id)
    {
        $this->validate($request, [
            'subjek' => 'required',
            'message' => 'required',
            'attachment' => 'file|mimes:jpeg,jpg,png,pdf|max:2048',
        ]);

        //get data Blog by ID
        $user_konsul = UserKonsulModel::findOrFail($id);

        if ($request->file('attachment') == '') {

            $user_konsul->update([
                'subjek' => $request->subjek,
                'message' => $request->message,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/konsultasi/'.$user_konsul->attachment);

            //upload new image
            $attach = $request->file('attachment');
            $attach->storeAs('public/konsultasi', $attach->getClientOriginalName());

            $user_konsul->update([
                'subjek' => $request->subjek,
                'message' => $request->message,
                'attachment' => $attach->getClientOriginalName(),
            ]);

        }
        Alert::success('success', 'Konsultasi anda berhasil diupdate!');

        return redirect()->route('daftar.konsul.user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $user_konsul = UserKonsulModel::findOrFail($id)->delete();
        // AdminKonsulModel::where('user_konsul_id', $id)->delete();

        // $attach = 'public/konsultasi/' . $user_konsul->attachment;
        // Storage::delete($attach);

        // $user_konsul->delete();

        // Alert::success('success', 'Konsultasi anda berhasil dihapus!');

        // //redirect to index
        // return redirect()->route('daftar.konsul.user');

        // ---------------------------------------------------------

        $user_konsul = UserKonsulModel::findOrFail($id);

        // Retrieve attachment before deleting the record
        $attachment = $user_konsul->attachment;

        // Delete records
        $user_konsul->delete();
        AdminKonsulModel::where('user_konsul_id', $id)->delete();

        // Construct the path for storage deletion
        $attach = 'public/konsultasi/'. $attachment;

        // Check if the file exists before attempting to delete it
        if (Storage::exists($attach)) {
            Storage::delete($attach);
        }

        Alert::success('success', 'Konsultasi anda berhasil dihapus!');

        // Redirect to index
        return redirect()->route('daftar.konsul.user');
    }
}