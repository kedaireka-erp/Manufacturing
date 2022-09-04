@extends('layout/template')
@section('content')
    <div class="container">
        <h1 class="text-center mt-2 mb-3">Daftar Jurusan Negeri</h1>
        <table class="table table-striped table-hover text-center border">
            <thead>
                <tr>
                  <th scope="col">ID Jurusan</th>
                  <th scope="col">Nama Jurusan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jurusans as $jurusan)
                    <tr>
                        <td>{{ $jurusan->id_jurusan }}</td>
                        <td>{{ $jurusan->nama_jurusan }}</td>
                        <td>
                            <a href=""><button type="button" class="btn btn-success" style="font-size: 10px">Edit</button></a>
                            <a href="{{ route('deleteJurusan', $jurusan->id_jurusan) }}"><button type="button" class="btn btn-danger" style="font-size: 10px">Hapus</button></a>
                        </td>
                    </tr>
                @endforeach
              </tbody>    
        </table>
    </div>
@endsection