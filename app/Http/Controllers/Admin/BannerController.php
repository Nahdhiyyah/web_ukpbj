<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use Illuminate\Http\Request;
use Image;
use Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = BannerModel::where('is_deleted', 'no')->orderBy('created_at', 'desc')->get();

        return View('admin.banner.index_banner', compact('banner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //upload image
        $image = $request->file('gambar');

        // Upload image
        $imagePath = $image->getPathName();
        $imageDimensions = getimagesize($imagePath);

        // Ketentuan ukuran gambar
        $maxWidth = 1366;
        $maxHeight = 768;

        // Validasi ukuran gambar
        if ($imageDimensions[0] != $maxWidth || $imageDimensions[1] != $maxHeight) {
            Alert::error('Fail', 'Data gagal disimpan, ukuran gambar tidak sesuai!');

            return back()->withErrors(['gambar' => 'Gambar harus berukuran : '.$maxWidth.'x'.$maxHeight.' piksel.']);
        }

        $image->storeAs('public/banner', $image->hashName());

        //create post
        BannerModel::create([
            'nomor' => $request->nomor,
            'gambar' => $image->hashName(),
        ]);

        Alert::success('Success', 'Data berhasil disimpan!');

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nomor' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //get data Blog by ID
        $banner = BannerModel::findOrFail($id);

        if ($request->file('gambar') == '') {

            $banner->update([
                'nomor' => $request->nomor,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/banner/'.$banner->gambar);

            //upload new image
            $image = $request->file('gambar');

            // Upload image
            $imagePath = $image->getPathName();
            $imageDimensions = getimagesize($imagePath);

            // Ketentuan ukuran gambar
            $maxWidth = 1366;
            $maxHeight = 768;

            // Validasi ukuran gambar
            if ($imageDimensions[0] != $maxWidth || $imageDimensions[1] != $maxHeight) {
                Alert::error('Fail', 'Data gagal disimpan, ukuran gambar tidak sesuai!');

                return back()->withErrors(['gambar' => 'Gambar harus berukuran : '.$maxWidth.'x'.$maxHeight.' piksel.']);
            }

            $image->storeAs('public/banner', $image->hashName());

            $banner->update([
                'nomor' => $request->nomor,
                'gambar' => $image->hashName(),
            ]);
        }

        Alert::success('Success', 'Data berhasil diupdate!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $is_deleted = 'yes';
        $query = BannerModel::findOrFail($id)->update(['is_deleted' => $is_deleted]);

        if ($query == true) {
            Alert::success('success', 'Data berhasil dihapus!');
        } else {
            Alert::error('Error', 'Data gagal dihapus');
        }

        //redirect to index
        return redirect()->route('banner.index');
    }
}