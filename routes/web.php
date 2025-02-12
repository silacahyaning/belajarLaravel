<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

// get= di gunakan mengakses suatu data, post= mengirim data ke server,pets=mengubah data
//
Route::get('/', function () {
    return view('welcome');
});

// route mengambil URL home dengan parameter (nama) lalu meminta requestan menggunakan variabel ($nama) untuk me request nama lalu kembali ke tampilan yg bernama home untuk mengambil  variabel nama
Route::get('home/{nama?}',function (Request $request) {
    $nama =$request->nama;
    return view('home',compact('nama'));
})->name('home');

// route mengambil URL siswa dan siswacontroller mempunyai fungsi index yang di namai dengan dengan siswa
Route::get('siswa',[SiswaController::class,'index'])->name('siswa');

Route::get('add-siswa',[SiswaController::class,'add'])->name('siswa.add');

// route post berfungsi untk menambah data, jika ada user yang mengakses URL add-siswa maka akan di arahkan ke SiswaController ,lalu menjalankan fungsi store
Route::post('add-siswa',[SiswaController::class,'store'])->name('siswa.add.process');

Route::delete('siswa/{id}',[SiswaController::class, 'destroy'])->name('siswa.delete');
Route::get('siswa/edit/{id}',[SiswaController::class, 'edit'])->name('siswa.edit');

// parameter {id} di dapat dri view
Route::put('siswa/update/{id}',[SiswaController::class, 'update'])->name('siswa.update');



Route::get('about',function(){
    return view('about');
})->name('about');


