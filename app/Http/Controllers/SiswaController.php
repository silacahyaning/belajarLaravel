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

//  required artinya di butuhkan
    $validated = $request->validate([
        'nama'=>'required',
        'alamat'=>'required',
        'jenis_kelamin'=>'required',
    ],[
        'nama.required'=>'nama harus diisi',
        'alamat.required'=>'alamat harus diisi',
        'jenis_kelamin.required'=>'Jenis kelamin harus diisi',
    ]);

    //  simpan data ke database
        $data = Student::create([
        'nama'=>$request->nama,
        'alamat'=>$request->alamat,
        'jenis_kelamin'=>$request->jenis_kelamin
        ]);


   // mengarahkan kembali ke halaman siswa setelah menyimpan data
        return redirect()->route('siswa');
    }


        public function destroy($id)
        {
         // menemukan siswa berdasarkan id
         $data = Student::find($id);
        //  menghapus siswa berdasarkan id yg di tentukan
         $data->delete();
         return redirect()->route('siswa');

        }

        public function edit($id){

            // menemukan siswa berdasarkan id
            $data = Student::findOrFail($id);
            // dd($data);

            // mengirimkan data sesuai id ke view
            return view ('edit-siswa', compact('data'));
        }

        public function update( Request $request, $id){

            // FindOrFail berfungsi untuk memastikan bahwa data dengan id yang diberikan ada di database.
            $data=Student::findOrFail($id);

            $data-> update([
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'jenis_kelamin'=>$request->jenis_kelamin
                ]);
                return redirect()->route('siswa');
        }
    }

