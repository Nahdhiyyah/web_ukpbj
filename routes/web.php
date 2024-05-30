<?php

use App\Http\Controllers\Admin\Data_Pengadaan\E_PurchasingController;
use App\Http\Controllers\Admin\Data_Pengadaan\NonTenderController;
use App\Http\Controllers\Admin\Data_Pengadaan\PencatatanSwakelolaController;
use App\Http\Controllers\Admin\Data_Pengadaan\SatkerController;
use App\Http\Controllers\Admin\Data_Pengadaan\SirupPenyediaController;
use App\Http\Controllers\Admin\Data_Pengadaan\TenderController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\Publikasi\BeritaController;
use App\Http\Controllers\Admin\Publikasi\PengumumanController;
use App\Http\Controllers\Admin\SeputarPengadaanController;
use App\Http\Controllers\AdminKonsultasiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\SuperadminController;
use App\Http\Controllers\User\Beranda;
use App\Http\Controllers\User\BeritaHome;
use App\Http\Controllers\User\E_PurchasingHome;
use App\Http\Controllers\User\HomeMateriController;
use App\Http\Controllers\User\HomeSeputarPengadaanController;
use App\Http\Controllers\User\HomePencatatanSwakelolaController;
use App\Http\Controllers\User\NonTenderHomeController;
use App\Http\Controllers\User\PengumumanHome;
use App\Http\Controllers\User\ProdukHukumHome;
use App\Http\Controllers\User\HomeTenderController;
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
Route::get('struktur', function () {
    return view('user.struktur');
})->name('home.struktur');

// Home Kontak
Route::view('/kontak', 'user.kontak')->name('home.kontak');

// Home Konsultasi
Route::get('home konsultasi', function () {
    return View('user.konsultasi.home_user_konsul');
})->name('home.user.konsul');

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

// Dashboard (Admin/User/Super admin)
Route::get('/dashboard', [AuthenticatedSessionController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/complete-registration', [RegisteredUserController::class, 'completeRegistration'])->name('complete.registration');

// Auth Profil
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'adminMiddleware', 'verified'])
    ->group(function () {
        // Manage User Untuk Super Admin
        Route::get('manage_user', [SuperadminController::class, 'index'])->name('manage.user.index');

        // Pengumuman Admin
        Route::get('pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
        Route::get('create pengumuman', [PengumumanController::class, 'create'])->name('pengumuman.create');
        Route::post('store pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
        Route::delete('destroy pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');
        Route::get('show pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');
        Route::get('edit pengumuman/{id}', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
        Route::put('update pengumuman/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');

        // Berita Admin
        Route::get('berita', [BeritaController::class, 'index'])->name('berita.index');
        Route::get('createberita', [BeritaController::class, 'create'])->name('berita.create');
        Route::post('storeberita', [BeritaController::class, 'store'])->name('berita.store');
        Route::delete('destroyberita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
        Route::get('showberita/{id}', [BeritaController::class, 'show'])->name('berita.show');
        Route::get('editberita/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::put('updateberita/{id}', [BeritaController::class, 'update'])->name('berita.update');

        // Data Tender Admin
        Route::get('tender', [TenderController::class, 'index'])->name('tender.index');
        Route::get('tender insert', [TenderController::class, 'display_tender'])->name('tender.insert');

        // Data Non Tender Admin
        Route::get('non_tender', [NonTenderController::class, 'index'])->name('nontender.index');
        Route::get('insert non_tender', [NonTenderController::class, 'display_nontender'])->name('nontender.insert');

        // E-Purchasing Admin
        Route::get('e_purchasing', [E_PurchasingController::class, 'index'])->name('e_purchasing.index');
        Route::get('paket detail/{no_paket}', [E_PurchasingController::class, 'detail_paket'])->name('e_purchasing.detail');
        Route::get('satker detail/{kd_satker}', [E_PurchasingController::class, 'detail_satker'])->name('e_purchasing.detail.satker');
        Route::get('insert e_purchasing', [E_PurchasingController::class, 'display_ePurchasing'])->name('e_purchasing.insert');
        Route::get('search e_purchasing', [E_PurchasingController::class, 'search'])->name('e_purchasing.search');
        Route::get('insert komoditas', [E_PurchasingController::class, 'display_komoditas'])->name('komoditas.insert');

        // Sirup Penyedia Admin
        Route::get('penyedia', [SirupPenyediaController::class, 'index'])->name('penyedia');

        // Sirup Swakelola

        // Pencatatan Swakelola Admin
        Route::get('insert swakelola', [PencatatanSwakelolaController::class, 'display_swakelola'])->name('swakelola.insert');
        Route::get('swakelola', [PencatatanSwakelolaController::class, 'index'])->name('swakelola.index');

        // Gallery Admin
        Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');
        Route::get('create gallery', [GalleryController::class, 'create'])->name('gallery.create');
        Route::post('store gallery', [GalleryController::class, 'store'])->name('gallery.store');
        Route::delete('destroy gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
        Route::get('show gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');
        Route::get('edit gallery/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
        Route::put('update gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');

        // Materi / Informasi admin
        Route::get('materi', [MateriController::class, 'index'])->name('materi.index');
        Route::get('create materi', [MateriController::class, 'create'])->name('materi.create');
        Route::post('store materi', [MateriController::class, 'store'])->name('materi.store');
        Route::delete('destroy materi/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');
        Route::get('edit materi/{id}', [MateriController::class, 'edit'])->name('materi.edit');
        Route::put('update materi/{id}', [MateriController::class, 'update'])->name('materi.update');

        // Seputar Pengadaan Admin
        Route::get('seputar pengadaan', [SeputarPengadaanController::class, 'index'])->name('pengadaan.index');
        Route::get('create pengadaan', [SeputarPengadaanController::class, 'create'])->name('pengadaan.create');
        Route::post('store pengadaan', [SeputarPengadaanController::class, 'store'])->name('pengadaan.store');
        Route::delete('destroy pengadaan/{id}', [SeputarPengadaanController::class, 'destroy'])->name('pengadaan.destroy');
        Route::get('edit pengadaan/{id}', [SeputarPengadaanController::class, 'edit'])->name('pengadaan.edit');
        Route::put('update pengadaan/{id}', [SeputarPengadaanController::class, 'update'])->name('pengadaan.update');

        // Produk Hukum Admin
        Route::get('produk hukum', [ProdukController::class, 'index'])->name('produk.index');
        Route::get('create prohum', [ProdukController::class, 'create'])->name('prohum.create');
        Route::post('store prohum', [ProdukController::class, 'store'])->name('prohum.store');
        Route::delete('destroy prohum/{id}', [ProdukController::class, 'destroy'])->name('prohum.destroy');
        Route::get('edit prohum/{id}', [ProdukController::class, 'edit'])->name('prohum.edit');
        Route::put('update prohum/{id}', [ProdukController::class, 'update'])->name('prohum.update');

        // Satuan Kerja Admin
        Route::get('satker admin', [SatkerController::class, 'index'])->name('satker.index');
        Route::get('insert satker', [E_PurchasingController::class, 'display_satker'])->name('satker.insert');

        // Admin Konsultasi
        Route::get('daftar konsultasi admin', [AdminKonsultasiController::class, 'index_admin'])->name('daftar.konsul.admin');
        Route::get('create balasan{id}', [AdminKonsultasiController::class, 'create_balasan'])->name('create.balas.admin');
        Route::post('store balasan{id}', [AdminKonsultasiController::class, 'store_balasan'])->name('store.balas.admin');
        Route::delete('destroy konsul{id}', [AdminKonsultasiController::class, 'destroy'])->name('destroy.konsul.admin');
        Route::get('edit status konsultasi{id}', [AdminKonsultasiController::class, 'status_edit'])->name('edit.status');
        Route::get('show balasan{id}', [AdminKonsultasiController::class, 'konsul_show'])->name('show.balas.admin');
        Route::put('update status{id}', [AdminKonsultasiController::class, 'status_update'])->name('status.update');
    });

Route::middleware(['auth', 'userMiddleware', 'verified'])
    ->group(function () {
        // fitur konsultasi admin
        Route::get('daftar konsultasi user', [KonsultasiController::class, 'index_user'])->name('daftar.konsul.user');
        Route::get('create konsultasi', [KonsultasiController::class, 'user_create'])->name('create.konsul.user');
        Route::post('store konsultasi', [KonsultasiController::class, 'user_store'])->name('store.konsul.user');
        Route::delete('destroy konsultasi/{konsul_id}', [KonsultasiController::class, 'destroy'])->name('destroy.konsul.user');
        Route::get('edit konsultasi{konsul_id}', [KonsultasiController::class, 'user_edit'])->name('edit.konsul.user');
        Route::put('update konsultasi{konsul_id}', [KonsultasiController::class, 'user_update'])->name('update.konsul.user');
        Route::get('show konsultasi{konsul_id}', [KonsultasiController::class, 'user_show'])->name('show.konsul.user');
        Route::post('user balas{konsul_id}', [KonsultasiController::class, 'user_store_balas'])->name('store.balas.user');
        Route::get('create user balas{konsul_id}', [KonsultasiController::class, 'user_create_balas'])->name('create.balas.user');

    });

require __DIR__.'/auth.php';