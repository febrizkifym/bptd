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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);
Route::get('/tesbcrypt/{pass}',function($pass){
    dd(bcrypt($pass));
});


Route::get('/', 'HomeController@index')->name('beranda');
Route::get('profil/sejarah', 'HomeController@sejarah')->name('sejarah');
Route::get('profil/satpel/{id}/{slug}', 'HomeController@satpel')->name('satpel');
Route::get('galeri','HomeController@galeri')->name('galeri');
Route::get('galeri/video','HomeController@video')->name('galeri-video');
Route::get('kegiatan','HomeController@berita')->name('berita');
Route::get('/kegiatan/{id}/{slug}','HomeController@single')->name('single');

Route::get('/tv','TvinformasiController@index')->name("tvinformasi");
Route::get("/link-keselamatan","HomeController@link_keselamatan")->name("link_keselamatan");

Route::prefix('wisata/')->group(function(){
    Route::name('wisata.')->group(function(){
        Route::get('/torosiaje','HomeController@torosiaje')->name('torosiaje');
        Route::get('/pantairatu','HomeController@pantairatu')->name('pantairatu');
    });
});

Route::get("/dalalo","DalaloController@index")->name('dalalo');


// Route::group(['domain'=>'probadut.bptdxxigorontalo.com'],function(){
Route::prefix('bulotu/')->group(function(){;
    Route::name('probadut.')->group(function(){
        Route::get('/','ProbadutController@index')->name('index');
        Route::get('/sukses','ProbadutController@sukses')->name('sukses');
        Route::post('/','ProbadutController@post')->name('post');
        //ajax
        Route::post('/get_tiket','ProbadutController@get_tiket')->name('get_tiket');
        Route::post('/get_tarif','ProbadutController@get_tarif')->name('get_tarif');
        Route::post('/get_tarif_kenderaan','ProbadutController@get_tarif_kenderaan')->name('get_tarif_kenderaan');
    });
});

