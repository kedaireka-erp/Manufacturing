@extends('layouts.admin')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/logistic/create.css') }}">
@endpush

@section('content')
    <div class="content-wrapper bg-img">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-table-header">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h2 class="card-title mb-0">Buat Surat Jalan</h2>
                        <h5 class="card-bredcrumb mb-0"><a href="#" class="text-secondary">Manufaktur / Surat Jalan /
                            </a><a href="#" class="text-primary">Buat Surat Jalan</a></h5>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="add-form">
                            <div class="card-header__wrapper d-flex justify-content-between">
                                <h4 class="text-uppercase fs-6 mb-0">informasi umum</h4>
                            </div>
                            <div class="row form-row">
                                {{-- input date --}}
                                <div class="col-4">
                                    <div class="form-wrap">
                                        <label for="input-date" class="form-label">Tanggal Input</label>
                                        <input type="date" class="form-control fs-6 text-uppercase" id="input-date"
                                            name="inputDate">
                                    </div>
                                </div>
                                {{-- depart date --}}
                                <div class="col-4">
                                    <div class="form-wrap">
                                        <label for="depart-date" class="form-label">Tanggal Berangkat</label>
                                        <input type="date" class="form-control fs-6 text-uppercase" id="depart-date"
                                            name="departDate">
                                    </div>
                                </div>
                                {{-- brand --}}
                                <div class="col-4">
                                    <div class="form-wrap">
                                        <label for="brand" class="form-label">Brand</label>
                                        <select class="form-select" aria-label="Select brand" name="brand" id="brand">
                                            <option selected>Astral</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-row">
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-6">
                                            {{-- fppp --}}
                                            <div class="mb-3 form-row">
                                                <label for="fppp" class="form-label">Nomor FPPP</label>
                                                <select class="form-select" aria-label="Select fppp" id="fppp"
                                                    name="fppp">
                                                    <option selected>529/FPPP/AST/03/2022</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- quotation --}}
                                        <div class="col-6">
                                            <div class="mb-3 form-row">
                                                <label for="quotation" class="form-label">Nomor
                                                    Quotation</label>
                                                <input type="text" class="form-control" id="quotation" name="quotation"
                                                    value="529/FPPP/AST/03/2022" disabled />
                                            </div>
                                        </div>
                                        {{-- sopir --}}
                                        <div class="col-6">
                                            <div class="mb-3 form-row">
                                                <label for="driver" class="form-label">Driver</label>
                                                <input class="form-control" id="driver" name="driver"
                                                    placeholder="Driver" />
                                            </div>
                                        </div>
                                        {{-- no polisi --}}
                                        <div class="col-6">
                                            <div class="mb-3 form-row">
                                                <label for="plate-number" class="form-label">Nomor Polisi</label>
                                                <input class="form-control" id="plate-number" name="plateNumber"
                                                    placeholder="Nomor Polisi" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- alamat --}}
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="address" name="address" placeholder="Alamat"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-list">
                            <div class="card-header__wrapper d-flex justify-content-between flex-column">
                                <h4 class="text-uppercase fs-6 mb-4">informasi barang</h4>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="table-list__subtitle mb-0">Daftar Barang</p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info h-100 d-flex align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#add-form-modal">Tambah Barang
                                        <i class="mdi mdi-plus ms-2"></i> </button>
                                </div>
                            </div>
                            {{-- table --}}
                            <table class="table table-striped mb-3">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Item</th>
                                        <th>Ukuran</th>
                                        <th>Warna</th>
                                        <th>Bukaan</th>
                                        <th>Qty</th>
                                        <th>Tipe</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>MAX 9 PU2</td>
                                        <td class="text-center">900x2200</td>
                                        <td class="text-center">HITAM (SBM)</td>
                                        <td class="text-center">R</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">Common</td>
                                        <td class="text-center">Stock</td>
                                        <td class="text-center">Display Tanpa Rangka</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="mt-5">
                                <p class="text-center table-description">Belum ada barang yang ditambahkan</p>
                            </div>
                            <div class="table-btn d-flex justify-content-end mt-5">
                                <a href="{{ route('logistic_index') }}"
                                    class="btn btn-dark d-flex align-items-center">Kembali</a>
                                <button class="btn btn-info d-flex align-items-center ms-4">Simpan
                                    <i class="mdi mdi-content-save ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="add-form-modal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header p-0 mb-4 border-bottom-0">
                                <h5 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Tambah Barang</h5>
                                <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0 mb-3">
                                <div class="code-item">
                                    <label for="code-item" class="form-label">Kode Item</label>
                                    <select class="form-select" aria-label="Select code-item" name="code-item"
                                        id="code-item">
                                        <option selected disabled>Pilih Salah Satu</option>
                                        <option>AW4 - Astral AST Top Hung Window</option>
                                    </select>
                                </div>
                                <div class="color">
                                    <label for="color" class="form-label">Warna</label>
                                    <input class="form-control" type="text" disabled readonly
                                        value="Allure Black Matte" id="color" name="color">
                                </div>
                                <div class="size">
                                    <label for="size" class="form-label">Ukuran</label>
                                    <div class="d-flex">
                                        <input class="form-control" type="text" disabled readonly value="3m"
                                            name="size">
                                        <input class="form-control ms-3" type="text" disabled readonly value="2m">
                                    </div>
                                </div>
                                <div class="d-flex input-wrap flex-wrap">
                                    <div class="opener">
                                        <label for="opener" class="form-label">Bukaan</label>
                                        <input class="form-control" type="text" disabled readonly value="Outsite"
                                            id="opener" name="opener">
                                    </div>
                                    <div class="qty ms-3">
                                        <label for="qty" class="form-label">Qty</label>
                                        <input class="form-control" type="text" disabled readonly value="2 Unit"
                                            id="qty" name="qty">
                                    </div>
                                    <div class="type ms-3">
                                        <label for="type" class="form-label">Type</label>
                                        <input class="form-control" type="text" disabled readonly id="type"
                                            name="type">
                                    </div>
                                    <div class="status ms-3">
                                        <label for="status" class="form-label">Status</label>
                                        <input class="form-control" type="text" disabled readonly id="status"
                                            name="status">
                                    </div>
                                </div>
                                <div class="description">
                                    <label for="description" class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Isikan Keterangan di sini"
                                        rows="4"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer p-0 border-top-0">
                                <div class="d-flex justify-content-end">
                                    <button class="modal-btn btn btn-dark d-flex align-items-center" aria-label="Close"
                                        data-bs-dismiss="modal">Kembali</button>
                                    <button class="modal-btn btn btn-info d-flex align-items-center ms-4">Simpan
                                        <i class="mdi mdi-content-save ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/js/logistic/create.js') }}"></script>
@endpush
