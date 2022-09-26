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
            <h4 class="d-flex justify-content-center">Selamat Datang!</h4>
              <h6 class="font-weight-light d-flex justify-content-center">Masuk untuk melanjutkan.</h6>
              <form class="pt-3">
                <div class="form-group">
                    <label for="">Nomor Pegawai</label>
                  <input type="number" class="form-control form-control-lg " id="exampleInputEmail1" placeholder="Nomor Pegawai">
                </div>
                <div class="form-group">
                    <label for="">Kata Sandi</label>
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Kata Sandi">
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary font-weight-medium auth-form-btn" style="width: 100%;" href="">Masuk</a>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection