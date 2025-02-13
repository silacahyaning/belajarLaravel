@extends('partials.main')
@section('content')
    <h1>Tambah Data</h1>

    <form action="{{Route('siswa.add.process')}}" method="post">
    @csrf

    <div class="row col-7">
    <div class="row 5">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="masukkan nama" name="nama" value="{{ old ('nama')}}">

            @error('nama')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror

        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="masukkan alamat" name="alamat"rows="3" value="{{ old ('nama')}}"></textarea>

            @error('alamat')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror

        </div>
        <div class="mb-3">
            <div class="form-check">
                <input value="Laki-laki" class="form-check-input" type="radio" name="jenis_kelamin"  id="flexRadioDefault1">
                <label class="form-check-label" for="jenis_kelamin">
                  laki-laki
                </label>

              </div>
              <div class="form-check">
                <input value="Perempuan" class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" >
                <label class="form-check-label" for="jenis_kelamin">
                  perempuan
                </label>
            </div>

            @error('jenis_kelamin')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror

        </div>
        <div class="mb-3"> <button type="submit" class="btn btn-success">simpan</button></div>
    </div>

    </div>
</form>
@endsection
