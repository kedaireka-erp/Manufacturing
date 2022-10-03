@extends('layouts.admin')

@section('content')
<div class="content-wrapper bg-img">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title float-start">Edit Lead</h2>
                    <h5 class="float-end"><a href="#" class="text-secondary">Dashboard</a> / <a href="#" class="text-secondary">Master</a> / <a href="#" class="text-secondary">Master Lead</a> / <a href="#" class="text-primary">Edit Lead</a></h5>
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
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <form action="/lead/update/{{ $lead->id }}" method="post">
              @csrf
            <div class="mb-3">
                <label class="form-label">Nomor Pegawai</label>
                <input type="text" name="employee_number" class="form-control" value="{{ $lead->employee_number }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="lead_name" class="form-control" value="{{ $lead->lead_name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" name="is_active">
                    @if ($lead->is_active == 0)
                        <option value="0" selected>Inactive</option>
                        <option value="1">Active</option>
                    @else
                        <option value="0">Inactive</option>
                        <option value="1" selected>Active</option>
                    @endif
                </select>
            </div>
            <button class="btn btn-gradient-success float-end" type="submit">Edit</button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
