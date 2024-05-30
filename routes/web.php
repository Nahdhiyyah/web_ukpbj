<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\Data_Pengadaan\E_PurchasingController;
use App\Http\Controllers\Admin\Data_Pengadaan\NonTenderController;
use App\Http\Controllers\Admin\Data_Pengadaan\PencatatanNonSPKController;
use App\Http\Controllers\Admin\Data_Pengadaan\PencatatanSwakelolaController;
use App\Http\Controllers\Admin\Data_Pengadaan\SatkerController;
use App\Http\Controllers\Admin\Data_Pengadaan\SirupPenyediaController;
use App\Http\Controllers\Admin\Data_Pengadaan\SirupSwakelolaController;
use App\Http\Controllers\Admin\Data_Pengadaan\TenderController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\Publikasi\BeritaController;
use App\Http\Controllers\Admin\Publikasi\PengumumanController;
use App\Http\Controllers\Admin\SeputarPengadaanController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Konsultasi\KonsultasiAdminController;
use App\Http\Controllers\Konsultasi\KonsultasiMasyarakatController;
use App\Http\Controllers\Konsultasi\RekapKonsultasiController;
use App\Http\Controllers\Pengaduan\PengaduanAdminController;
use App\Http\Controllers\Pengaduan\PengaduanMasyarakatController;
use App\Http\Controllers\Pengaduan\RekapPengaduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\SuperadminController;
use App\Http\Controllers\Survey\JawabanController;
use App\Http\Controllers\Survey\PertanyaanController;
use App\Http\Controllers\Survey\RekapSurveyController;
use App\Http\Controllers\Survey\SurveyController;
use App\Http\Controllers\User\Beranda;
use App\Http\Controllers\User\BeritaHome;
use App\Http\Controllers\User\E_PurchasingHome;
use App\Http\Controllers\User\HomeGalleryController;
use App\Http\Controllers\User\HomeMateriController;
use App\Http\Controllers\User\HomeNonSPKController;
use App\Http\Controllers\User\HomePencatatanSwakelolaController;
use App\Http\Controllers\User\HomeSeputarPengadaanController;
use App\Http\Controllers\User\HomeSirupPenyediaController;
use App\Http\Controllers\User\HomeSirupSwakelolaController;
use App\Http\Controllers\User\HomeStaffController;
use App\Http\Controllers\User\HomeTenderController;
use App\Http\Controllers\User\NonTenderHomeController;
use App\Http\Controllers\User\PengumumanHome;
use App\Http\Controllers\User\ProdukHukumHome;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Beranda
Route::get('/', [Beranda::class, 'index'])->name('home');

// Home Profil
Route::get('tentang kami', function () {
    return view('user.profil');
})->name('home.profil');

// Home Typoksi
Route::get('tupoksi', function () {
    return view('user.tupoksi');
})->name('home.tupoksi');

// Home Struktur
Route::get('struktur', [HomeStaffController::class, 'index'])->name('home.struktur');

// Home Kontak
Route::view('kontak', 'user.kontak')->name('home.kontak');

// Home Gallery
Route::get('home gallery', [HomeGalleryController::class, 'index'])->name('home.gallery');
Route::get('detail gallery{kategori}', [HomeGalleryController::class, 'detail_gallery'])->name('detail.gallery');

// Home Konsultasi
Route::get('home konsultasi', function () {
    return View('user.konsultasi.home_user_konsul');
})->name('home.user.konsul');

// Home Survey
Route::get('home survey', function () {
    return View('user.survey.home_survey');
})->name('home.user.survey');

// Home Pusat Pengaduan
Route::get('home pengaduan', function () {
    return view('user.pengaduan.home_user_pengaduan');
})->name('home.user.pengaduan');

// Home Materi dan Informasi
Route::get('/materi dan informasi', [HomeMateriController::class, 'index'])->name('materi.home');
Route::get('/group materi', [HomeMateriController::class, 'index_materi'])->name('group.materi');
Route::get('/group sdp', [HomeMateriController::class, 'index_sdp'])->name('group.sdp');

// Home Seputar Pengadaan
Route::get('home seputar pengadaan', [HomeSeputarPengadaanController::class, 'index'])->name('pengadaan.home');
Route::get('detail home pengadaan{id}', [HomeSeputarPengadaanController::class, 'show'])->name('show.pengadaan.home');

// Home Pengumuman
Route::get('home pengumuman', [PengumumanHome::class, 'index'])->name('pengumuman.home');
Route::get('detail home pengumuman{id}', [PengumumanHome::class, 'show'])->name('show.pengumuman.home');

// Home Berita
Route::get('home-berita', [BeritaHome::class, 'index'])->name('berita.home');
Route::get('detail home berita{id}', [BeritaHome::class, 'show'])->name('show.berita.home');

// Home E_purchasing
Route::get('home e_purchasing', [E_PurchasingHome::class, 'index'])->name('e_purchasing.home');
Route::get('home paket detail{no_paket}', [E_PurchasingHome::class, 'detail_paket'])->name('e_purchasing.home.paket');
Route::get('home satker detail{kd_satker}', [E_PurchasingHome::class, 'detail_satker'])->name('e_purchasing.home.satker');

// Home Produk Hukum
Route::get('home produkhukum', [ProdukHukumHome::class, 'index'])->name('produkhukum.home');

// Home Non Tender
Route::get('home nontender', [NonTenderHomeController::class, 'index'])->name('nontender.home');

// Home Tender
Route::get('home tender', [HomeTenderController::class, 'index'])->name('tender.home');

// Home Pencatatan Swakelola
Route::get('home pencatatan swakelola', [HomePencatatanSwakelolaController::class, 'index'])->name('pencatatan.swakelola.home');

// Home Non SPK
Route::get('home pencatatan non spk', [HomeNonSPKController::class, 'index'])->name('pencatatan.non_spk.home');

// Home Siru Penyedia
Route::get('home sirup penyedia', [HomeSirupPenyediaController::class, 'index'])->name('penyedia.home');

// Home Sirup Swakelola
Route::get('home sirup swakelola', [HomeSirupSwakelolaController::class, 'index'])->name('sirup_swakelola.home');

// Dashboard (Admin/User/Super admin)
Route::get('/dashboard', [AuthenticatedSessionController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Auth Profil
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'adminMiddleware', 'verified'])
    ->group(function () {
        // Admin Home
        Route::get('admin home', [AdminHomeController::class, 'index'])->name('admin');

        // Manage User Untuk Super Admin
        Route::get('manage_user', [SuperadminController::class, 'index'])->name('manage.user.index');
        Route::put('edit user role{id}', [SuperadminController::class, 'update'])->name('manage.user.update');
        Route::get('edit role{id}', [SuperadminController::class, 'edit'])->name('manage.user.edit');

        // Pengumuman Admin
        Route::get('pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
        Route::get('create pengumuman', [PengumumanController::class, 'create'])->name('pengumuman.create');
        Route::post('store pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
        Route::delete('destroy pengumuman{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');
        Route::get('show pengumuman{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');
        Route::get('edit pengumuman{id}', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
        Route::put('update pengumuman{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');

        // Berita Admin
        Route::get('berita', [BeritaController::class, 'index'])->name('berita.index');
        Route::get('createberita', [BeritaController::class, 'create'])->name('berita.create');
        Route::post('storeberita', [BeritaController::class, 'store'])->name('berita.store');
        Route::delete('destroyberita{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
        Route::get('showberita{id}', [BeritaController::class, 'show'])->name('berita.show');
        Route::get('editberita{id}', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::put('updateberita{id}', [BeritaController::class, 'update'])->name('berita.update');

        // Data Tender Admin
        Route::get('tender', [TenderController::class, 'index'])->name('tender.index');
        Route::get('tender insert', [TenderController::class, 'display_tender'])->name('tender.insert');
        Route::get('tender 2 insert', [TenderController::class, 'display_tender_selesai'])->name('tender2.insert');
        Route::post('tahun', [TenderController::class, 'set_tahun_anggaran'])->name('set_tahun');

        // Data Non Tender Admin
        Route::get('non_tender', [NonTenderController::class, 'index'])->name('nontender.index');
        Route::get('insert non_tender', [NonTenderController::class, 'display_nontender'])->name('nontender.insert');

        // E-Purchasing Admin
        Route::get('e_purchasing', [E_PurchasingController::class, 'index'])->name('e_purchasing.index');
        Route::get('paket detail{no_paket}', [E_PurchasingController::class, 'detail_paket'])->name('e_purchasing.detail');
        Route::get('satker detail{kd_satker}', [E_PurchasingController::class, 'detail_satker'])->name('e_purchasing.detail.satker');
        Route::get('insert e_purchasing', [E_PurchasingController::class, 'display_ePurchasing'])->name('e_purchasing.insert');
        Route::get('search e_purchasing', [E_PurchasingController::class, 'search'])->name('e_purchasing.search');
        Route::get('insert komoditas', [E_PurchasingController::class, 'display_komoditas'])->name('komoditas.insert');

        // Sirup Penyedia Admin
        Route::get('sirup penyedia', [SirupPenyediaController::class, 'index'])->name('penyedia.index');
        Route::get('sirup penyedia insert', [SirupPenyediaController::class, 'display_penyedia'])->name('penyedia.insert');

        // Sirup Swakelola
        Route::get('sirup swakelola', [SirupSwakelolaController::class, 'index'])->name('sirup_swakelola.index');
        Route::get('sirup swakelola insert', [SirupSwakelolaController::class, 'display_sirup_swakelola'])->name('sirup_swakelola.insert');

        // Pencatatan Swakelola Admin
        Route::get('insert swakelola', [PencatatanSwakelolaController::class, 'display_swakelola'])->name('swakelola.insert');
        Route::get('swakelola', [PencatatanSwakelolaController::class, 'index'])->name('swakelola.index');

        // Pencatatan Non SPK
        Route::get('insert non spk', [PencatatanNonSPKController::class, 'display_non_spk'])->name('non_spk.insert');
        Route::get('non spk', [PencatatanNonSPKController::class, 'index'])->name('non_spk.index');

        // Gallery Admin
        Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');
        Route::get('create gallery', [GalleryController::class, 'create'])->name('gallery.create');
        Route::post('store gallery', [GalleryController::class, 'store'])->name('gallery.store');
        Route::delete('destroy gallery{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
        Route::get('show gallery{id}', [GalleryController::class, 'show'])->name('gallery.show');
        Route::get('edit gallery{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
        Route::put('update gallery{id}', [GalleryController::class, 'update'])->name('gallery.update');

        // Materi / Informasi admin
        Route::get('materi', [MateriController::class, 'index'])->name('materi.index');
        Route::get('create materi', [MateriController::class, 'create'])->name('materi.create');
        Route::post('store materi', [MateriController::class, 'store'])->name('materi.store');
        Route::delete('destroy materi{id}', [MateriController::class, 'destroy'])->name('materi.destroy');
        Route::get('edit materi{id}', [MateriController::class, 'edit'])->name('materi.edit');
        Route::put('update materi{id}', [MateriController::class, 'update'])->name('materi.update');

        // Seputar Pengadaan Admin
        Route::get('seputar pengadaan', [SeputarPengadaanController::class, 'index'])->name('pengadaan.index');
        Route::get('create pengadaan', [SeputarPengadaanController::class, 'create'])->name('pengadaan.create');
        Route::post('store pengadaan', [SeputarPengadaanController::class, 'store'])->name('pengadaan.store');
        Route::delete('destroy pengadaan{id}', [SeputarPengadaanController::class, 'destroy'])->name('pengadaan.destroy');
        Route::get('edit pengadaan{id}', [SeputarPengadaanController::class, 'edit'])->name('pengadaan.edit');
        Route::put('update pengadaan{id}', [SeputarPengadaanController::class, 'update'])->name('pengadaan.update');

        // Produk Hukum Admin
        Route::get('produk hukum', [ProdukController::class, 'index'])->name('produk.index');
        Route::get('create prohum', [ProdukController::class, 'create'])->name('prohum.create');
        Route::post('store prohum', [ProdukController::class, 'store'])->name('prohum.store');
        Route::delete('destroy prohum{id}', [ProdukController::class, 'destroy'])->name('prohum.destroy');
        Route::get('edit prohum{id}', [ProdukController::class, 'edit'])->name('prohum.edit');
        Route::put('update prohum{id}', [ProdukController::class, 'update'])->name('prohum.update');

        // Satuan Kerja Admin
        Route::get('satker admin', [SatkerController::class, 'index'])->name('satker.index');
        Route::get('insert satker', [E_PurchasingController::class, 'display_satker'])->name('satker.insert');

        // Admin Konsultasi
        Route::get('daftar konsultasi admin', [KonsultasiAdminController::class, 'index_admin'])->name('daftar.konsul.admin');
        Route::get('create balasan{konsul_id}', [KonsultasiAdminController::class, 'create_balasan'])->name('create.balas.admin');
        Route::post('store balasan{konsul_id}', [KonsultasiAdminController::class, 'store_balasan'])->name('store.balas.admin');
        Route::get('destroy konsul{konsul_id}', [KonsultasiAdminController::class, 'destroy'])->name('destroy.konsul.admin');
        Route::get('edit status konsultasi{konsul_id}', [KonsultasiAdminController::class, 'status_edit'])->name('edit.status');
        Route::get('show balasan status{konsul_id}', [KonsultasiAdminController::class, 'konsul_show_status'])->name('show.balas.status');
        Route::get('show balasan{konsul_id}', [KonsultasiAdminController::class, 'konsul_show'])->name('show.balas.admin');
        Route::put('update status{konsul_id}', [KonsultasiAdminController::class, 'status_update'])->name('status.update');
        // Route::get('edit balasan{id}', [KonsultasiAdminController::class, 'edit_balasan'])->name('balasan.edit');
        // Route::put('update balasan{id}', [KonsultasiAdminController::class, 'update_balasan'])->name('balasan.update');
        Route::get('rekap konsultasi', [RekapKonsultasiController::class, 'index'])->name('rekap.konsul');
        Route::get('cetak rekap konsultasi', [RekapKonsultasiController::class, 'cetakPdf'])->name('cetak.rekap.konsul');

        // Staff Admin
        Route::get('staff', [StaffController::class, 'index'])->name('staff.index');
        Route::get('create staff', [StaffController::class, 'create'])->name('staff.create');
        Route::post('store staff', [StaffController::class, 'store'])->name('staff.store');
        Route::get('destroy staff{id}', [StaffController::class, 'destroy'])->name('staff.destroy');
        Route::get('edit staff{id}', [StaffController::class, 'edit'])->name('staff.edit');
        Route::put('update staff{id}', [StaffController::class, 'update'])->name('staff.update');

        // Survey Admin
        Route::get('survey', [SurveyController::class, 'index'])->name('survey.index');
        Route::get('create survey', [SurveyController::class, 'create'])->name('survey.create');
        Route::post('store survey', [SurveyController::class, 'store'])->name('survey.store');
        Route::get('destroy survey{id}', [SurveyController::class, 'destroy'])->name('survey.destroy');
        Route::get('edit survey{id}', [SurveyController::class, 'edit'])->name('survey.edit');
        Route::put('update survey{id}', [SurveyController::class, 'update'])->name('survey.update');

        Route::get('pertanyaan survey{id}', [PertanyaanController::class, 'index'])->name('pertanyaan.index');
        Route::get('create pertanyaan{id}', [PertanyaanController::class, 'create'])->name('pertanyaan.create');
        Route::post('store pertanyaan{id}', [PertanyaanController::class, 'store'])->name('pertanyaan.store');
        Route::get('destroy pertanyaan{id}', [PertanyaanController::class, 'destroy'])->name('pertanyaan.destroy');

        Route::get('lihat jawaban survey', [RekapSurveyController::class, 'index'])->name('jawaban.index');
        Route::get('detail jawaban {user_id} {survey_id} {tanggal}', [RekapSurveyController::class, 'show'])->name('jawaban.detail');
        Route::get('hapus jawaban {user_id} {survey_id} {tanggal}', [RekapSurveyController::class, 'destroy'])->name('jawaban.hapus');

        // Pengaduan Admin
        Route::get('daftar pengaduan admin', [PengaduanAdminController::class, 'index_admin'])->name('daftar.pengaduan.admin');
        Route::get('buat balasan pengaduan{id}', [PengaduanAdminController::class, 'create_balasan'])->name('create.balaspengaduan.admin');
        Route::post('submit balasan pengaduan{id}', [PengaduanAdminController::class, 'store_balasan'])->name('store.balaspengaduan.admin');
        Route::get('hapus pengaduan{id}', [PengaduanAdminController::class, 'destroy'])->name('destroy.pengaduan.admin');
        Route::get('edit status pengaduan{id}', [PengaduanAdminController::class, 'status_edit'])->name('edit.statuspengaduan');
        Route::get('lihat pengaduan{id}', [PengaduanAdminController::class, 'pengaduan_show_status'])->name('show.balaspengaduan.status');
        Route::get('lihat balasan pengaduan{id}', [PengaduanAdminController::class, 'pengaduan_show'])->name('show.balaspengaduan.admin');
        Route::put('update status pengaduan{id}', [PengaduanAdminController::class, 'status_update'])->name('statuspengaduan.update');
        Route::get('rekap pengaduan', [RekapPengaduanController::class, 'index'])->name('rekap.pengaduan');
        Route::get('cetak rekap pengaduan', [RekapPengaduanController::class, 'cetakPdf'])->name('cetak.rekap.pengaduan');

    });

Route::middleware(['auth', 'userMiddleware', 'verified'])
    ->group(function () {
        // fitur konsultasi masyarakat
        Route::get('daftar konsultasi user', [KonsultasiMasyarakatController::class, 'index_user'])->name('daftar.konsul.user');
        Route::get('create-konsultasi', [KonsultasiMasyarakatController::class, 'user_create'])->name('create.konsul.user');
        Route::post('store konsultasi', [KonsultasiMasyarakatController::class, 'user_store'])->name('store.konsul.user');
        Route::get('destroy konsultasi{konsul_id}', [KonsultasiMasyarakatController::class, 'destroy'])->name('destroy.konsul.user');
        Route::get('edit konsultasi{konsul_id}', [KonsultasiMasyarakatController::class, 'user_edit'])->name('edit.konsul.user');
        Route::put('update konsultasi{konsul_id}', [KonsultasiMasyarakatController::class, 'user_update'])->name('update.konsul.user');
        Route::get('show konsultasi{konsul_id}', [KonsultasiMasyarakatController::class, 'user_show'])->name('show.konsul.user');
        Route::post('user balas{konsul_id}', [KonsultasiMasyarakatController::class, 'user_store_balas'])->name('store.balas.user');
        Route::get('create user balas{konsul_id}', [KonsultasiMasyarakatController::class, 'user_create_balas'])->name('create.balas.user');

        // fitur survey user
        Route::get('survey pelayanan publik', [JawabanController::class, 'index_survey'])->name('index.survey.user');
        Route::get('pertanyaan {id}', [JawabanController::class, 'index_pertanyaan'])->name('index.pertanyaan.user');
        Route::post('isi survey', [JawabanController::class, 'store'])->name('survey.store.user');

        // pengaduan masyarakat
        Route::get('daftar pengaduan user', [PengaduanMasyarakatController::class, 'index_user'])->name('daftar.pengaduan.user');
        Route::get('create pengaduan', [PengaduanMasyarakatController::class, 'user_create'])->name('create.pengaduan.user');
        Route::post('store pengaduan', [PengaduanMasyarakatController::class, 'user_store'])->name('store.pengaduan.user');
        Route::get('destroy pengaduan{id}', [PengaduanMasyarakatController::class, 'destroy'])->name('destroy.pengaduan.user');
        Route::put('update pengaduan{id}', [PengaduanMasyarakatController::class, 'user_update'])->name('update.pengaduan.user');
        // Route::get('edit pengaduan{id}', [PengaduanMasyarakatController::class, 'user_edit'])->name('edit.pengaduan.user');
        Route::get('show pengaduan{id}', [PengaduanMasyarakatController::class, 'user_show'])->name('show.pengaduan.user');

    });

require __DIR__.'/auth.php';