Route::prefix('admin/')->group(function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::prefix('dashboard/')->group(function(){
        Route::name('dashboard.')->group(function(){
            //
        });
    });
    Route::post('dashboard','DashboardController@updatetv')->name('tvinformasi.update');
    Route::post('dashboard/update','DashboardController@updateberanda')->name('beranda.update');

    Route::prefix('tvinformasi/')->group(function(){
        Route::name("tvinformasi.")->group(function(){
            Route::get('/kegiatan','TvinformasiController@kegiatan_index')->name('kegiatan');
            Route::post('/kegiatan','TvinformasiController@kegiatan_post')->name('kegiatan_post');
            Route::get('/kegiatan/{id}/delete','TvinformasiController@kegiatan_delete')->name('kegiatan_delete');
            Route::get('/kegiatan/{id}/edit','TvinformasiController@kegiatan_edit')->name('kegiatan_edit');
            Route::post('/kegiatan/{id}/edit','TvinformasiController@kegiatan_update')->name('kegiatan_update');
            //
            Route::get('/pagu','TvinformasiController@pagu_index')->name('pagu');
            Route::post('/pagu','TvinformasiController@pagu_post')->name('pagu_post');
            Route::get('/pagu/{id}/delete','TvinformasiController@pagu_delete')->name('pagu_delete');
        });
    });
    Route::prefix('satpel/')->group(function(){
        Route::name('satpel.')->group(function(){
            Route::get('/','SatpelController@index')->name('index');
            Route::get('/add','SatpelController@add')->name('add');
            Route::post('/add','SatpelController@post')->name('post');
            Route::get('/detail/{id}','SatpelController@detail')->name('detail');
            Route::post('/detail/{id}','SatpelController@update')->name('update');
        });
    });
    Route::prefix('sdm/')->group(function(){
        Route::name('sdm.')->group(function(){
            Route::get('/','SdmController@index')->name('index');
            Route::get('/add','SdmController@add')->name('add');
            Route::post('/add','SdmController@post')->name('post');
            Route::get('/edit/{id}','SdmController@edit')->name('edit');
            Route::post('/edit/{id}','SdmController@update')->name('update');
            Route::get('/delete/{id}','SdmController@delete')->name('delete');
        });
    });
    Route::prefix('user/')->group(function(){
        Route::name('user.')->group(function(){
           Route::get('/','UserController@index')->name('index'); 
           Route::get('/add','UserController@add')->name('add'); 
           Route::get('/edit/{id}','UserController@edit')->name('edit'); 
           Route::get('/delete/{id}','UserController@delete')->name('delete'); 
           Route::post('/add','UserController@post')->name('post'); 
           Route::post('/edit/{id}','UserController@update')->name('update');
        });
    });
    Route::prefix('kegiatan/')->group(function(){
        Route::name('berita.')->group(function(){
            Route::get('/','BeritaController@index')->name('index');
            Route::get('/add','BeritaController@add')->name('add');
            Route::get('/edit/{id}','BeritaController@edit')->name('edit');
            Route::get('/delete/{id}','BeritaController@delete')->name('delete');
            Route::post('/add','BeritaController@post')->name('post');
            Route::post('/edit/{id}','BeritaController@update')->name('update');
        });
    });
    Route::prefix('galeri/')->group(function(){
        Route::name('galeri.')->group(function(){
            Route::get('/','GaleriController@index')->name('index');
            Route::get('/{id}','GaleriController@detail')->name('detail');
            Route::post('/add','GaleriController@post')->name('post');
            Route::get('/foto/{id}/delete','GaleriController@delete')->name('delete');
        });
    });
    Route::prefix('video/')->group(function(){
        Route::name('video.')->group(function(){
            Route::get('/','VideoController@index')->name('index');
            Route::get('/delete/{id}','VideoController@delete')->name('delete');
            Route::get('/edit/{id}','VideoController@edit')->name('edit');
            Route::post('/edit/{id}','VideoController@update')->name('update');
            Route::post('/','VideoController@post')->name('post');
        });
    });
    Route::prefix("penumpang/")->group(function(){
        Route::name('penumpang.')->group(function(){
            Route::get('/','ProbadutController@penumpang')->name('index');
            Route::get('/{uid}','ProbadutController@detail')->name('detail');
            Route::get('/delete/{id}','ProbadutController@delete_penumpang')->name('delete');
            Route::get('/export','ProbadutController@export')->name('export');
            Route::post('/seat/{id}','ProbadutController@update_seat')->name("update_seat");
            Route::post('/status/{id}','ProbadutController@update_status')->name("update_status");
            //
            Route::get('/{uid}/aksi','ProbadutController@aksi')->name("aksi");
        });
    });
    Route::prefix("kapal/")->group(function(){
        Route::name("kapal.")->group(function(){
            Route::get("/tarif","KapalController@tarif")->name("edit_tarif");
            Route::post("/tarif","KapalController@update_tarif")->name("tarif_update");
            Route::get("/","KapalController@index")->name("index");
            Route::post("/","KapalController@post")->name("post");
            Route::get("/{id}/edit","KapalController@edit")->name("edit");
            Route::get("/{id}","KapalController@detail")->name("detail");
            Route::post("/{id}/edit","KapalController@update")->name("update");
            Route::get("/{id}/delete","KapalController@delete")->name("delete");
        });
    });
    // Route::group(['domain'=>'surat.bptdxxigorontalo.com'],function(){
    Route::prefix("surat/")->group(function(){
        Route::name("surat.")->group(function(){
            Route::get('/','SuratController@index')->name('index');
            Route::post('/','SuratController@post')->name('post');
            Route::get('/{id}/edit','SuratController@edit')->name('edit');
            Route::post('/{id}/edit','SuratController@update')->name('update');
            Route::get('/{id}/delete','SuratController@delete')->name('delete');
            Route::get('/export/excel','SuratController@export')->name('export');
            Route::get('/klasifikasi','SuratController@klasifikasi')->name('klasifikasi');
            Route::get('/klasifikasi/delete/{id}','SuratController@klasifikasi_delete')->name('klasifikasi_delete');
            Route::post('/klasifikasi/{id}','SuratController@klasifikasi_update')->name('klasifikasi_update');
            Route::get('/klasifikasi/{id}','SuratController@klasifikasi_edit')->name('klasifikasi_edit');
            Route::post('/klasifikasi','SuratController@klasifikasi_post')->name('klasifikasi_post');
        });
    });
    Route::prefix("/dalalo")->group(function(){
        Route::name("dalalo.")->group(function(){
            Route::get("/titik","DalaloController@titik")->name("index");
            Route::post("/titik","DalaloController@titik_post")->name("titik_post");
            Route::get("/titik/{id}/delete","DalaloController@titik_delete")->name("titik_delete");
            Route::get("/ruas","DalaloController@ruas")->name("ruas_dashboard");
            Route::post("/ruas","DalaloController@ruas_post")->name("ruas_post");
            Route::get("/ruas/{id}/delete","DalaloController@ruas_delete")->name("ruas_delete");
            Route::get("/ruas/{id}","DalaloController@ruas_detail")->name("ruas_detail");
        });
    });
});
Route::get('/home',function(){
    return redirect(route('beranda'));
});
