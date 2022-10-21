@extends('layouts.login')

@section('content')

<div class="content-wrapper d-flex justify-content-center align-items-center auth" style="background-image: url('{{ asset('assets/images/bg1.png') }}')">
<div class="card shadow" style="width:920px; height:600px">
    <div class="row g-0">
      <div class="col-md-6">
        <img src="{{ asset("assets/images/umnpic.jpg") }}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-6">
        <div class="card-body">
            <div class="brand-logo d-flex justify-content-center">
                <img src="{{ asset("assets/images/logo-astral.svg") }}">
            </div>
            <h4 class="d-flex justify-content-center">Selamat Datang, {{ Auth::user()->name ?? "Belum Login" }}</h4>
              <h6 class="font-weight-light d-flex justify-content-center">Anda akan mengakses Sistem Manufaktur</h6>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary font-weight-medium auth-form-btn" style="width: 100%; margin-top: 110px;" href="/dashboard">Klik untuk melanjutkan</a>
                </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection