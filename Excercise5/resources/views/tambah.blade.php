@extends('layout/template')
@section('content')
    <div class="container">
        <h1 class="text-center">Tambah Data Mahasiswa</h1>
        <form action="/tambahData" method="POST" >
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1"  class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama_mahasiswa" id="exampleFormControlInput1" >
              </div>
            <select name="jenis_kelamin" class="form-select" id="" >
                <option value="1">Laki-laki</option>
                <option value="2">Perempuan</option>
            </select>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" name="no_telepon" class="form-control" id="telepon" >
              </div>
            <select name="id_jurusan" id="" class="mb-1 form-select">
                @foreach ($jurusans as $jurusan)
                <option value="{{ $jurusan->id_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
                @endforeach
            </select>
            <select name="id_kelas" id="" class="mb-1 form-select">
                @foreach ($kelas as $kls)
                <option value="{{ $kls->id_kelas }}">{{ $kls->semester }}</option>
                @endforeach
            </select>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Tambah</button>
            </div>
          </form>
    </div>
@endsection