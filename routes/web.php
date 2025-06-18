<?php

use Illuminate\Support\Facades\Route;

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