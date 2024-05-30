<?php

namespace App\Http\Controllers\Konsultasi;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Konsultasi\BalasanKonsultasiModel;
use App\Models\Konsultasi\KonsultasiModel;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KonsultasiMasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_user()
    {
        $user_konsul = KonsultasiModel::where('is_deleted', 'no')->orderBy('created_at', 'desc')->get();
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
            'isi' => 'required',
            'attachment' => 'file|mimes:jpeg,jpg,png,pdf|max:2048',
        ]);

        $user_id = Auth::user()->id;

        //create post
        if ($request->file('attachment') == '') {
            KonsultasiModel::create([
                'user_id' => $user_id,
                'subjek' => $request->subjek,
                'isi' => $request->isi,
            ]);
        } else {
            //upload image
            $attach = $request->file('attachment');
            $attach->storeAs('public/konsultasi', $attach->getClientOriginalName());
            KonsultasiModel::create([
                'user_id' => $user_id,
                'subjek' => $request->subjek,
                'isi' => $request->isi,
                'attachment' => $attach->getClientOriginalName(),
            ]);
        }

        Alert::success('success', 'Data Berhasil Disimpan!');

        //redirect to index
        return redirect()->route('daftar.konsul.user');
    }

    public function user_create_balas($id)
    {
        $user_balas = KonsultasiModel::findOrFail($id);
        return view('user.konsultasi.create_user_balas', compact('user_balas'));
    }

    public function user_store_balas(Request $request, string $id)
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

        // Update status konsultasi menjadi sedang diproses
        $status = "Sedang diproses";
        $konsul_id->where('id', $id)->update([
            'status' => $status,
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
        $user_konsul = KonsultasiModel::findOrFail($id);
        $balasan = BalasanKonsultasiModel::get();

        return view('user.konsultasi.show_user_konsul', compact('user_konsul', 'balasan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function user_edit(string $id)
    {
        $user_konsul = KonsultasiModel::findorfail($id);

        return view('user.konsultasi.edit_user_konsul', compact('user_konsul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function user_update(Request $request, string $id)
    {
        $this->validate($request, [
            'subjek' => 'required',
            'isi' => 'required',
            'attachment' => 'file|mimes:jpeg,jpg,png,pdf|max:2048',
        ]);

        //get data Blog by ID
        $user_konsul = KonsultasiModel::findOrFail($id);

        if ($request->file('attachment') == '') {

            $user_konsul->update([
                'subjek' => $request->subjek,
                'isi' => $request->isi,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/konsultasi/'.$user_konsul->attachment);

            //upload new image
            $attach = $request->file('attachment');
            $attach->storeAs('public/konsultasi', $attach->getClientOriginalName());

            $user_konsul->update([
                'subjek' => $request->subjek,
                'isi' => $request->isi,
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
        $is_deleted = 'yes';
        $user_konsul = KonsultasiModel::findOrFail($id);

        // Retrieve attachment before deleting the record
        // $attachment = $user_konsul->attachment;

        // Delete records
        $user_konsul->update(['is_deleted'=> $is_deleted]);
        BalasanKonsultasiModel::where('konsul_id', $id)->update(['is_deleted'=> $is_deleted]);

        // Construct the path for storage deletion
        // $attach = 'public/konsultasi/'. $attachment;

        // Check if the file exists before attempting to delete it
        // if (Storage::exists($attach)) {
        //     Storage::delete($attach);
        // }

        Alert::success('success', 'Konsultasi anda berhasil dihapus!');

        // Redirect to index
        return redirect()->route('daftar.konsul.user');
    }
}