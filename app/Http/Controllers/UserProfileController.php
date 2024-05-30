<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'avatar' => 'file|mimes:jpeg,jpg,png|max:2048',
        ]);

        //get data Blog by ID
        $user = User::findOrFail($id);

        //hapus old image
        Storage::disk('local')->delete('public/users-avatar/'.$user->avatar);

        //upload new image
        $avatar = $request->file('avatar');
        $avatar->storeAs('public/users-avatar', $avatar->getClientOriginalName());

        $user->update([
            'avatar' => $avatar->getClientOriginalName(),
        ]);

        return redirect()->route('profile.edit')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
