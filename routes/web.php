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
Route::post('/dd',function(Request $r){
    dd($r);
})->name('dd');


Route::get('/', 'HomeController@index')->name('beranda');
Route::get('profil/sejarah', 'HomeController@sejarah')->name('sejarah');
Route::get('profil/satpel/{id}/{slug}', 'HomeController@satpel')->name('satpel');
Route::get('galeri','HomeController@galeri')->name('galeri');
Route::get('kegiatan','HomeController@berita')->name('berita');
Route::get('/kegiatan/{id}/{slug}','HomeController@single')->name('single');

Route::prefix('admin/')->group(function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::prefix('dashboard/')->group(function(){
        Route::name('dashboard.')->group(function(){
            //
        });
    });
    Route::post('dashboard','DashboardController@updatetv')->name('tvinformasi.update');

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
});


Route::get('/home',function(){
    return redirect(route('beranda'));
});

Route::get('/tvinformasi','TvinformasiController@index')->name("tvinformasi");