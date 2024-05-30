<?php

namespace App\Http\Controllers\Admin\Data_Pengadaan;

use Alert;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class SirupSwakelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 'admin' || $role == 'super_admin') {
                $swakelola = DB::table('sirup_swakelola')->orderBy('tanggal_terakhir_di_update', 'desc')->get();
                return view('admin.data_pengadaan.sirup_swakelola', compact('swakelola'));
            } else {
                Alert::error('Error', 'Anda tidak bisa mengakses halaman yang anda tuju!');
                return back();
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function display_sirup_swakelola()
    {
        $ta = date('Y');
        $arrContextOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ];

        $url = 'https://isb.lkpp.go.id/isb/api/3b8f0be7-550a-42c2-a4e1-a49fb41b3836/json/45982794/PengumumanSwakelolaDaerah1618/tipe/4:12/parameter/'.$ta.':D159';
        $konten = file_get_contents($url, false, stream_context_create($arrContextOptions));
        $jsonData = json_decode($konten, true);
        $finalarray = [];

        // delete seluruh data yang berada pada table sirup_penyedia sebelum data baru diinput
        DB::table('sirup_swakelola')->delete();

        foreach ($jsonData as $key) {
            // insert data json to table database
            $query = DB::table('sirup_swakelola')->insert([
                'tahun_anggaran' => $ta,
                'tanggal_terakhir_di_update' => $key['tanggal_terakhir_di_update'],
                'kode_kldi' => $key['kode_kldi'],
                'id_satker' => $key['id_satker'],
                'kode_satker_asli' => $key['kode_satker_asli'],
                'jenis' => $key['jenis'],
                'kldi' => $key['kldi'],
                'kode_rup' => $key['kode_rup'],
                'nama_satker' => $key['nama_satker'],
                'nama_paket' => $key['nama_paket'],
                'program' => $key['program'],
                'kode_string_program' => $key['kode_string_program'],
                'kegiatan' => $key['kegiatan'],
                'kode_string_kegiatan' => $key['kode_string_kegiatan'],
                'pagu_rup' => $key['pagu_rup'],
                'mak' => $key['mak'],
                'lokasi' => $key['lokasi'],
                'detail_lokasi' => $key['detail_lokasi'],
                'sumber_dana' => $key['sumber_dana'],
                'awal_pekerjaan' => $key['awal_pekerjaan'],
                'akhir_pekerjaan' => $key['akhir_pekerjaan'],
                'nama_kpa' => $key['nama_kpa'],
                'tipe_swakelola' => $key['tipe_swakelola'],
                'status_aktif' => $key['status_aktif'],
                'status_umumkan' => $key['status_umumkan'],
                'id_client' => $key['id_client'],
                'nama_ppk' => $key['nama_ppk'],
                'nip_ppk' => $key['nip_ppk'],
                'nip_kpa' => $key['nip_kpa'],
                'deskripsi' => $key['deskripsi'],
                'kode_kldi_penyelenggara' => $key['kode_kldi_penyelenggara'],
                'nama_kldi_penyelenggara' => $key['nama_kldi_penyelenggara'],
                'kode_satker_penyelenggara' => $key['kode_satker_penyelenggara'],
                'nama_satker_penyelenggara' => $key['nama_satker_penyelenggara'],
            ]);

        }

        if ($query) {
            Alert::success('success', 'Data Sirup Swakelola berhasil disimpan!');
        } else {
            Alert::error('error', 'Data Sirup Swakelola gagal disimpan!');
        }

        return redirect()->route('sirup_swakelola.index');

    }
}