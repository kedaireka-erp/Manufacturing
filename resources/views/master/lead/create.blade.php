@extends('layouts.admin')

@section('content')
<div class="content-wrapper bg-img">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-table-header">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h2 class="card-title mb-0">Tambah Lead</h2>
                    <h5 class="card-bredcrumb mb-0"><a href="#" class="text-secondary">Master / </a><a href="/leads" class="text-secondary">Lead / </a><a
                            href="#" class="text-primary">Tambah Lead</a></h5>
                </div>
            </div>
        </div>
    </div>
    <br>
    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title float-start">Tambah Lead</h2>
                    <h5 class="float-end"><a href="#" class="text-secondary">Dashboard</a> / <a href="#" class="text-secondary">Master</a> / <a href="#" class="text-secondary">Master Lead</a> / <a href="#" class="text-primary">Tambah Lead</a></h5>
                </div>
            </div>
        </div>
    </div>
    <br> --}}
    {{-- <div class="row">

    </div>
    <br> --}}
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

            <div class="row">
              <div class="col-lg-12 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h3 class="mb-2">Perhatian!</h3>
                    <h5>Mohon masukkan data ke dalam form dengan teliti dan benar.</h5>
                  </div>
                </div>
              </div>
            </div>

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
            <button class="btn btn-gradient-info float-end" type="submit">Tambah</button>

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
              <label class="form-label">Email</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name = "email" placeholder="Username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2">@Alluresystem.site</span>
              </div>
              <div class="mb-3">
              <label class="form-label">Jenis kelamin</label>
              <select class="form-select" name="gender">
                  <option value="Laki-laki" selected>Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="mb-3">
                  <label class="form-label">Status</label>
                  <select class="form-select" name="is_active">
                      <option value="0">Inactive</option>
                      <option value="1" selected>Active</option>
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
