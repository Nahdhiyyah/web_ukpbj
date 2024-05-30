<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PengaduanUser;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TanggapanAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('pengaduan_users')->where('id', $request->pengaduan_id)->update([
            'status'=> $request->status,
        ]);

        $petugas_id = Auth::user()->id;

        $data = $request->all();

        $data['pengaduan_id'] = $request->pengaduan_id;
        $data['petugas_id']=$petugas_id;

        Alert::success('Berhasil', 'Pengaduan berhasil ditanggapi');
        Tanggapan::create($data);
        return redirect()->route('tanggapan.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 

        $item = PengaduanUser::with([
            'details', 'user'
        ])->findOrFail($id);

        $tangap = Tanggapan::where('pengaduan_id',$id)->first();

        return view('admin.tanggapan.add',[
            'item' => $item,
            'tangap' => $tangap
        ]);

        // $item = PengaduanUser::findOrFail($id);

        // return view('admin.tanggapan.add',[
        //     'item' => $item
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = PengaduanUser::findOrFail($id);

        //delete image
        Storage::delete('pengaduans/'. $item->file);

        //delete post
        $item->delete();
        Alert::success('Berhasil', 'Pengaduan berhasil dihapus');
        //redirect to index
        return redirect()->route('tanggapan.index');


    }
}