<?php

use App\Http\Controllers\dashboard\AdminAlumiController;
use App\Http\Controllers\dashboard\aksescepat\berita\AdminBeritaController;
use App\Http\Controllers\dashboard\aksescepat\ekstrakurikuler\AdminEkstrakurikulerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landing\HomeController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\BeritaController;
use App\Http\Controllers\dashboard\contact\AdminContactController;
use App\Http\Controllers\dashboard\mts\MtsAdminController;
use App\Http\Controllers\dashboard\pendaftaran\mts\AdminMtsController;
use App\Http\Controllers\dashboard\pendaftaran\santri\AdminSantriController;
use App\Http\Controllers\dashboard\pendaftaran\sma\AdminSmaController;
use App\Http\Controllers\landing\berita\FrontBeritaController;
use App\Http\Controllers\dashboard\PengaturanController;
use App\Http\Controllers\dashboard\PesertaDidikController;
use App\Http\Controllers\dashboard\ra\RaAdminController;
use App\Http\Controllers\dashboard\sma\SmaAdminController;
use App\Http\Controllers\dashboard\sma\SmaController as SmaSmaController;
use App\Http\Controllers\dashboard\tentang\divisi\AdminDivisiController;
use App\Http\Controllers\dashboard\tentang\organisasi\AdminOrganisasiController;
use App\Http\Controllers\dashboard\tentang\selayangpandang\AdminSelayangPandangController;
use App\Http\Controllers\login\AuthController;
use App\Http\Controllers\landing\tentang\SelayangController;
use App\Http\Controllers\landing\tentang\OrganisasiController;
use App\Http\Controllers\landing\tentang\DivisiController;
use App\Http\Controllers\landing\ContactController;

// Selayang Pandang Controller
use App\Http\Controllers\landing\tentang\SelayangPandang\LokasiController;
use App\Http\Controllers\landing\tentang\SelayangPandang\SambutanController;
use App\Http\Controllers\landing\tentang\SelayangPandang\SejarahController;
use App\Http\Controllers\landing\tentang\SelayangPandang\VisiYayasanController;

// Organisasi & Tata Kerja Controller
use App\Http\Controllers\landing\tentang\OrganisasiTataKerja\StrukturYayasanController;
use App\Http\Controllers\landing\tentang\OrganisasiTataKerja\ProfilPimpinanController;

// Divisi Controller
use App\Http\Controllers\landing\tentang\Divisi\DivisiMediaController;
use App\Http\Controllers\landing\tentang\Divisi\DivisiITController;

// Pendaftaran Controller
use App\Http\Controllers\landing\pendaftaran\PendaftaranController;
use App\Http\Controllers\landing\pendaftaran\DaftarSantriController;
use App\Http\Controllers\landing\pendaftaran\DaftarRAController;
use App\Http\Controllers\landing\pendaftaran\DaftarMTsController;
use App\Http\Controllers\landing\pendaftaran\DaftarSMAController;

// SMA Controller
use App\Http\Controllers\landing\SMA\SMAController;
use App\Http\Controllers\landing\SMA\HeadmasterSMAController;
use App\Http\Controllers\landing\SMA\VisiMisiSMAController;
use App\Http\Controllers\landing\SMA\StrukturSMAController;

// MTs Controller
use App\Http\Controllers\landing\MTs\MTsController;
use App\Http\Controllers\landing\MTs\HeadmasterMTsController;
use App\Http\Controllers\landing\MTs\VisiMisiMTsController;
use App\Http\Controllers\landing\MTs\StrukturMTsController;

// RA Controller
use App\Http\Controllers\landing\RA\RAController;
use App\Http\Controllers\landing\RA\HeadmasterRAController;
use App\Http\Controllers\landing\RA\VisiMisiRAController;
use App\Http\Controllers\landing\RA\StrukturRAController;

// Unit Controller
use App\Http\Controllers\landing\unit\UnitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Landing
Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/maintenance', [HomeController::class, 'showMaintenance']);
Route::get('/videoprofil', [HomeController::class, 'showVideoProfil']);

Route::prefix('tentang')->group(function () {
    Route::get('/', [HomeController::class, 'showTentang']);
    Route::prefix('selayangpandang')->group(function () {
        Route::get('/', [HomeController::class, 'showSelayangPandang']);
        Route::get('/sambutan', [SambutanController::class, 'index']);
        Route::get('/sejarah', [SejarahController::class, 'index']);
        Route::get('/visi', [VisiYayasanController::class, 'index']);
        Route::get('/lokasi', [LokasiController::class, 'index']);
    });

    Route::prefix('organisasi')->group(function () {
        Route::get('/', [HomeController::class, 'showOrganisasi']);
        Route::get('/struktur', [StrukturYayasanController::class, 'index']);
        Route::get('/profil', [ProfilPimpinanController::class, 'index']);
    });

    Route::prefix('divisi')->group(function () {
        Route::get('/', [HomeController::class, 'showDivisi']);
        Route::get('/{id}', [DivisiMediaController::class, 'index']);
    });
});

Route::prefix('pendaftaran')->group(function () {
    Route::get('/', [PendaftaranController::class, 'index']);
    Route::get('/santri', [DaftarSantriController::class, 'index']);
    Route::get('/ra', [DaftarRAController::class, 'index']);
    Route::get('/mts', [DaftarMTsController::class, 'index']);
    Route::get('/sma', [DaftarSMAController::class, 'index']);
});

Route::prefix('sma')->group(function () {
    Route::get('/', [SMAController::class, 'index']);
    Route::get('/visimisi', [VisiMisiSMAController::class, 'index']);
    Route::get('/headmaster', [HeadmasterSMAController::class, 'index']);
    Route::get('/struktur', [StrukturSMAController::class, 'index']);
});

Route::prefix('mts')->group(function () {
    Route::get('/', [MTsController::class, 'index']);
    Route::get('/visimisi', [VisiMisiMTsController::class, 'index']);
    Route::get('/headmaster', [HeadmasterMTsController::class, 'index']);
    Route::get('/struktur', [StrukturMTsController::class, 'index']);
});

Route::prefix('ra')->group(function () {
    Route::get('/', [RAController::class, 'index']);
    Route::get('/visimisi', [VisiMisiRAController::class, 'index']);
    Route::get('/headmaster', [HeadmasterRAController::class, 'index']);
    Route::get('/struktur', [StrukturRAController::class, 'index']);
});

Route::prefix('unit')->group(function () {
    Route::get('/', [UnitController::class, 'ShowAllUnit']);
    Route::get('/detail', [FrontBeritaController::class, 'DetailBerita']);
});

Route::get('/aksescepat', [HomeController::class, 'showAksesCepat']);

Route::prefix('berita')->group(function () {
    Route::get('/', [FrontBeritaController::class, 'index']);
    Route::get('/detail/{id}', [FrontBeritaController::class, 'DetailBerita']);
});

//Dashboard
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/postlogin', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')
        ->middleware('can:admin')
        ->group(function () {
            //Home
            Route::get('/dashboard', [DashboardController::class, 'index']);
            Route::post('/dashboard/create', [DashboardController::class, 'store']);
            Route::get('/dashboard/destroy/{id}', [DashboardController::class, 'destroy']);
            Route::get('/dashboard/edit/{id}', [DashboardController::class, 'edit']);
            Route::post('/dashboard/update/{id}', [DashboardController::class, 'update']);

            //Home Background
            Route::post('/dashboard/create/bg', [DashboardController::class, 'storebg']);
            Route::get('/dashboard/destroy/bg/{id}', [DashboardController::class, 'destroybg']);
            Route::get('/dashboard/edit/bg/{id}', [DashboardController::class, 'editbg']);
            Route::post('/dashboard/update/bg/{id}', [DashboardController::class, 'updatebg']);

            //Home Header
            Route::post('/dashboard/create/header', [DashboardController::class, 'storeheader']);
            Route::get('/dashboard/destroy/header/{id}', [DashboardController::class, 'destroyheader']);
            Route::get('/dashboard/edit/header/{id}', [DashboardController::class, 'editheader']);
            Route::post('/dashboard/update/header/{id}', [DashboardController::class, 'updateheader']);

            //Home Program Unggulan
            Route::post('/dashboard/create/program', [DashboardController::class, 'storeprogram']);
            Route::get('/dashboard/destroy/program/{id}', [DashboardController::class, 'destroyprogram']);
            Route::get('/dashboard/edit/program/{id}', [DashboardController::class, 'editprogram']);
            Route::post('/dashboard/update/program/{id}', [DashboardController::class, 'updateprogram']);

            //Home Kotak
            Route::post('/dashboard/create/kotak', [DashboardController::class, 'storekotak']);
            Route::get('/dashboard/destroy/kotak/{id}', [DashboardController::class, 'destroykotak']);
            Route::get('/dashboard/edit/kotak/{id}', [DashboardController::class, 'editkotak']);
            Route::post('/dashboard/update/kotak/{id}', [DashboardController::class, 'updatekotak']);

            //Home Logo
            Route::post('/dashboard/create/logo', [DashboardController::class, 'storelogo']);
            Route::get('/dashboard/destroy/logo/{id}', [DashboardController::class, 'destroylogo']);
            Route::get('/dashboard/edit/logo/{id}', [DashboardController::class, 'editlogo']);
            Route::post('/dashboard/update/logo/{id}', [DashboardController::class, 'updatelogo']);

            //Berita
            Route::get('/berita', [BeritaController::class, 'index']);
            Route::post('/berita/create/', [BeritaController::class, 'store']);
            Route::get('/berita/destroy/{id}', [BeritaController::class, 'destroy']);
            Route::get('/berita/edit/{id}', [BeritaController::class, 'edit']);
            Route::post('/berita/update/{id}', [BeritaController::class, 'update']);

            //Kategori Bertia
            Route::post('/berita/create/kategori', [BeritaController::class, 'storekategori']);
            Route::get('/berita/destroy/kategori/{id}', [BeritaController::class, 'destroykategori']);
            Route::get('/berita/edit/kategori/{id}', [BeritaController::class, 'editkategori']);
            Route::post('/berita/update/kategori/{id}', [BeritaController::class, 'updatekategori']);

            //Siswa MTS
            Route::get('/siswa', [PesertaDidikController::class, 'index']);
            Route::post('/siswa/create/', [PesertaDidikController::class, 'store']);
            Route::get('/siswa/destroy/{id}', [PesertaDidikController::class, 'destroy']);
            Route::get('/siswa/edit/{id}', [PesertaDidikController::class, 'edit']);
            Route::post('/siswa/update/{id}', [PesertaDidikController::class, 'update']);

            //Siswa SMA
            Route::post('/siswa/create/sma', [PesertaDidikController::class, 'storesma']);
            Route::get('/siswa/destroy/sma/{id}', [PesertaDidikController::class, 'destroysma']);
            Route::get('/siswa/edit/sma/{id}', [PesertaDidikController::class, 'editsma']);
            Route::post('/siswa/update/sma/{id}', [PesertaDidikController::class, 'updatesma']);

            //Siswa Pondok Pesantren
            Route::post('/siswa/create/pesantren', [PesertaDidikController::class, 'storepesantren']);
            Route::get('/siswa/destroy/pesantren/{id}', [PesertaDidikController::class, 'destroypesantren']);
            Route::get('/siswa/edit/pesantren/{id}', [PesertaDidikController::class, 'editpesantren']);
            Route::post('/siswa/update/pesantren/{id}', [PesertaDidikController::class, 'updatepesantren']);

            //Alumi
            Route::get('/alumi', [AdminAlumiController::class, 'index']);
            Route::post('/alumi/create/', [AdminAlumiController::class, 'store']);
            Route::get('/alumi/destroy/{id}', [AdminAlumiController::class, 'destroy']);
            Route::get('/alumi/edit/{id}', [AdminAlumiController::class, 'edit']);
            Route::post('/alumi/update/{id}', [AdminAlumiController::class, 'update']);

            //Pengaturan Ubah Password
            Route::get('/updatepassword', [PengaturanController::class, 'index']);
            Route::put('/updatepassword', [PengaturanController::class, 'updatepassword'])->name('updatepassword');

            //Pengaturan Profile
            Route::get('/profile', [PengaturanController::class, 'show']);
            Route::post('/profile/update/{id}', [PengaturanController::class, 'update']);

            //Tentang Isteq
            Route::prefix('tentang')->group(function () {
                //selayangpandang
                Route::get('/selayangpandang', [AdminSelayangPandangController::class, 'index']);

                //selayangpandang Sambutan
                Route::post('/selayangpandang/create/sambutan', [AdminSelayangPandangController::class, 'storesambutan']);
                Route::get('/selayangpandang/destroy/sambutan/{id}', [AdminSelayangPandangController::class, 'destroysambutan']);
                Route::get('/selayangpandang/edit/sambutan/{id}', [AdminSelayangPandangController::class, 'editsambutan']);
                Route::post('/selayangpandang/update/sambutan/{id}', [AdminSelayangPandangController::class, 'updatesambutan']);

                //selayangpandang Sejarah
                Route::post('/selayangpandang/create/sejarah', [AdminSelayangPandangController::class, 'storesejarah']);
                Route::get('/selayangpandang/destroy/sejarah/{id}', [AdminSelayangPandangController::class, 'destroysejarah']);
                Route::get('/selayangpandang/edit/sejarah/{id}', [AdminSelayangPandangController::class, 'editsejarah']);
                Route::post('/selayangpandang/update/sejarah/{id}', [AdminSelayangPandangController::class, 'updatesejarah']);

                //selayangpandang Visi & Misi
                Route::post('/selayangpandang/create/visimisi', [AdminSelayangPandangController::class, 'storevisimisi']);
                Route::get('/selayangpandang/destroy/visimisi/{id}', [AdminSelayangPandangController::class, 'destroyvisimisi']);
                Route::get('/selayangpandang/edit/visimisi/{id}', [AdminSelayangPandangController::class, 'editvisimisi']);
                Route::post('/selayangpandang/update/visimisi/{id}', [AdminSelayangPandangController::class, 'updatevisimisi']);

                //selayangpandang Biografi Pimpinan
                Route::post('/selayangpandang/create/biografi', [AdminSelayangPandangController::class, 'storebiografi']);
                Route::get('/selayangpandang/destroy/biografi/{id}', [AdminSelayangPandangController::class, 'destroybiografi']);
                Route::get('/selayangpandang/edit/biografi/{id}', [AdminSelayangPandangController::class, 'editbiografi']);
                Route::post('/selayangpandang/update/biografi/{id}', [AdminSelayangPandangController::class, 'updatebiografi']);

                //selayangpandang Lokasi
                Route::get('/lokasi', [LokasiController::class, 'indexlokasi']);

                //Organisasi
                Route::get('/organisasi', [AdminOrganisasiController::class, 'index']);

                //Organisasi Struktur Pimpinan
                Route::post('/organisasi/create/struktur', [AdminOrganisasiController::class, 'storestruktur']);
                Route::get('/organisasi/destroy/struktur/{id}', [AdminOrganisasiController::class, 'destroystruktur']);
                Route::get('/organisasi/edit/struktur/{id}', [AdminOrganisasiController::class, 'editstruktur']);
                Route::post('/organisasi/update/struktur/{id}', [AdminOrganisasiController::class, 'updatestruktur']);

                //Divisi
                Route::get('/divisi', [AdminDivisiController::class, 'index']);
                Route::post('/divisi/create/', [AdminDivisiController::class, 'storedivisi']);
                Route::get('/divisi/destroy/{id}', [AdminDivisiController::class, 'destroydivisi']);
                Route::get('/divisi/edit/{id}', [AdminDivisiController::class, 'editdivisi']);
                Route::post('/divisi/update/{id}', [AdminDivisiController::class, 'updatedivisi']);

                //Team
                Route::post('/divisi/create/team', [AdminDivisiController::class, 'storeteam']);
                Route::get('/divisi/destroy/team/{id}', [AdminDivisiController::class, 'destroyteam']);
                Route::get('/divisi/edit/team/{id}', [AdminDivisiController::class, 'editteam']);
                Route::post('/divisi/update/team/{id}', [AdminDivisiController::class, 'updateteam']);

            });

            //Akses Cepat
            Route::prefix('aksescepat')->group(function () {
                //Aplikasi
                Route::get('/aplikasi', [AdminSelayangPandangController::class, 'indexaplikasi']);

                //Ekstrakurikuler SMA Islam Al-Istiqomah
                Route::get('/ekskul', [AdminEkstrakurikulerController::class, 'indexekskul']);
                Route::post('/ekskul/create/', [AdminEkstrakurikulerController::class, 'storeekskul']);
                Route::get('/ekskul/destroy/{id}', [AdminEkstrakurikulerController::class, 'destroyekskul']);
                Route::get('/ekskul/edit/{id}', [AdminEkstrakurikulerController::class, 'editekskul']);
                Route::post('/ekskul/update/{id}', [AdminEkstrakurikulerController::class, 'updateekskul']);

                //Ekstrakurikuler Ekstrakurikuler MTs SA Al-Istiqomah
                Route::post('/ekskul/create/mts', [AdminEkstrakurikulerController::class, 'storeekskulmts']);
                Route::get('/ekskul/destroy/mts/{id}', [AdminEkstrakurikulerController::class, 'destroyekskulmts']);
                Route::get('/ekskul/edit/mts/{id}', [AdminEkstrakurikulerController::class, 'editekskulmts']);
                Route::post('/ekskul/update/mts/{id}', [AdminEkstrakurikulerController::class, 'updateekskulmts']);

                //Ekstrakurikuler Ekstrakurikuler Pondok Pesantren Al-Istiqomah
                Route::post('/ekskul/create/pondok', [AdminEkstrakurikulerController::class, 'storeekskulpondok']);
                Route::get('/ekskul/destroy/pondok/{id}', [AdminEkstrakurikulerController::class, 'destroyekskulpondok']);
                Route::get('/ekskul/edit/pondok/{id}', [AdminEkstrakurikulerController::class, 'editekskulpondok']);
                Route::post('/ekskul/update/pondok/{id}', [AdminEkstrakurikulerController::class, 'updateekskulpondok']);

                //Berita
                Route::get('/berita', [AdminBeritaController::class, 'index']);
                Route::post('/berita/create/', [AdminBeritaController::class, 'store']);
                Route::get('/berita/destroy/{id}', [AdminBeritaController::class, 'destroy']);
                Route::get('/berita/edit/{id}', [AdminBeritaController::class, 'edit']);
                Route::post('/berita/update/{id}', [AdminBeritaController::class, 'update']);

                //Bertia Kategori
                Route::post('/berita/create/kategori', [AdminBeritaController::class, 'storekategori']);
                Route::get('/berita/destroy/kategori/{id}', [AdminBeritaController::class, 'destroykategori']);
                Route::get('/berita/edit/kategori/{id}', [AdminBeritaController::class, 'editkategori']);
                Route::post('/berita/update/kategori/{id}', [AdminBeritaController::class, 'updatekategori']);
            });

            //Pendaftaran
            Route::prefix('pendaftaran')->group(function () {
                //Santri
                Route::get('/santri', [AdminSantriController::class, 'index']);
                Route::post('/santri/create/', [AdminSantriController::class, 'store']);
                Route::get('/santri/destroy/{id}', [AdminSantriController::class, 'destroy']);
                Route::get('/santri/edit/{id}', [AdminSantriController::class, 'edit']);
                Route::post('/santri/update/{id}', [AdminSantriController::class, 'update']);

                //Biaya Pendaftaran Santri
                Route::post('/santri/create/biaya', [AdminSantriController::class, 'storebiaya']);
                Route::get('/santri/destroy/biaya/{id}', [AdminSantriController::class, 'destroybiaya']);
                Route::get('/santri/edit/biaya/{id}', [AdminSantriController::class, 'editbiaya']);
                Route::post('santri/update/biaya/{id}', [AdminSantriController::class, 'updatebiaya']);

                //Mts
                Route::get('/mts', [AdminMtsController::class, 'index']);
                Route::post('/mts/create/', [AdminMtsController::class, 'store']);
                Route::get('/mts/destroy/{id}', [AdminMtsController::class, 'destroy']);
                Route::get('/mts/edit/{id}', [AdminMtsController::class, 'edit']);
                Route::post('/mts/update/{id}', [AdminMtsController::class, 'update']);

                //Biaya Pendaftaran Mts
                Route::post('/mts/create/biaya', [AdminMtsController::class, 'storebiaya']);
                Route::get('/mts/destroy/biaya/{id}', [AdminMtsController::class, 'destroybiaya']);
                Route::get('/mts/edit/biaya/{id}', [AdminMtsController::class, 'editbiaya']);
                Route::post('/mts/update/biaya/{id}', [AdminMtsController::class, 'updatebiaya']);

                //Sma
                Route::get('/sma', [AdminSmaController::class, 'index']);
                Route::post('/sma/create/', [AdminSmaController::class, 'store']);
                Route::get('/sma/destroy/{id}', [AdminSmaController::class, 'destroy']);
                Route::get('/sma/edit/{id}', [AdminSmaController::class, 'edit']);
                Route::post('/sma/update/{id}', [AdminSmaController::class, 'update']);

                //Biaya Pendaftaran Sma
                Route::post('/sma/create/biaya', [AdminSmaController::class, 'storebiaya']);
                Route::get('/sma/destroy/biaya/{id}', [AdminSmaController::class, 'destroybiaya']);
                Route::get('/sma/edit/biaya/{id}', [AdminSmaController::class, 'editbiaya']);
                Route::post('/sma/update/biaya/{id}', [AdminSmaController::class, 'updatebiaya']);
            });

            //SMA
            Route::prefix('sma')->group(function () {
                //Profile SMA
                Route::get('/', [SmaAdminController::class, 'index']);
                Route::post('/profile/create/', [SmaAdminController::class, 'store']);
                Route::get('/profile/destroy/{id}', [SmaAdminController::class, 'destroy']);
                Route::get('/profile/edit/{id}', [SmaAdminController::class, 'edit']);
                Route::post('/profile/update/{id}', [SmaAdminController::class, 'update']);

                //Sambutan
                Route::post('/sambutan/create/', [SmaAdminController::class, 'storesambutan']);
                Route::get('/sambutan/destroy/{id}', [SmaAdminController::class, 'destroysambutan']);
                Route::get('/sambutan/edit/{id}', [SmaAdminController::class, 'editsambutan']);
                Route::post('/sambutan/update/{id}', [SmaAdminController::class, 'updatesambutan']);

                //Visi Misi
                Route::post('/visimisi/create/', [SmaAdminController::class, 'storevisimisi']);
                Route::get('/visimisi/destroy/{id}', [SmaAdminController::class, 'destroyvisimisi']);
                Route::get('/visimisi/edit/{id}', [SmaAdminController::class, 'editvisimisi']);
                Route::post('/visimisi/update/{id}', [SmaAdminController::class, 'updatevisimisi']);

                //Organigram
                Route::post('/organigram/create', [SmaAdminController::class, 'storestruktur']);
                Route::get('/organigram/destroy/{id}', [SmaAdminController::class, 'destroystruktur']);
                Route::get('/organigram/edit/{id}', [SmaAdminController::class, 'editstruktur']);
                Route::post('/organigram/update/{id}', [SmaAdminController::class, 'updatestruktur']);
            });

            Route::prefix('mts')->group(function () {
                //Profile SMA
                Route::get('/', [MtsAdminController::class, 'index']);
                Route::post('/profile/create/', [MtsAdminController::class, 'store']);
                Route::get('/profile/destroy/{id}', [MtsAdminController::class, 'destroy']);
                Route::get('/profile/edit/{id}', [MtsAdminController::class, 'edit']);
                Route::post('/profile/update/{id}', [MtsAdminController::class, 'update']);

                //Sambutan
                Route::post('/sambutan/create/', [MtsAdminController::class, 'storesambutan']);
                Route::get('/sambutan/destroy/{id}', [MtsAdminController::class, 'destroysambutan']);
                Route::get('/sambutan/edit/{id}', [MtsAdminController::class, 'editsambutan']);
                Route::post('/sambutan/update/{id}', [MtsAdminController::class, 'updatesambutan']);

                //Visi Misi
                Route::post('/visimisi/create/', [MtsAdminController::class, 'storevisimisi']);
                Route::get('/visimisi/destroy/{id}', [MtsAdminController::class, 'destroyvisimisi']);
                Route::get('/visimisi/edit/{id}', [MtsAdminController::class, 'editvisimisi']);
                Route::post('/visimisi/update/{id}', [MtsAdminController::class, 'updatevisimisi']);

                //Organigram
                Route::post('/organigram/create', [MtsAdminController::class, 'storestruktur']);
                Route::get('/organigram/destroy/{id}', [MtsAdminController::class, 'destroystruktur']);
                Route::get('/organigram/edit/{id}', [MtsAdminController::class, 'editstruktur']);
                Route::post('/organigram/update/{id}', [MtsAdminController::class, 'updatestruktur']);
            });

            Route::prefix('ra')->group(function () {
                //Profile SMA
                Route::get('/', [RaAdminController::class, 'index']);
                Route::post('/profile/create/', [RaAdminController::class, 'store']);
                Route::get('/profile/destroy/{id}', [RaAdminController::class, 'destroy']);
                Route::get('/profile/edit/{id}', [RaAdminController::class, 'edit']);
                Route::post('/profile/update/{id}', [RaAdminController::class, 'update']);

                //Sambutan
                Route::post('/sambutan/create/', [RaAdminController::class, 'storesambutan']);
                Route::get('/sambutan/destroy/{id}', [RaAdminController::class, 'destroysambutan']);
                Route::get('/sambutan/edit/{id}', [RaAdminController::class, 'editsambutan']);
                Route::post('/sambutan/update/{id}', [RaAdminController::class, 'updatesambutan']);

                //Visi Misi
                Route::post('/visimisi/create/', [RaAdminController::class, 'storevisimisi']);
                Route::get('/visimisi/destroy/{id}', [RaAdminController::class, 'destroyvisimisi']);
                Route::get('/visimisi/edit/{id}', [RaAdminController::class, 'editvisimisi']);
                Route::post('/visimisi/update/{id}', [RaAdminController::class, 'updatevisimisi']);

                //Organigram
                Route::post('/organigram/create', [RaAdminController::class, 'storestruktur']);
                Route::get('/organigram/destroy/{id}', [RaAdminController::class, 'destroystruktur']);
                Route::get('/organigram/edit/{id}', [RaAdminController::class, 'editstruktur']);
                Route::post('/organigram/update/{id}', [RaAdminController::class, 'updatestruktur']);
            });

            //Contact

            Route::prefix('contact')->group(function () {
                //Profile SMA
                Route::get('/', [AdminContactController::class, 'index']);
                Route::post('/narahubung/create/', [AdminContactController::class, 'store']);
                Route::get('/narahubung/destroy/{id}', [AdminContactController::class, 'destroy']);
                Route::get('/narahubung/edit/{id}', [AdminContactController::class, 'edit']);
                Route::post('/narahubung/update/{id}', [AdminContactController::class, 'update']);

                //FAQ
                Route::post('/faq/create/', [AdminContactController::class, 'storefaq']);
                Route::get('/faq/destroy/{id}', [AdminContactController::class, 'destroyfaq']);
                Route::get('/faq/edit/{id}', [AdminContactController::class, 'editfaq']);
                Route::post('/faq/update/{id}', [AdminContactController::class, 'updatefaq']);
            });
        });
});
