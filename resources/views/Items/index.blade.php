@extends('layouts.admin')
@section('content')
<div class="content-wrapper bg-img">
            <div class="shadow p-3 mb-5 bg-body rounded">FPPP
            <h5 class="float-end"><a href="#" class="text-secondary">Master</a> / <a href="#" class="text-primary">Lead Subkon</a></h5>
            </div>
</div>
        <br>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <table class="table ">
                            <tr class="text-center">
                                <th>No. FPPP</th>
                                <th>Nama Proyek</th>
                                <th>Aplikator</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($items as $no => $item)
                                <tr class="text-center">
                                    <td>{{$item -> FPPP_Number}}</td>
                                    <td>{{$item -> Project_Name}}</td>
                                    <td>{{$item -> Applicator_Name}}</td>
                                    <td>
                                        <a href="{{route("create")}}" class="btn btn-purple" style="background-color: #51e29f">Import</a>
                                        <a href="{{route("store")}}" class="btn btn-info">Lihat</a>
                                        <a href="{{route("show")}}" class="btn btn-primary">Detail</a>
                                        {{-- <a href="{{route("edit", $item->id)}}" class="btn btn-warning">Ubah</a>
                        
                                        <form action="{{route("destroy", $item->id)}}" method="post">
                                          @csrf
                                          @method("DELETE")
                                          
                                          <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td> --}}
                                    {{-- </td> --}}
                                </tr>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection