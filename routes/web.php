<?php

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


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function (){

    Route::resource('sms', 'SmsController');
    Route::post('/sms-grup', 'SmsController@smsGrup')->name('smsgrup');
    Route::get('/home', 'SmsController@index')->name('home');
    Route::get('/pesan', 'SmsController@create')->name('buatpesan');
    Route::get('/kotak-masuk', 'SmsController@inbox')->name('inbox');
    Route::get('/kotak-masuk/kritik-dan-saran', 'SmsController@inboxkritik')->name('kritik');
    Route::get('/kotak-masuk/saran', 'SmsController@inboxsaran')->name('saran');
    Route::get('/terkirim', 'SmsController@sentitem')->name('sentitem');
    Route::get('/kotak-keluar', 'SmsController@outbox')->name('outbox');
    Route::post('/hapusoutbox', 'SmsController@dropOutbox')->name('dropoutbox');
    Route::post('/hapussentitem', 'SmsController@dropSentitem')->name('dropsent');
    Route::post('/hapus-kritik', 'SmsController@dropKritik')->name('dropkritik');
    Route::post('/hapus-inbox', 'SmsController@dropInbox')->name('dropinbox');
    Route::post('/balas', 'SmsController@store')->name('balas');

    Route::get('/daftar', 'SmsController@adduser')->name('register');
    Route::get('/data-pengguna', 'SmsController@userdata')->name('userdata');
    Route::post('/edit-pengguna', 'SmsController@editUser')->name('edituser');
    Route::post('/tambah-pengguna', 'SmsController@storeUser')->name('storeuser');

    Route::resource('penduduk', 'PendudukController');
    Route::post('/edit-penduduk', 'PendudukController@editP')->name('editP');
    Route::post('/update-penduduk', 'PendudukController@updateP')->name('updatep');
    Route::get('/skck', 'PdfController@skck')->name('skck');
    Route::post('/pengantarskck', 'PdfController@getSkck')->name('getskck');
    Route::get('/preview-skck', 'PdfController@previewSkck')->name('pskck');
    Route::post('/storeskck', 'PdfController@simpan')->name('simpanskck');
    Route::get('/domisili', 'PdfController@domisili')->name('domisili');
    Route::post('/keterangandomisili', 'PdfController@getDomisili');
    Route::post('/keterangan-domisili', 'PdfController@getDomisili2')->name('dom2');
    Route::get('/preview-domisili', 'PdfController@previewDomisili')->name('pdomisili');
    Route::get('/preview-domisili-p', 'PdfController@previewDomisili2')->name('pdomisili2');
    Route::post('/storedomisili', 'PdfController@simpanD')->name('simpandomisili');
    Route::get('/surat/pengantar', 'PdfController@dataPengantar')->name('datapengantar');
    Route::get('/surat/keterangan', 'PdfController@dataKeterangan')->name('dataketerangan');

    Route::post('/set-rdom', 'PdfController@reprintSet')->name('setreprint');
    Route::get('/reprint-dom', 'PdfController@callReprint')->name('reprint');
    Route::get('/periode-surat', 'PdfController@periodeSurat')->name('periode1');
    Route::post('/laporan-surat', 'PdfController@allSurat')->name('laporan-surat');
    Route::get('/data-surat', 'PdfController@dataSurat')->name('data-surat');
    Route::get('/periode-kritik-dan-saran', 'PdfController@kritikSaran')->name('periode2');
    Route::post('/laporan-kritik-dan-saran', 'PdfController@allKritikSaran')->name('kritik-saran');
    Route::get('/data-kritik-dan-saran', 'PdfController@dataKritikSaran')->name('data-ks');


});

