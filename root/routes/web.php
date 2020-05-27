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

Route::get('/tvinformasi','TvinformasiController@index')->name("tvinformasi");

// Route::group(['domain'=>'probadut.bptdxxigorontalo.com'],function(){
Route::prefix('probadut/')->group(function(){;
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
Route::get('/tes',function(){
    $tiket = App\Tiket::select('pbd_tiket.id','pbd_tiket.uid','pbd_tiket.nama','no_ktp','jenis_kelamin','agama','usia','pbd_kapal.nama as kapal','kelas','harga')->join('pbd_tarif','pbd_tiket.tarif','=','pbd_tarif.id')->join('pbd_kapal','pbd_tarif.id_kapal','=','pbd_kapal.id')->where('pbd_tiket.uid',123123)->first();
    dd($tiket);
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
    Route::prefix("pbd/")->group(function(){
        Route::name('pbd.')->group(function(){
            Route::get('/','ProbadutController@penumpang')->name('penumpang');
        });
    });
    Route::prefix("surat/")->group(function(){
        Route::name("surat.")->group(function(){
            Route::get('/','SuratController@index')->name('index');
            Route::post('/','SuratController@post')->name('post');
            Route::get('/delete/{id}','SuratController@delete')->name('delete');
            Route::get('/export/excel','SuratController@export')->name('export');
        });
    });
});


Route::get('/home',function(){
    return redirect(route('beranda'));
});
