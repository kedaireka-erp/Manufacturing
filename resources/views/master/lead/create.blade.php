@extends('layouts.admin')

@section('content')
<div class="content-wrapper bg-img">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title float-start">Tambah Lead</h2>
                    <h5 class="float-end"><a href="#" class="text-secondary">Dashboard</a> / <a href="#" class="text-secondary">Master</a> / <a href="#" class="text-secondary">Master Lead</a> / <a href="#" class="text-primary">Tambah Lead</a></h5>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        
    </div>
    <br>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            
            <div class="mb-3">
                <label class="form-label">Nomor Pegawai</label>
                <input type="text" class="form-control" placeholder="Nomor Pegawai">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" placeholder="Nama">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select">
                    <option>Inactive</option>
                    <option>Active</option>
                  </select>
            </div>
            <button class="btn btn-gradient-primary float-end" type="submit">Tambah</button>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
