@extends('layouts.admin')
@section('content')
<div class="content-wrapper bg-img">
            <div class="shadow p-3 mb-5 bg-body rounded">FPPP
            <h5 class="float-end"><a href="#" class="text-secondary">Master</a> / <a href="#" class="text-primary">Lead Subkon</a></h5>
            </div>
</div>
        <div class="row">
            <div class="content-wrapper bg-img">
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
                </table>
            </div>
        </div>
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import: Lantai 1 BRI</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="/fppp" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="text" name="id" hidden>
                            
                            <div class="mb-3">
                                <label class="col-form-label">Pilih Jenis</label>
                                <select class="form-select" aria-label="Default select example" name="type">
                                    <option value="bom_alumunium">BOM Alumunium</option>
                                    <option value="bom_aksesoris">BOM Aksesoris</option>
                                    <option value="wo_alumunium">WO Alumunium</option>
                                    <option value="wo_kaca">WO Kaca</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Import File</label>
                                <input class="form-control" type="file" id="formFile" name="file">
                            </div>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        
    
                    </div>
                    </form>
                    <div class="mb-3 p-2">
                            <div class="text-primary fw-bold">File yang telah diupload</div>
                            <table class="table" id="files_table">
                            </table>
                </div>
            </div>
        </div>
</div>
@endsection