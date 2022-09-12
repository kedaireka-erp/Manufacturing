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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                  <!-- Flexbox container for aligning the toasts -->
                    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="min-height: 200px;">

                      <!-- Then put toasts within -->
                      <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                          <strong class="mr-auto">Bootstrap</strong>
                          <small>11 mins ago</small>
                          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="toast-body">
                          <strong>{{ $message }}</strong>
                        </div>
                      </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('storeLead') }}" method="post">
              @csrf
              <div class="mb-3">
                  <label class="form-label">Nomor Pegawai</label>
                  <input type="text" name="employee_number" class="form-control" placeholder="Nomor Pegawai">
              </div>
              <div class="mb-3">
                  <label class="form-label">Nama</label>
                  <input type="text" name="lead_name" class="form-control" placeholder="Nama">
              </div>
              <div class="mb-3">
                  <label class="form-label">Status</label>
                  <select class="form-select" name="is_active">
                      <option value="0">Inactive</option>
                      <option value="1">Active</option>
                    </select>
              </div>
              <button class="btn btn-gradient-primary float-end" type="submit">Tambah</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
