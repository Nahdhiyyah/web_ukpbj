<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Alert;
use Storage;
use App\Models\Admin\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 'Pengelola Layanan' || $role == 'Super Admin') {
                $staff = Staff::where('is_deleted', 'no')->orderBy('created_at', 'desc')->get();

                return view('admin.staff.index')->with('staff', $staff);
            } else {
                Alert::error('Error', 'Anda tidak bisa mengakses halaman yang anda tuju!');
                return back();
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/staff', $image->hashName());

        //create post
        Staff::create([
            'gambar' => $image->hashName(),
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nip'=> $request->nip
        ]);
        
        Alert::success('Success', 'Data Staff anda berhasil disimpan!');

        //redirect to index
        return redirect()->route('staff.index');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = Staff::findorfail($id);
        return view('admin.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama' => 'required',
            'jabatan' => 'required',
            'nip' => 'required'
        ]);

        //get data Blog by ID
        $staff = Staff::findOrFail($id);

        if ($request->file('gambar') == '') {

            $staff->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'nip' => $request->nip
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/staff/'.$staff->gambar);

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/staff', $image->hashName());

            $staff->update([
                'gambar' => $image->hashName(),
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'nip' => $request->nip
            ]);

        }
        Alert::success('Success', 'Data Staff anda berhasil diupdate!');

        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $is_deleted = 'yes';
        $query = Staff::findOrFail($id)->update(['is_deleted'=> $is_deleted]);
        
        if ($query == true) {
            Alert::success('success', 'Data berhasil dihapus!');
        } else {
            Alert::error('Error', 'Data gagal dihapus');
        }
        
        //redirect to index
        return redirect()->route('staff.index');
    }
}