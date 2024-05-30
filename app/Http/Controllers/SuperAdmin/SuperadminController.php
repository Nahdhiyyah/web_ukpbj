<?php

namespace App\Http\Controllers\SuperAdmin;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 'super_admin') {
                $manage_user = User::orderBy('updated_at', 'desc')->get();

                return view('super_admin.manage_user_index')->with('manage_user', $manage_user);
            } else {
                Alert::error('Error', 'Maaf anda tidak bisa mengakses halaman yang anda tuju!');
                return back();
            }
        }
    }

   
    public function edit(string $id)
    {
        $manage_user = User::findorfail($id);

        return view('super_admin.edit_role', compact('manage_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //get data Blog by ID
        $manage_user = User::findOrFail($id)->update([
            'role' => $request->role,
        ]);


        if ($manage_user) {
            Alert::success('Success', 'Role user berhasil diupdate!');
        } else {
            Alert::error('error', 'Role user gagal diupdate!');
        }

        return redirect()->route('manage.user.index');
    }
}