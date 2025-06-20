<?php

use Illuminate\Support\Facades\Route;
//import controller
use App\Http\Controllers\MyController;

Route::get('/', function () {
    return view('welcome');
});
// rote basic
Route::get('about', function () {
    return 'ini halaman about';
});

Route::get('profile', function (){
    return view('profile');
});

//route parameter
Route::get('produk/{namaproduk}', function ($a){
    return 'saya membeli' .$a;
});

Route::get('kategori/{namakategori}', function ($kategori){
    return view('kategori', compact('kategori'));
});

//route optional parameter
Route::get('search/{keyword?}', function ($key = null){
    return view('search', compact('key'));
});

Route::get('toko/{barang?}/{kode?}', function ($barang = null, $kode=null){
    return view ('toko', compact('barang','kode'));
   }
);

//Route Buku
Route::get('buku', [MyController::class, 'index']);
//tambah buku
Route::get('buku/create', [MyController::class, 'create']);
Route::post('buku', [MyController::class, 'store']);

Route::get('buku/{id}', [MyController::class, 'show']);
// edit & update
Route::get('buku/{id}/edit', [MyController::class, 'edit']);
Route::put('buku/{id}', [MyController::class, 'update']);
Route::delete('buku/{id}', [MyController::class, 'destroy']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
