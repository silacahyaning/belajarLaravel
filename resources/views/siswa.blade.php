@extends('partials.main')
 @section('content')
<h1>Data Siswa</h1>
<a href="{{Route('siswa.add')}}"class="btn btn-info">Tambah Data</a>



<table class="table table-striped">

    <tr class="table table-dark" >
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>Menu</th>
    </tr>

  {{-- foreach adalah perulangan   (['nama'] menggunakan kurung kotak karena dia array)--}}
    @foreach ($siswa as $item)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item['nama']}}</td>
        <td>{{$item['alamat']}}</td>
        <td>{{$item['jenis_kelamin']}}</td>
        <td>
        <form action="{{Route('siswa.delete',$item['id'])}}" method='post'>
            @method('DELETE')
            @csrf
           <button class="btn btn-danger" type="submit" onclick="return confirm ('apakah anda yakin akan menghapus data ini')">HAPUS</button>
           <a class="btn btn-primary" href="{{ Route('siswa.edit', $item['id']) }}">EDIT</a>
        </form>

    </td>
    </tr>
    @endforeach

</table>

@endsection
