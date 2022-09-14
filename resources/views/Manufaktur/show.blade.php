@extends('layouts.admin')

@push("style")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="content-wrapper bg-img">
    <div class="row">
        <div class="col-lg-12">
            <div class="shadow p-3 mb-2 bg-body rounded">Lihat WO</h2>
                <h5 class="float-end"><a href="#" class="text-secondary">Manufaktur</a> / <a href="#"
                        class="text-secondary">FPPP</a>/<a href="#" class="lihatfppp">Lihat FPPP</a></h5>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- search -->
                    <form class="col-lg-4 my-md-0">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-dark-rounded"
                                placeholder="Cari Pegawai Berdasarkan Nomor atau Nama.." aria-label="Search"
                                aria-describedby="basic-addon2">
                        </div>
                    </form>

                    <!-- Tabel -->
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th width="250px"> No. </th>
                                    <th width="250px"> Kode Gambar </th>
                                    <th width="250px"> Item </th>
                                    <th width="250px"> Glass Specification </th>
                                    <th width="250px"> Leaves </th>
                                    <th width="250px"> Opening Direct </th>
                                    <th width="250px"> Finish </th>
                                    <th width="250px"> Cutting </th>
                                    <th width="250px"> Machining </th>
                                    <th width="250px"> Assembly 1 </th>
                                    <th width="250px"> Assembly 2 </th>
                                    <th width="250px"> Assembly 3 </th>
                                    <th width="250px"> QC </th>
                                    <th width="250px"> Packing </th>
                                    <th width="250px"> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
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
                                    <!-- assembly 3 button -->
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
                                            class="d btn btn-success border-dark-rounded text-center">Konfirmasi</a>
                                    </td>
                                    <td>
                                        <!-- Qc button -->
                                        {{-- <button type="button" class="d btn btn-info text-center"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">Isi Keterangan</button> --}}
                                        
                                        <button type="submit" class="d btn btn-info text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">Isi Keterangan   </button>
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
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-gradient-dark btn-sm button" >QUEUED</button>
                                        <div class="">
                                        </div> <br> <a class=" btn pe-none" style="margin-top: 15px"></a>
                                        <div class="">
                                        </div> <br> <a class="d btn mt-4 pe-none"></a>
                                    </td>

                                    {{-- number 2 --}}
                                </tr>
                                <tr class=" ">
                                    <td> 2 </td>
                                    <td> B1-002 </td>
                                    <td> Astral AS 01 <br> top hung windo </td>
                                    <td> clear 6mm excluded <br> <br> <a href=""
                                            class="d btn btn-gradient-success border-dark-rounded pe-none">COMPLETED</a> </td>
                                    <td> 1 </td>
                                    <td> Outside </td>
                                    <td> Allure Black Matte </td>
                                    <!-- cutting button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-dark btn-sm button pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-dark btn-sm button pe-none">-</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-gradient-success btn-sm button pe-none">COMPLETED</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    <!-- Machining button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-dark btn-sm button pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-dark btn-sm button pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                        <div class="">
                                        </div> <br> <a class=" btn mt-2 pe-none"></a>
                                    </td>
                                    <!-- assembly 1 button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-dark btn-sm button pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-dark btn-sm button pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-gradient-primary btn-sm button pe-none">Cek Opening</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    <!-- assembly 2 button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-dark btn-sm button pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-dark btn-sm button pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-gradient-primary btn-sm button pe-none">Cek Opening</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    <!-- assembly 3 button -->
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-dark btn-sm button pe-none">Wahyu (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-dark btn-sm button pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-gradient-primary btn-sm button pe-none">Pasang Kaca</button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    <!-- Qc button -->
                                    <td>
                                            <button type="button" class="d btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" class=" btn btn-primary btn-sm button">Lihat QC</button>
                                                <div class="number">
                                                </div> <br> <a href=" " class=" btn btn-gradient-info pe-none">08/08/2022 <br> 10.00</a>
                                            <div class="dropdown">
                                            </div> <br> <a class=" btn mt-5 pe-none"></a>
                                    </td>
                                    <!-- packing button -->
                                    <td>
                                        <div class="dropdown">
                                            <div class="dropdown">
                                            </div> <br> <button type="button" class="d btn btn-dark btn-sm button pe-none">Wahyu (Lead)</button>
                                            <div class="dropdown">
                                            </div> <br> <button type="button" class="d btn btn-dark btn-sm button pe-none">Budi (Lead)</button>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d form-control text-center pe-none bg-secpndary bg-opacity-50 text-bold"> 2 </button>
                                        <div class="dropdown">
                                        </div> <br> <a href=" " class=" btn btn-gradient-info pe-none" >08/08/2022 <br> 10.00</a>
                                    </td>
                                    {{-- Status --}}
                                    <td>
                                        <div class="dropdown">
                                        </div> <br> <button type="button" class="d btn btn-gradient-info btn-sm button pe-none">ON DELIVERY</button>
                                        <div class="">
                                        </div> <br> <a class="d btn mt-5 pe-none"></a>
                                        <div class="">
                                        </div> <br> <a class="d btn mt-4 pe-none"></a>
                                    </td>
                                    <!-- my css -->
                                    <link rel="stylesheet" href="style.css">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form QC</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/show" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-3">
                        <input type="text" name="id" hidden>

                        <div class="form-group mb-3">
                            <label class="col-form-label fs-6">Nama Subkon</label>
                            <select class="form-select border border-2" aria-label="Default select example" name="type">
                                <option disabled selected>Pilih Salah Satu</option>
                                <option value="dropdown-item">Nama Subkon</option>
                                <option value="dropdown-item">Nama Subkon</option>
                                <option value="dropdown-item">Nama Subkon</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="col-form-label fs-6">Alasan</label>
                            <select class="form-select border border-2" name="type">
                                <option disabled selected>Pilih Salah Satu</option>
                                <option value="dropdown-item">Alasan 1</option>
                                <option value="dropdown-item">Alasan 2</option>
                                <option value="dropdown-item">Alasan 3</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="col-form-control fs-6" for="Description">Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="" placeholder="Isikan Keterangan di sini" rows="5"></textarea>
                        </div>
                        <div class="mb-3 p-3">
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
                                  <tr>
                                    <td>27/07/2022</td>
                                    <td>Budddd</td>
                                    <td>OK!</td>
                                    <td>Alasan</td>
                                    <td>Keterangan</td>
                                  </tr>
                                  <tr>
                                    <td>27/07/2022</td>
                                    <td>Buddiiiiii</td>
                                    <td>OK!</td>
                                    <td>Alasan</td>
                                    <td>Keterangan</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-info">Simpan <i
                                class="mdi mdi-content-save fs-3"></i></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
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