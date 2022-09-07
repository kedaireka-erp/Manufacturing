@extends('layouts.admin')

@section('content')
<div class="content-wrapper bg-img">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">              
                <div class="card-body">
                    <h2 class="card-title float-start">Master Lead</h2>
                    <h5 class="float-end"><a href="#" class="text-secondary">Master</a> / <a href="#" class="text-primary">Lead</a></h5>
                </div>
            </div>
        </div>
    </div>
    <br>
   
    <br>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            
            <div class="row">
              <div class="col-lg-12 justify-content-between">
                  <a href="#" class="btn btn-gradient-info float-end"><i class="mdi mdi-plus"></i>Tambah Subkon </a>
                  <form class="col-lg-4 my-md-0" >
                    <div class="input-group" >
                        <input type="text" class="form-control bg-light border rounded" placeholder="Cari Pegawai Berdasarkan Nomor atau Nama.."
                            aria-label="Search" aria-describedby="basic-addon2">
                    </div>
                </form>
              </div>
          </div>

            <!-- Tabel -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th width="250px"> No. Pegawai </th>
                  <th width="250px"> Nama Lead </th>
                  <th width="250px"> Status </th>
                  <th  width="250px"> Action </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td> 843957 </td>
                  <td> Manufacturing </td>
                  <td> Active </td>
                  <td> 
                    <a href="" class="btn btn-success">Ubah</a>
                    <a href="" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection