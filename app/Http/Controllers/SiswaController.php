<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class SiswaController extends Controller
{
    public function index(){

        $siswa= Student::all();
            return view('siswa',compact('siswa'));

    }

    public function add(){
        return view('add');
    }


    // untuk menyimpan data siswa
    // data yg disimpan adl nama,alamat & jenis kelamin
    public function store(Request $request){
        $data= Student::create([
        'nama'=>$request->nama,
        'alamat'=>$request->alamat,
        'jenis_kelamin'=>$request->jenis_kelamin,
        ]);


   // mengarahkan kembali ke halaman siswa setelah menyimpan data
        return redirect()->route('siswa');
    }


        public function destroy($id)
        {
         // menemukan siswa berdasarkan id
         $data=Student::find($id);
        //  menghapus siswa berdasarkan id yg di tentukan
         $data->delete();
         return redirect()->route('siswa');

        }
    }

