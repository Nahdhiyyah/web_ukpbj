<?php

namespace App\Http\Controllers\Admin\Data_Pengadaan;

use Alert;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class E_PurchasingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 'admin' || $role == 'super_admin') {

                $ta = date('Y');

                $e_purchasing = DB::table('e_purchasing')
                    ->leftJoin('komoditas', 'komoditas.kd_komoditas', '=', 'e_purchasing.kd_komoditas')
                    ->leftJoin('satker', 'satker.kd_satker', '=', 'e_purchasing.satker_id')
                    ->select('e_purchasing.no_paket',
                        'e_purchasing.nama_paket',
                        'e_purchasing.total',
                        'e_purchasing.total_harga',
                        'e_purchasing.kuantitas',
                        'e_purchasing.jml_jenis_produk',
                        'e_purchasing.kd_produk',
                        'e_purchasing.ongkos_kirim',
                        'satker.nama_satker',
                        'satker.kd_satker',
                        'satker.kd_satker_str',
                        'komoditas.nama_komoditas',
                        'komoditas.jenis_katalog')
                    ->where('tahun_anggaran', $ta)
                    ->orderBy('e_purchasing.tanggal_buat_paket')
                    ->get();

                $grouped = collect($e_purchasing)->groupBy('no_paket');

                return view('admin.data_pengadaan.e_purchasing.e_purchasing', compact('grouped'));

            } else {

                Alert::error('Error', 'Anda tidak bisa mengakses halaman yang anda tuju!');

                return back();
            }
        }
    }

    public function detail_paket($no_paket)
    {
        $ta = date('Y');
        $no_paket = DB::table('e_purchasing')
            ->leftJoin('satker', 'satkers.kd_satker', '=', 'e_purchasing.satker_id')
            ->where('no_paket', $no_paket)
            ->select('e_purchasing.no_paket',
                'e_purchasing.nama_paket',
                'e_purchasing.total',
                'e_purchasing.total_harga',
                'e_purchasing.kuantitas',
                'e_purchasing.jml_jenis_produk',
                'e_purchasing.kd_produk',
                'e_purchasing.ongkos_kirim',
                'satker.nama_satker',
                'satker.kd_satker')
            ->get();

        return View('admin.data_pengadaan.e_purchasing.detail_paket')->with('paket', $no_paket);

    }

    public function detail_satker($kd_satker)
    {
        $ta = date('Y');
        $kd_satker = DB::table('e_purchasing')
            ->leftJoin('satker', 'satker.kd_satker', '=', 'e_purchasing.satker_id')
            ->where('kd_satker', $kd_satker)
            ->select('e_purchasing.no_paket',
                'e_purchasing.nama_paket',
                'e_purchasing.total',
                'e_purchasing.total_harga',
                'e_purchasing.kuantitas',
                'e_purchasing.jml_jenis_produk',
                'e_purchasing.kd_produk',
                'e_purchasing.ongkos_kirim',
                'satker.nama_satker',
                'satker.kd_satker')
            ->get();

        return View('admin.data_pengadaan.e_purchasing.detail_satker_epurchasing')->with('satker', $kd_satker);

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
    public function display_ePurchasing(Request $request)
    {
        $ta = date('Y');
        $arrContextOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ];

        $url = 'https://isb.lkpp.go.id/isb-2/api/0f70ff1b-1cc4-40bd-a7d9-a1b2526a12e7/json/10178/Ecat-PaketEPurchasing/tipe/4:12/parameter/'.$ta.':D159';

        $konten = file_get_contents($url, false, stream_context_create($arrContextOptions));
        $jsonData = json_decode($konten, true);
        $finalarray = [];

        DB::table('e_purchasing')->delete();

        foreach ($jsonData as $key) {
            DB::table('e_purchasing')->insert([
                'tahun_anggaran' => $key['tahun_anggaran'],
                'kd_klpd' => $key['kd_klpd'],
                'satker_id' => $key['satker_id'],
                'nama_satker' => $key['nama_satker'],
                'alamat_satker' => $key['alamat_satker'],
                'npwp_satker' => $key['npwp_satker'],
                'kd_paket' => $key['kd_paket'],
                'no_paket' => $key['no_paket'],
                'nama_paket' => $key['nama_paket'],
                'kd_rup' => $key['kd_rup'],
                'nama_sumber_dana' => $key['nama_sumber_dana'],
                'kode_anggaran' => $key['kode_anggaran'],
                'kd_komoditas' => $key['kd_komoditas'],
                'kd_produk' => $key['kd_produk'],
                'kd_penyedia' => $key['kd_penyedia'],
                'kd_penyedia_distributor' => $key['kd_penyedia_distributor'],
                'jml_jenis_produk' => $key['jml_jenis_produk'],
                // 'total' => $key['total'],
                'kuantitas' => $key['kuantitas'],
                'harga_satuan' => $key['harga_satuan'],
                'ongkos_kirim' => $key['ongkos_kirim'],
                'total_harga' => $key['total_harga'],
                'kd_user_pokja' => $key['kd_user_pokja'],
                'no_telp_user_pokja' => $key['no_telp_user_pokja'],
                'email_user_pokja' => $key['email_user_pokja'],
                'kd_user_ppk' => $key['kd_user_ppk'],
                'ppk-nip' => $key['ppk_nip'],
                'jabatan_ppk' => $key['jabatan_ppk'],
                'tanggal_buat_paket' => $key['tanggal_buat_paket'],
                'tanggal_edit_paket' => $key['tanggal_edit_paket'],
                'deskripsi' => $key['deskripsi'],
                'status_paket' => $key['status_paket'],
                'paket_status_str' => $key['paket_status_str'],
                'catatan_produk' => $key['catatan_produk'],
            ]);
        }
        Alert::success('success', 'Data E-Purchasing berhasil disimpan!');

        return redirect()->route('e_purchasing.index');
    }

    public function display_komoditas()
    {
        $ta = date('Y');
        $kd_komoditas = DB::table('e_purchasing')->select('kd_komoditas')
            ->where('tahun_anggaran', $ta)->groupBy('kd_komoditas')
            ->get();

        // data yang direload dihapus terlebih dahulu
        DB::table('komoditas')->delete();

        if (DB::table('komoditas')->select('kd_komoditas')->exists()) {
            return 'data sudah ada';
        } else {
            foreach ($kd_komoditas as $row) {
                $arrContextOptions = [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
                ];

                $url = 'https://isb.lkpp.go.id/isb-2/api/f8094495-92c2-4f26-b411-27f29e44fed3/json/10159/Ecat-KomoditasDetail/tipe/4/parameter/'.$row->kd_komoditas;

                $konten = file_get_contents($url, false, stream_context_create($arrContextOptions));
                $jsonData = json_decode($konten, true);

                foreach ($jsonData as $key) {
                    $query = DB::table('komoditas')->insert([
                        'kd_komoditas' => $key['kd_komoditas'],
                        'nama_komoditas' => $key['nama_komoditas'],
                        'jenis_katalog' => $key['jenis_katalog'],
                        'nama_instansi_katalog' => $key['nama_instansi_katalog'],
                        'kd_instansi_katalog' => $key['kd_instansi_katalog'],
                    ]);
                }
            }

            Alert::success('success', 'Data Komoditas berhasil disimpan!');

            return redirect()->route('e_purchasing.index');
        }

    }

    public function display_satker()
    {
        $url = 'https://isb.lkpp.go.id/isb-2/api/67dd75b7-1f47-4ea5-a36d-324c8596e927/json/10150/Ecat-InstansiSatker/tipe/12/parameter/D159';
        $arrContextOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ];
        $konten = file_get_contents($url, false, stream_context_create($arrContextOptions));
        $jsonData = json_decode($konten, true);
        $finalarray = [];

        // data yang direload dihapus terlebih dahulu
        DB::table('satker')->delete();

        foreach ($jsonData as $key) {
            DB::table('satker')->insert([
                'kd_klpd' => $key['kd_klpd'],
                'nama_klpd' => $key['nama_klpd'],
                'jenis_klpd' => $key['jenis_klpd'],
                'kd_satker' => $key['kd_satker'],
                'kd_satker_str' => $key['kd_satker_str'],
                'nama_satker' => $key['nama_satker'],
            ]);
        }

        Alert::success('success', 'Data Satuan Kerja berhasil disimpan!');

        return redirect()->route('satker.index');

    }
}