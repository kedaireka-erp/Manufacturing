@extends('layouts.admin')
@section('content')
<div class="content-wrapper bg-img">
            <div class="shadow p-3 mb-3 bg-body rounded">FPPP
            <h5 class="float-end"><a href="#" class="text-secondary">Manufaktur</a> / <a href="#" class="text-primary">FPPP</a></h5>
            </div>
            <div class="row">
            <div class="scontent-wrapper bg-img">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
            <div class="col-md-6">
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari.." name="search">
                  
                    </div>
                </form>
            </div>
            <div class="">
                <table class="table table-striped">
                    <tr class="text-center">
                        <th>No. FPPP</th>
                        <th>Nama Proyek</th>
                        <th>Aplikator</th>
                        <th>Action</th>
                    </tr>
                    <tr class="text-center">
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>
                            <button type="button" class="btn btn-purple" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #51e29f">Import</button>
                                        <a href="{{route("store")}}" class="btn btn-info">Lihat</a>
                                        <a href="{{route("show")}}" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>
                            <button type="button" class="btn btn-purple" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #51e29f">Import</button>
                                        <a href="{{route("store")}}" class="btn btn-info">Lihat</a>
                                        <a href="{{route("show")}}" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content bg-white">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import: Lantai 1 BRI</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="/fppp" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body p-3">
                            <input type="text" name="id" hidden>
                            
                            <div class="form-group mb-3">
                                <label class="col-form-label fs-6">Pilih Jenis</label>
                                <select class="form-select border border-2" aria-label="Default select example" name="type">
                                    <option value="bom_alumunium">BOM Alumunium</option>
                                    <option value="bom_aksesoris">BOM Aksesoris</option>
                                    <option value="wo_alumunium">WO Alumunium</option>
                                    <option value="wo_kaca">WO Kaca</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-form-label fs-6">Import File</label>
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                  <input type="text" class="form-select file-upload-info border border-2" disabled placeholder="Upload File">
                                  <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                  </span>
                                </div>
                              </div>
                    </div>
                    </form>
                    <div class="mb-3 p-3">
                            <div class="text-primary fw-bold">File yang telah diupload</div>
                            <table class="table" id="files_table">
                            </table>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">No. </th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row"></th>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info">Simpan      <i class="mdi mdi-content-save fs-3"></i></button>
                            </div>
                        </div>
                    </div>
        </div>
</div>
</div>
</div>


@endsection

@push('script')
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <!-- End custom js for this page -->
@endpush