@extends('layout/template')
@section('content')
    <div class="container">
        <h1 class="text-center">Tambah Jurusan</h1>
        <form action="/tambahDataJurusan" method="POST" >
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1"  class="form-label">Nama Jurusan</label>
                <input type="text" class="form-control" name="nama_jurusan" id="exampleFormControlInput1" >
              </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Tambah</button>
            </div>
          </form>
    </div>
@endsection