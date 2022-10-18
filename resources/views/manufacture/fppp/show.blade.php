@extends('layouts.admin')

@push("style")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('style.css') }}">
@endpush

@section('content')
<div class="content-wrapper bg-img">
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-table-header">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h2 class="card-title mb-0">Lihat WO - {{ $manufacture->fppp_no }}</h2>
                    <h5 class="card-bredcrumb mb-0"><a href="#" class="text-secondary">Manufaktur / </a><a href="#" class="text-secondary">FPPP / </a><a
                            href="#" class="text-primary">Lihat FPPP</a></h5>
                </div>
            </div>
        </div>
    </div>
    <br>
    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="shadow p-4 mb-2 bg-body rounded">Lihat WO - {{ $manufacture->FPPP_number }}</h2>
                <h5 class="float-end"><a href="#" class="text-secondary">Manufaktur</a> / <a href="#"
                        class="text-secondary">FPPP</a>/<a href="#" class="lihatfppp">Lihat FPPP</a></h5>
            </div>
        </div>
    </div>
    <br> --}}
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{-- <!-- search -->
                    <form class="col-lg-4 my-md-0">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-dark-rounded"
                                placeholder="Cari Pegawai Berdasarkan Nomor atau Nama.." aria-label="Search"
                                aria-describedby="basic-addon2">
                        </div>
                    </form> --}}
                    <div class="table-borderless">
                        <table class="table-borderless">
                            <tr>
                                <td width="120px" height="50px">No FPPP</td>
                                <td>: {{ $manufacture->fppp_no }}</td>
                            </tr>
                            <tr>
                                <td width="120px" height="50px">Nama Proyek</td>
                                <td>: {{ $manufacture->quotation->DataQuotation->nama_proyek }}</td>
                            </tr>
                            <tr>
                                <td width="120px" height="50px">Aplikator</td>
                                <td>: {{ $manufacture->quotation->Aplikator->aplikator }}</td><br>
                            </tr>
                        </table>
                      </div>
                    <!-- Tabel -->
                    <div class="view">
                    <div class="wrapper">
                    <div class= "table-responsive-scroll">
                        <table class="table table-striped text-center">
                            <thead>
                                <div class="data-fixed-columns" >
                                <tr>
                                    <th width="250px" class="sticky-col first-col bg-white"> No. </th>
                                    <th width="250px" class="sticky-col second-col bg-white"> Kode Op </th>
                                    <th width="250px" class="sticky-col third-col bg-white"> Kode Unit </th>
                                    <th width="250px" class="long"> Item </th>
                                    <th width="250px" class="long"> Glass Specification </th>
                                    <th width="250px" class="long"> Warna </th>
                                    <th width="250px" class="long"> Cutting </th>
                                    <th width="250px" class="long"> Machining </th>
                                    <th width="250px" class="long"> Assembly 1 </th>
                                    <th width="250px" class="long"> Assembly 2 </th>
                                    <th width="250px" class="long"> Assembly 3 </th>
                                    <th width="250px" class="long"> QC </th>
                                    <th width="250px" class="long"> Packing </th>
                                    <th width="250px" class="long"> Status </th>
                                    <th width="250px" class="long"> Keterangan </th>
                                </tr>

                            </thead>
                            <tbody>

                                @foreach ($workOrders as $no => $unit)

                                <tr class=" ">
                                    <td class="headcol sticky-col first-col bg-white"> {{ $no+1 }} </td>
                                    <td class="headcol sticky-col second-col bg-white"> {{ $unit->kode_op }} </td>
                                    <td class="headcol sticky-col third-col bg-white"> {{ $unit->kode_unit }} </td>
                                    <td class="long"> {{ $unit->nama_item }} </td>
                                    <td class="long"> {{ $manufacture->glass }} {{ $manufacture->glass_type }}<br> <br>
                                        @if ($unit->tanggal_kaca)
                                        <button type="button" class=" btn btn-gradient-success btn-sm button col-12 pe-none">COMPLETED</button>
                                        @else
                                        <form action="{{ route("update-kaca") }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $unit->id }}">
                                        <button type="submit" class="d btn btn-success border-dark-rounded">OK!</button>
                                        </form>
                                        @endif
                                    </td>
                                    <td class="long"> {{ $manufacture->color }} </td>
                                    {{-- glass spesification button --}}
                                    <!-- cutting button -->
                                    <td class="long">
                                        @if ($unit->tanggal_cutting)
                                        <button type="button" class=" btn btn-dark btn-sm button mt-4 col-12 pe-none">{{ $unit->subkon1_cutting }} ({{ $unit->lead1_cutting }})</button>
                                        <br>
                                        <button type="button" class=" btn btn-dark btn-sm button mt-2 col-12 pe-none">{{ $unit->subkon2_cutting }} ({{ $unit->lead2_cutting }})</button>
                                        <br>
                                        <button type="button" class=" btn btn-gradient-success btn-sm button mt-2 col-12 pe-none">{{ strtoupper($unit->proses_cutting) }}</button>
                                        <br>
                                        <a href="#" class=" btn btn-gradient-info mt-2 pe-none" >{{ date("d/m/Y", strtotime($unit->tanggal_cutting)) }} <br> {{ date("H:i", strtotime($unit->tanggal_cutting)) }}</a>
                                        @elseif ($unit->status_hold)
                                        <button type="button" class=" btn
                                        @if ($unit->status_hold == "hold")
                                        btn-gradient-info
                                        @elseif ($unit->status_hold == "revisi")
                                        btn-gradient-warning
                                        @else
                                        btn-gradient-danger
                                        @endif
                                        btn-sm button mt-4 col-12 pe-none">{{ ucfirst($unit->status_hold) }}</button>
                                        @else
                                        <form action="{{ route("update-cutting") }}" method="POST">
                                            @csrf
                                                <input type="hidden" name="id" value="{{ $unit->id }}">
                                                <input type="hidden" name="lead1_cutting" value="{{ Auth::user()->name }}">
                                                <input type="hidden" name="lead2_cutting" value="Rhey">
                                                <div class="dropdown">
                                                    <select
                                                        class="form-select bg-transparent text-center search"
                                                        name="subkon1_cutting" id="" style="border-color: black;">
                                                        <option disabled selected>Subkon 1</option>
                                                        @foreach ($subkons as $subkon)
                                                            <option value="{{ $subkon->subkon_name }}">{{ $subkon->subkon_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="dropdown">
                                                    <select class="form-select bg-transparent text-center search" name="subkon2_cutting" id=""
                                                        style="border-color: black;">
                                                        <option disabled selected>Subkon 2</option>
                                                        <@foreach ($subkons as $subkon)
                                                            <option value="{{ $subkon->subkon_name }}">{{ $subkon->subkon_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="dropdown">
                                                    <select class="form-select bg-transparent text-center search" name="proses_cutting" id=""
                                                        style="border-color: black;">
                                                        <option value="progress">On Progress</option>
                                                        <option value="completed">Completed</option>
                                                    </select>
                                                </div> <br>
                                                <button type="submit" class="d btn btn-success border-dark-rounded text-center">Konfirmasi</button>
                                            </form>
                                        @endif
                                    </td>
                                    {{-- Machining --}}
                                    <td class="long">
                                        @if ($unit->tanggal_machining)
                                        <button type="button" class="btn btn-dark btn-sm button col-12 mt-4 pe-none">{{ $unit->subkon1_machining }} ({{ $unit->lead1_machining }})</button>
                                        <br>
                                        <button type="button" class="btn btn-dark btn-sm button col-12 mt-2 pe-none">{{ $unit->subkon2_machining }} ({{ $unit->lead2_machining }})</button>
                                        <br>
                                        <a href="#" class=" btn btn-gradient-info mt-2 pe-none" >{{ date("d/m/Y", strtotime($unit->tanggal_machining)) }} <br> {{ date("H:i", strtotime($unit->tanggal_machining)) }}</a>
                                        <br>
                                        <button type="button" class="btn btn-transparent btn-sm button col-12 mt-2 pe-none"></button>
                                        @elseif ($unit->status_hold)
                                        <button type="button" class=" btn
                                        @if ($unit->status_hold == "hold")
                                        btn-gradient-info
                                        @elseif ($unit->status_hold == "revisi")
                                        btn-gradient-warning
                                        @else
                                        btn-gradient-danger
                                        @endif
                                        btn-sm button mt-4 col-12 pe-none">{{ ucfirst($unit->status_hold) }}</button>
                                        @else
                                        <form action="{{ route("update-machining") }}" method="POST">
                                        @csrf
                                            <input type="hidden" name="id" value="{{ $unit->id }}">
                                            <input type="hidden" name="lead1_machining" value="{{ Auth::user()->name }}">
                                            <input type="hidden" name="lead2_machining" value="Rhey">
                                            <div class="dropdown" mt-3>
                                                <select
                                                    class="form-select  bg-transparent text-center search"
                                                    name="subkon1_machining" id="" style="border-color: black;">
                                                    <option disabled selected>Subkon 1</option>
                                                    @foreach ($subkons as $subkon)
                                                        <option value="{{ $subkon->subkon_name }}">{{ $subkon->subkon_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <div class="dropdown">
                                                <select class="form-select bg-transparent text-center search" name="subkon2_machining" id=""
                                                    style="border-color: black;">
                                                    <option disabled selected>Subkon 2</option>
                                                    <@foreach ($subkons as $subkon)
                                                        <option value="{{ $subkon->subkon_name }}">{{ $subkon->subkon_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <button type="submit" class="d btn btn-success border-dark-rounded text-center">Konfirmasi</button>
                                            <br>
                                            <button type="button" class="btn btn-transparent btn-sm button col-12 mt-1 pe-none"></button>
                                        </form>
                                        @endif
                                    </td>
                                    <!-- assembly 1 button -->
                                    {{-- assembly --}}
                                    <td class="long">
                                        @if ($unit->tanggal_assembly1)
                                        <button type="button" class="btn btn-dark btn-sm button col-12 mt-4 pe-none">{{ $unit->subkon1_assembly1 }} ({{ $unit->lead1_assembly1 }})</button>
                                        <br>
                                        <button type="button" class="btn btn-dark btn-sm button col-12 mt-2 pe-none">{{ $unit->subkon2_assembly1 }} ({{ $unit->lead2_assembly1 }})</button>
                                        <br>
                                        <button type="button" class="btn btn-gradient-primary btn-sm button col-12 mt-2 pe-none">{{ strtoupper($unit->process_assembly1) }}</button>
                                        <br>
                                        <a href="#" class=" btn btn-gradient-info mt-2 pe-none" >{{ date("d/m/Y", strtotime($unit->tanggal_assembly1)) }} <br> {{ date("H:i", strtotime($unit->tanggal_assembly1)) }}</a>
                                        @elseif ($unit->status_hold)
                                        <button type="button" class=" btn
                                        @if ($unit->status_hold == "hold")
                                        btn-gradient-info
                                        @elseif ($unit->status_hold == "revisi")
                                        btn-gradient-warning
                                        @else
                                        btn-gradient-danger
                                        @endif
                                        btn-sm button mt-4 col-12 pe-none">{{ ucfirst($unit->status_hold) }}</button>
                                        @else
                                        <form action="{{ route("update-assembly1") }}" method="POST">
                                        @csrf
                                            <input type="hidden" name="id" value="{{ $unit->id }}">
                                            <input type="hidden" name="lead1_assembly1" value="{{ Auth::user()->name }}">
                                            <input type="hidden" name="lead2_assembly1" value="Rhey">
                                            <div class="dropdown">
                                                <select
                                                    class="form-select  bg-transparent text-center search"
                                                    name="subkon1_assembly1" id="" style="border-color: black;">
                                                    <option disabled selected>Subkon 1</option>
                                                    @foreach ($subkons as $subkon)
                                                        <option value="{{ $subkon->subkon_name }}">{{ $subkon->subkon_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <div class="dropdown">
                                                <select class="form-select bg-transparent text-center search" name="subkon2_assembly1" id=""
                                                    style="border-color: black;">
                                                    <option disabled selected>Subkon 2</option>
                                                    <@foreach ($subkons as $subkon)
                                                        <option value="{{ $subkon->subkon_name }}">{{ $subkon->subkon_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <div class="dropdown">
                                                <select class="form-select bg-transparent text-center search" name="process_assembly1" id=""
                                                    style="border-color: black;">
                                                    <option value="">Kegiatan</option>
                                                    <option value="Assembly">Assembly</option>
                                                    <option value="Las">Las</option>
                                                    <option value="Cek Opening">Cek Opening</option>
                                                    <option value="Pasang Kaca">Pasang Kaca</option>
                                                    <option value="Sealant Kaca">Sealant Kaca</option>
                                                </select>
                                            </div> <br>
                                            <button type="submit" class="d btn btn-success border-dark-rounded text-center">Konfirmasi</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{-- assembly 2 --}}
                                    <td class="long">
                                        @if ($unit->tanggal_assembly2)
                                        <button type="button" class="btn btn-dark btn-sm button col-12 mt-4 pe-none">{{ $unit->subkon1_assembly2 }} ({{ $unit->lead1_assembly2 }})</button>
                                        <br>
                                        <button type="button" class="btn btn-dark btn-sm button col-12 mt-2 pe-none">{{ $unit->subkon2_assembly2 }} ({{ $unit->lead2_assembly2 }})</button>
                                        <br>
                                        <button type="button" class="btn btn-gradient-primary btn-sm button col-12 mt-2 pe-none">{{ strtoupper($unit->process_assembly2) }}</button>
                                        <br>
                                        <a href="#" class=" btn btn-gradient-info mt-2 pe-none" >{{ date("d/m/Y", strtotime($unit->tanggal_assembly2)) }} <br> {{ date("H:i", strtotime($unit->tanggal_assembly2)) }}</a>
                                        @elseif ($unit->status_hold)
                                        <button type="button" class=" btn
                                        @if ($unit->status_hold == "hold")
                                        btn-gradient-info
                                        @elseif ($unit->status_hold == "revisi")
                                        btn-gradient-warning
                                        @else
                                        btn-gradient-danger
                                        @endif
                                        btn-sm button mt-4 col-12 pe-none">{{ ucfirst($unit->status_hold) }}</button>
                                        @else
                                        <form action="{{ route("update-assembly2") }}" method="POST">
                                        @csrf
                                            <input type="hidden" name="id" value="{{ $unit->id }}">
                                            <input type="hidden" name="lead1_assembly2" value="{{ Auth::user()->name }}">
                                            <input type="hidden" name="lead2_assembly2" value="Rhey">
                                            <div class="dropdown">
                                                <select
                                                    class="form-select  bg-transparent text-center search"
                                                    name="subkon1_assembly2" id="" style="border-color: black;">
                                                    <option disabled selected>Subkon 1</option>
                                                    @foreach ($subkons as $subkon)
                                                        <option value="{{ $subkon->subkon_name }}">{{ $subkon->subkon_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <div class="dropdown">
                                                <select class="form-select bg-transparent text-center search" name="subkon2_assembly2" id=""
                                                    style="border-color: black;">
                                                    <option disabled selected>Subkon 2</option>
                                                    <@foreach ($subkons as $subkon)
                                                        <option value="{{ $subkon->subkon_name }}">{{ $subkon->subkon_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <div class="dropdown">
                                                <select class="form-select bg-transparent text-center search" name="process_assembly2" id=""
                                                    style="border-color: black;">
                                                    <option value="">Kegiatan</option>
                                                    <option value="Assembly">Assembly</option>
                                                    <option value="Las">Las</option>
                                                    <option value="Cek Opening">Cek Opening</option>
                                                    <option value="Pasang Kaca">Pasang Kaca</option>
                                                    <option value="Sealant Kaca">Sealant Kaca</option>
                                                </select>
                                            </div> <br>
                                            <button type="submit" class="d btn btn-success border-dark-rounded text-center">Konfirmasi</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{-- assembly 3 --}}
                                    <td class="long">
                                        @if ($unit->tanggal_assembly3)
                                        <button type="button" class="btn btn-dark btn-sm button col-12 mt-4 pe-none">{{ $unit->subkon1_assembly3 }} ({{ $unit->lead1_assembly3 }})</button>
                                        <br>
                                        <button type="button" class="btn btn-dark btn-sm button col-12 mt-2 pe-none">{{ $unit->subkon2_assembly3 }} ({{ $unit->lead2_assembly3 }})</button>
                                        <br>
                                        <button type="button" class="btn btn-gradient-primary btn-sm button col-12 mt-2 pe-none">{{ strtoupper($unit->process_assembly3) }}</button>
                                        <br>
                                        <a href="#" class=" btn btn-gradient-info mt-2 pe-none" >{{ date("d/m/Y", strtotime($unit->tanggal_assembly3)) }} <br> {{ date("H:i", strtotime($unit->tanggal_assembly3)) }}</a>
                                        @elseif ($unit->status_hold)
                                        <button type="button" class=" btn
                                        @if ($unit->status_hold == "hold")
                                        btn-gradient-info
                                        @elseif ($unit->status_hold == "revisi")
                                        btn-gradient-warning
                                        @else
                                        btn-gradient-danger
                                        @endif
                                        btn-sm button mt-4 col-12 pe-none">{{ ucfirst($unit->status_hold) }}</button>
                                        @else
                                        <form action="{{ route("update-assembly3") }}" method="POST">
                                        @csrf
                                            <input type="hidden" name="id" value="{{ $unit->id }}">
                                            <input type="hidden" name="lead1_assembly3" value="{{ Auth::user()->name }}">
                                            <input type="hidden" name="lead2_assembly3" value="Rhey">
                                            <div class="dropdown">
                                                <select
                                                    class="form-select  bg-transparent text-center search"
                                                    name="subkon1_assembly3" id="" style="border-color: black;">
                                                    <option disabled selected>Subkon 1</option>
                                                    @foreach ($subkons as $subkon)
                                                        <option value="{{ $subkon->subkon_name }}">{{ $subkon->subkon_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <div class="dropdown">
                                                <select class="form-select bg-transparent text-center search" name="subkon2_assembly3" id=""
                                                    style="border-color: black;">
                                                    <option disabled selected>Subkon 2</option>
                                                    @foreach ($subkons as $subkon)
                                                        <option value="{{ $subkon->subkon_name }}">{{ $subkon->subkon_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <div class="dropdown">
                                                <select class="form-select bg-transparent text-center search" name="process_assembly3" id=""
                                                    style="border-color: black;">
                                                    <option value="">Kegiatan</option>
                                                    <option value="Assembly">Assembly</option>
                                                    <option value="Las">Las</option>
                                                    <option value="Cek Opening">Cek Opening</option>
                                                    <option value="Pasang Kaca">Pasang Kaca</option>
                                                    <option value="Sealant Kaca">Sealant Kaca</option>
                                                </select>
                                            </div> <br>
                                            <button type="submit" class="d btn btn-success border-dark-rounded text-center">Konfirmasi</button>
                                        </form>
                                        @endif
                                    </td>
                                    <td class="long">
                                        <!-- Qc button -->
                                        {{-- <button type="button" class="d btn btn-info text-center"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">Isi Keterangan</button> --}}
                                        @if ($unit->status_hold)
                                        <button type="button" class=" btn
                                        @if ($unit->status_hold == "hold")
                                        btn-gradient-info
                                        @elseif ($unit->status_hold == "revisi")
                                        btn-gradient-warning
                                        @else
                                        btn-gradient-danger
                                        @endif

                                        btn-sm button mt-4 col-12 pe-none">{{ ucfirst($unit->status_hold) }}</button>
                                        @else
                                        @if (empty($qc_statuses[$no]))
                                            <a type="button" class=" btn btn-info btn-xl" data-bs-toggle="modal" data-bs-target="#qcModal{{ $unit->id }}" class="d btn btn-primary">Isi Keterangan</a>
                                            <br> <a class=" btn mt-5 "></a>
                                            <br> <a class=" btn mt-4 "></a>
                                            @else
                                            <a type="button" class="btn btn-gradient-primary btn-sm button col-9 mt-2 text-center" data-bs-toggle="modal" data-bs-target="#qcModal{{ $unit->id }}" class="d btn btn-primary">Lihat QC</a>
                                            <br>
                                            <a href="#" class=" btn btn-gradient-info mt-2 pe-none" >{{ date("d/m/Y", strtotime($unit->qcs->last()->created_at)) }} <br> {{ date("H:i", strtotime($unit->qcs->last()->created_at)) }}</a>
                                            <br> <a class=" btn mt-1 "></a>
                                            <br> <a class=" btn mt-4 "></a>
                                        @endif
                                        @endif
                                    </td>
                                    <td class="long">
                                        @if ($unit->tanggal_packing)
                                        <button type="button" class="btn btn-dark btn-sm button col-12 mt-4 pe-none">{{ $unit->subkon1_packing }} ({{ $unit->lead1_packing }})</button>
                                        <br>
                                        <button type="button" class="btn btn-dark btn-sm button col-12 mt-2 pe-none">{{ $unit->subkon2_packing }} ({{ $unit->lead2_packing }})</button>
                                        <div class="dropdown">
                                        </div> <button type="button" class="form-control text-center pe-none bg-secondary bg-opacity-50 mt-2"><b>{{ $unit->qty_packing }}</b></button>
                                        <a href="#" class=" btn btn-gradient-info mt-2 pe-none" >{{ date("d/m/Y", strtotime($unit->tanggal_packing)) }} <br> {{ date("H:i", strtotime($unit->tanggal_packing)) }}</a>
                                        @elseif ($unit->status_hold)
                                        <button type="button" class=" btn
                                        @if ($unit->status_hold == "hold")
                                        btn-gradient-info
                                        @elseif ($unit->status_hold == "revisi")
                                        btn-gradient-warning
                                        @else
                                        btn-gradient-danger
                                        @endif
                                        btn-sm button mt-4 col-12 pe-none">{{ ucfirst($unit->status_hold) }}</button>
                                        @elseif (in_array("OK!",$qc_statuses[$no]))
                                        <form action="{{ route("update-packing") }}" method="POST">
                                        @csrf
                                            <input type="hidden" name="id" value="{{ $unit->id }}">
                                            <input type="hidden" name="lead1_packing" value="{{ Auth::user()->name }}">
                                            <input type="hidden" name="lead2_packing" value="Rhey">
                                            <div class="dropdown">
                                                <select
                                                    class="form-select bg-transparent text-center search"
                                                    name="subkon1_packing" id="" style="border-color: black;">
                                                    <option disabled selected>Subkon 1</option>
                                                    @foreach ($subkons as $subkon)
                                                        <option value="{{ $subkon->subkon_name }}">{{ $subkon->subkon_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <div class="dropdown">
                                                <select class="form-select bg-transparent text-center search" name="subkon2_packing" id=""
                                                    style="border-color: black;">
                                                    <option disabled selected>Subkon 2</option>
                                                    @foreach ($subkons as $subkon)
                                                        <option value="{{ $subkon->subkon_name }}">{{ $subkon->subkon_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="hy form-group bg-transparent px-1">
                                                <label for="Quantity"></label>
                                                <input type="number" class="form-control text-center bg-transparent border border-dark p-2 mb-3 border-opacity-10 "
                                                    id="Quantity" name="qty_packing" placeholder="Quantity">
                                                <button type="submit" class="d btn btn-success border-dark-rounded text-center">Konfirmasi</button>
                                            </div>
                                        </form>
                                        @endif

                                    </td>

                                    {{-- Status --}}
                                    <td class="long">
                                        <div class="dropdown">
                                        </div> <br>
                                       @if ($unit->status_hold)
                                        <button type="button" class=" btn
                                        @if ($unit->status_hold == "hold")
                                        btn-gradient-info
                                        @elseif ($unit->status_hold == "revisi")
                                        btn-gradient-warning
                                        @else
                                        btn-gradient-danger
                                        @endif

                                        btn-sm button mt-4 col-12 pe-none">{{ ucfirst($unit->status_hold) }}</button>
                                        @else
                                        <button type="button" class="d btn
                                        @if ($unit->last_process == "queued")
                                            btn-gradient-secondary
                                        @elseif ($unit->last_process == "cutting" || $unit->last_process == "machining" || $unit->last_process == "assembly" || $unit->last_process == "qc" || $unit->last_process == "packing")
                                            btn-gradient-primary
                                        @elseif ($unit->last_process == "on delivery")
                                            btn-gradient-info
                                        @elseif ($unit->last_process == "delivered")
                                            btn-gradient-success
                                        @endif
                                        btn-sm button pe-none" >{{ strtoupper($unit->last_process) }}</button>
                                        <div class="">
                                        </div> <br> <a class=" btn pe-none" style="margin-top: 15px"></a>
                                        <div class="">
                                        </div> <br> <a class="d btn mt-4 pe-none"></a>
                                        @endif

                                    </td>
                                    <!-- keterangan -->
                                    <td class="long">
                                        @if ($unit->status_hold)
                                        <button type="button" class=" btn
                                        @if ($unit->status_hold == "hold")
                                        btn-gradient-info
                                        @elseif ($unit->status_hold == "revisi")
                                        btn-gradient-warning
                                        @else
                                        btn-gradient-danger
                                        @endif
                                        btn-sm button mt-4 col-12 pe-none">{{ ucfirst($unit->status_hold) }}</button>
                                        @else
                                        <form action="{{ route("update-keterangan") }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $unit->id }}">
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="keterangan"
                                                style="border-color: black;">
                                                <option disabled selected value="">Keterangan</option>
                                                <option value="hold"> Hold </option>
                                                <option value="revisi"> Revisi </option>
                                                <option value="cancel"> Cancel </option>
                                            </select>
                                        </div> <br>
                                        <button type="submit" class="d btn btn-success border-dark-rounded text-center">Konfirmasi</button>
                                        @endif
                                   </form>
                                    <br> <a class=" btn mt-3 "></a>
                                    <br> <a class=" btn mt-3 "></a>
                                   </td>
                                </tr>
                                @endforeach
                                {{-- <tr class="">
                                    <td> 1 </td>
                                    <td> B1-001 </td>
                                    <td> Astral AS 01 <br> top hung windo </td>
                                    <td> clear 6mm excluded <br> <br> <a href=""
                                            class="d btn btn-success border-dark-rounded ">OK!</a> </td>
                                    <td> 1 </td>
                                    <td> Outside </td>
                                    <td> Allure Black Matte </td>
                                    <!-- cutting button -->
                                    <td>
                                        <div class="dropdown">
                                            <select
                                                class="form-select  bg-transparent text-center search"
                                                name="state" id="" style="border-color: black;">
                                                <option disabled selected>Subkon 1</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black;">
                                                <option disabled selected>Subkon 2</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black;">
                                                <option value="">Progress</option>
                                                <option value="">Completed</option>
                                            </select>
                                        </div> <br> <a href=""
                                            class="d btn btn-success border-dark-rounded text-center">Konfirmasi</a>
                                    </td>
                                    <td>
                                        <!-- Machining button -->
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black; ">
                                                <option disabled selected>Subkon 1</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black;">
                                                <option disabled selected>Subkon 2</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                            </select>
                                        </div>
                                        <br><a href=""
                                            class="d btn btn-success border-dark-rounded text-center">Konfirmasi</a>
                                            <div style="margin-top: 42px">

                                        </div>
                                        </td>
                                    <!-- assembly 1 button -->
                                    <td>
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black;">
                                                <option disabled selected>Subkon 1</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black;">
                                                <option disabled selected>Subkon 2</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black;">
                                                <option disabled selected>Kegiatan</option>
                                                <option value="">Las</option>
                                                <option value="">Cek Opening</option>
                                                <option value="">Pasang Kaca</option>
                                                <option value="">Sealant Kaca</option>
                                            </select>
                                        </div> <br> <a href="" class="d btn btn-success text-center">Konfirmasi</a>
                                    </td>
                                    <!-- assembly 2 button -->
                                    <td>
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black;">
                                                <option disabled selected>Subkon 1</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black;">
                                                <option disabled selected>Subkon 2</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black;">
                                                <option disabled selected>Kegiatan</option>
                                                <option value="">Las</option>
                                                <option value="">Cek Opening</option>
                                                <option value="">Pasang Kaca</option>
                                                <option value="">Sealant Kaca</option>
                                            </select>
                                        </div> <br> <a href="" class="d btn btn-success text-center">Konfirmasi</a>
                                    </td>
                                    <!-- packing button -->
                                    <td>
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black;">
                                                <option disabled selected>Subkon 1</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black;">
                                                <option disabled selected>Subkon 2</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black;">
                                                <option disabled selected>Kegiatan</option>
                                                <option value="">Las</option>
                                                <option value="">Cek Opening</option>
                                                <option value="">Pasang Kaca</option>
                                                <option value="">Sealant Kaca</option>
                                            </select>
                                        </div> <br> <a href=""
                                            class="btn btn-success border-dark-rounded text-center">Konfirmasi</a>
                                    </td>
                                    <td>
                                        <!-- Qc button -->
                                        {{-- <button type="button" class="d btn btn-info text-center"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">Isi Keterangan</button> --}}
                                         {{-- <a type="button" class=" btn btn-info btn-xl" data-bs-toggle="modal" data-bs-target="#exampleModal" class="d btn btn-primary">Isi Keterangan</a>
                                         <br> <a class=" btn mt-5 "></a>
                                         <br> <a class=" btn mt-3 "></a>
                                        <!-- assembly 2 button -->
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black;">
                                                <option disabled selected>Subkon 1</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="dropdown">
                                            <select class="form-select bg-transparent text-center search" name="" id=""
                                                style="border-color: black;">
                                                <option disabled selected>Subkon 2</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                                <option value="">Nama Subkon</option>
                                            </select>
                                        </div>
                                        <div class="hy form-group bg-transparent px-1">
                                            <label for="Quantity"></label>
                                            <input type="number" class="form-control text-center bg-transparent border border-dark p-2 mb-2 border-opacity-10 "
                                                id="Quantity" placeholder="Quantity"
                                            >
                                        </div>
                                        <a href="" class="d btn btn-success" style="margin-top:-10px">Konfirmasi</a>
                                    </td>

                                    {{-- Status --}}
                                    {{-- <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-gradient-dark btn-sm button pe-none" >QUEUED</button>
                                        <div class="">
                                        </div> <br> <a class=" btn pe-none" style="margin-top: 15px"></a>
                                        <div class="">
                                        </div> <br> <a class="d btn mt-4 pe-none"></a>
                                    </td> --}}
                                {{-- </tr>  --}}

                                {{-- number 2 --}}
                                {{-- <tr class=" ">
                                    <td> 2 </td>
                                    <td> B1-002 </td>
                                    <td> Astral AS 01 <br> top hung windo </td>
                                    <td> clear 6mm excluded <br> </div> <br> <button type="button" class=" btn btn-gradient-success btn-sm button col-12 mx-auto pe-none">COMPLETED</button>
                                    <td> 1 </td>
                                    <td> Outside </td>
                                    <td> Allure Black Matte </td>
                                    <!-- cutting button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown ">
                                        </div> <br> <button type="button" class=" btn btn-dark button col-12 mx-auto pe-none">-</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-gradient-success btn-sm button col-12 mx-auto pe-none">COMPLETED</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    <!-- Machining button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                        <div class="">
                                        </div> <br> <a class=" btn mt-2 pe-none"></a>
                                    </td>
                                    <!-- assembly 1 button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-gradient-primary btn-sm button col-12 mx-auto pe-none">Cek Opening</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    <!-- assembly 2 button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-gradient-primary btn-sm button col-12 mx-auto pe-none">Cek Opening</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    <!-- assembly 3 button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-gradient-primary btn-sm button col-12 mx-auto pe-none">Pasang Kaca</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    <!-- Qc button -->
                                    <td>
                                            <a type="button" class=" btn btn-primary btn-xl" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" class="d btn btn-primary">Lihat QC</a>
                                                <div class="number">
                                                </div> <br> <a href=" " class=" btn btn-gradient-info pe-none">08/08/2022 <br> 10.00</a>
                                            <div class="dropdown">
                                            </div> <br> <a class=" btn mt-5 pe-none"></a>
                                    </td>
                                    <!-- packing button -->
                                    <td>
                                        <div class="dropdown">
                                            <div class="dropdown">
                                            </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Wahyu (Lead)</button>
                                            <div class="dropdown">
                                            </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d form-control text-center pe-none bg-secondary bg-opacity-50"><b>2</b></button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    {{-- Status --}}
                                    {{-- <td> --}}
                                        {{-- <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-gradient-info btn-sm button col-12 mx-auto pe-none">ON DELIVERY</button>
                                        <div class="">
                                        </div> <br> <a class="d btn mt-5 pe-none"></a>
                                        <div class="">
                                        </div> <br> <a class="d btn mt-5 pe-none"></a> --}}
                                    {{-- </td> --}}

                                {{-- number 3 --}}
                                {{-- <tr class=" ">
                                    <td> 3 </td>
                                    <td> B1-002 </td>
                                    <td> Astral AS 01 <br> top hung windo </td>
                                    <td> clear 6mm excluded <br> </div> <br> <button type="button" class=" btn btn-gradient-success btn-sm button col-12 mx-auto pe-none">COMPLETED</button>
                                    <td> 1 </td>
                                    <td> Outside </td>
                                    <td> Allure Black Matte </td>
                                    <!-- cutting button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown ">
                                        </div> <br> <button type="button" class=" btn btn-dark button col-12 mx-auto pe-none">-</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-gradient-success btn-sm button col-12 mx-auto pe-none">COMPLETED</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    <!-- Machining button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                        <div class="">
                                        </div> <br> <a class=" btn mt-2 pe-none"></a>
                                    </td>
                                    <!-- assembly 1 button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-gradient-primary btn-sm button col-12 mx-auto pe-none">Cek Opening</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    <!-- assembly 2 button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-gradient-primary btn-sm button col-12 mx-auto pe-none">Cek Opening</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    <!-- assembly 3 button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-gradient-primary btn-sm button col-12 mx-auto pe-none">Pasang Kaca</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    <!-- Qc button -->
                                    <td>
                                            <a type="button" class=" btn btn-primary btn-xl" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" class="d btn btn-primary">Lihat QC</a>
                                                <div class="number">
                                                </div> <br> <a href=" " class=" btn btn-gradient-info pe-none">08/08/2022 <br> 10.00</a>
                                            <div class="dropdown">
                                            </div> <br> <a class=" btn mt-5 pe-none"></a>
                                    </td>
                                    <!-- packing button -->
                                    <td>
                                        <div class="dropdown">
                                            <div class="dropdown">
                                            </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Wahyu (Lead)</button>
                                            <div class="dropdown">
                                            </div> <br> <button type="button" class=" btn btn-dark btn-sm button col-12 mx-auto pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d form-control text-center pe-none bg-secondary bg-opacity-50"><b>2</b></button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    {{-- Status --}}
                                    {{-- <td> --}}
                                        {{-- <div class="dropdown">
                                        </div> <br> <button type="button" class=" btn btn-gradient-info btn-sm button col-12 mx-auto pe-none">ON DELIVERY</button>
                                        <div class="">
                                        </div> <br> <a class="d btn mt-5 pe-none"></a>
                                        <div class="">
                                        </div> <br> <a class="d btn mt-5 pe-none"></a> --}}
                                    {{-- </td> --}}
                                    {{-- </tr> --}}
                                    <!-- my css -->
                                    <link rel="stylesheet" href="style.css">
                                </tr>
                        </table>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($workOrders as $unit)
    <div class="modal fade" id="qcModal{{ $unit->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg-white px-4">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form QC</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/create-qc" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="work_order_id" value="{{ $unit->id }}">
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="col-form-label fs-6">Nama Subkon</label>
                            <select class="form-select border border-2" aria-label="Default select example" name="subkon">
                                <option disabled selected>Pilih Salah Satu</option>
                                @foreach ($subkons as $subkon)
                                    <option value="{{ $subkon->subkon_name }}">{{ $subkon->subkon_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group " style="margin-bottom: 12px">
                            <label class="col-form-label fs-6">Status</label>
                            <select class="form-select border border-2" name="status">
                                <option disabled selected>Pilih Salah Satu</option>
                                <option value="OK!">OK!</option>
                                <option value="REJECTED">Rejected</option>
                            </select>
                        </div>
                        <div class="form-group " style="margin-bottom: 12px">
                            <label class="col-form-label fs-6">Alasan</label>
                            <select class="form-select border border-2" name="alasan">
                                <option disabled selected>Pilih Salah Satu</option>
                                <option value="-"> - </option>
                                <option value="Visual">Visual</option>
                                <option value="Dimensi">Dimensi</option>
                                <option value="Fungsi"> Fungsi</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-bottom: 12px">
                            <label class="col-form-label fs-6" for="Description">Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="" placeholder="Isikan Keterangan di sini" rows="5"></textarea>
                        </div>
                        <div class="" style="margin-bottom: 12px">
                            <table class="table table-striped text-center" id=files_table>
                                <thead>
                                  <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Alasan</th>
                                    <th scope="col">Keterangan</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $qcs = App\Models\QC::where('work_order_id', $unit->id)->get();
                                    @endphp
                                    @foreach ($qcs as $qc)
                                        <tr>
                                            <td>{{ date("d/m/Y H:i", strtotime($qc->created_at) + 25600)  }}</td>
                                            <td>{{ $qc->subkon }}</td>
                                            <td>{{ $qc->status }}</td>
                                            <td>{{ $qc->alasan }}</td>
                                            <td>{{ $qc->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-info">Simpan <i
                                class="mdi mdi-content-save "></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection

@push("script")
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.search').select2();
    theme : "classic"
});
</script>
@endpush

