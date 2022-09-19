@extends('layouts.admin')

@section('content')
<div class="content-wrapper bg-img">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title float-start">Tambah Subkon</h2>
                    <h5 class="float-end"><a href="#" class="text-secondary">Dashboard</a> / <a href="#"
                            class="text-secondary">Master Subkon</a> / <a href="#" class="text-primary">Tambah
                            Subkon</a></h5>
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
                    <div class="row">
                        <div class="col-lg-12 stretch-card grid-margin">
                            <div class="card bg-gradient-info card-img-holder text-white">
                                <div class="card-body">
                                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute"
                                        alt="circle-image" />
                                    <h3 class="mb-2">Perhatian!</h3>
                                    <h5>Mohon masukkan data ke dalam form dengan teliti dan benar.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="/subkon/store" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nomor Pegawai</label>
                            <input type="text" name="employee_number" class="form-control" placeholder="Nomor Pegawai">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="subkon_name" class="form-control" placeholder="Nama">
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
