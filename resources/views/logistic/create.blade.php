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
                                            name="input-date">
                                    </div>
                                </div>
                                {{-- depart date --}}
                                <div class="col-4">
                                    <div class="form-wrap">
                                        <label for="depart-date" class="form-label">Tanggal Berangkat</label>
                                        <input type="date" class="form-control fs-6 text-uppercase" id="depart-date"
                                            name="depart-date">
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
                                                <input class="form-control" id="plate-number" name="plate-number"
                                                    placeholder="Nomor Polisi" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- alamat --}}
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="address" name="addres" placeholder="Alamat"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-list">
                            <div class="card-header__wrapper d-flex justify-content-between flex-column">
                                <h4 class="text-uppercase fs-6 mb-4">informasi barang</h4>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="table-list__subtitle mb-0">Daftar Barang</p>
                                    <a href="#" class="btn btn-info h-100 d-flex align-items-center">Tambah Barang
                                        <i class="mdi mdi-plus ms-2"></i> </a>
                                </div>
                            </div>
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
                                <div class="btn btn-dark d-flex align-items-center">Kembali</div>
                                <div class="btn btn-info d-flex align-items-center ms-4">Simpan
                                    <i class="mdi mdi-content-save ms-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/js/logistic/create.js') }}"></script>
@endpush
