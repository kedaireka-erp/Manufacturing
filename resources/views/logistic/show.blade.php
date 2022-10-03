@extends('layouts.admin')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/logistic/show.css') }}">
@endpush

@section('content')
    <div class="content-wrapper bg-img">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-table-header">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h2 class="card-title mb-0">Lihat Surat Jalan</h2>
                        <h5 class="card-bredcrumb mb-0"><a href="#" class="text-secondary">Manufaktur / FPPP / </a><a
                                href="#" class="text-primary">Lihat Surat Jalan</a></h5>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header__wrapper d-flex justify-content-end">
                            <div>
                                <a href="{{ route('logistic_create') }}"
                                    class="btn btn-info btn-download h-100 d-flex align-items-center">Download File<i
                                        class="mdi mdi-download ms-2"></i></a>
                            </div>
                        </div>

                        <hr class="divider">
                        <div class="paper-form">
                            <div class="paper-form__header d-flex align-items-center">
                                <img src="{{ asset('assets/images/alphamax-logo.svg') }}" alt="Alphamax Logo">
                                <h4 class="paper-form__title fw-bold fs-4 text-uppercase me-auto mb-0">surat jalan</h4>
                            </div>
                            <hr class="bg-black opacity-100 mb-4">
                            {{-- Surat Jalan --}}
                            <div class="row row-tables mb-4">
                                {{-- table 1 --}}
                                <div class="col-6">
                                    <table class="table table-1 table-borderless mb-3">
                                        <tbody>
                                            <tr>
                                                <td>Tanggal Pengiriman</td>
                                                <td>:</td>
                                                <td>
                                                    2022-08-08
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Input</td>
                                                <td>:</td>
                                                <td>
                                                    2022-08-08 15:43:30
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>No. Permintaan</td>
                                                <td>:</td>
                                                <td>
                                                    53/orde/07/2022
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Brand</td>
                                                <td>:</td>
                                                <td>
                                                    Alphamax
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mitra/Store</td>
                                                <td>:</td>
                                                <td>

                                                    Bintang Selatan Otista (Lam Linda Suherlin) Telp. 089888989146 /
                                                    022-42374487

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td>
                                                    <span>
                                                        Jl. Otto Iskandar Dinata No. 347A, Balonggede, Kec. Regol, Kota
                                                        Bandung,
                                                        Jawa Barat 40251
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                {{-- table 2 --}}
                                <div class="col-6">
                                    <table class="table table-2 table-borderless mb-3 ms-auto">
                                        <tbody>
                                            <tr>
                                                <td>No. Surat Jalan</td>
                                                <td>:</td>
                                                <td>
                                                    154/send/08/2022
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>No. PO/SO</td>
                                                <td>:</td>
                                                <td>
                                                    IM 068/ALP/2907202
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Driver</td>
                                                <td>:</td>
                                                <td>
                                                    Danu
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>No. Polisi</td>
                                                <td>:</td>
                                                <td>
                                                    B 9914 UAL
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- special instruction --}}
                            <div class="instruction border border-1 rounded p-2 mb-4">
                                <p>Special Instruction :</p>
                            </div>

                            {{-- tabel stripped --}}
                            <div class="table-responsive">
                                <table class="table table-detail table-striped text-center mb-5">
                                    <thead>
                                        <tr>
                                            <th>No</th>
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
                                            <td>1</td>
                                            <td>MAX 9 PU2</td>
                                            <td>900x2200</td>
                                            <td>HITAM (SBM)</td>
                                            <td>R</td>
                                            <td>1</td>
                                            <td>Common</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>MAX 9 PU2</td>
                                            <td>900x2200</td>
                                            <td>PUTIH (RALL 9003)</td>
                                            <td>R</td>
                                            <td>1</td>
                                            <td>Common</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Boston-H</td>
                                            <td>700x1950</td>
                                            <td>Kombinasi Grey SBM</td>
                                            <td>L</td>
                                            <td>2</td>
                                            <td>Common</td>
                                            <td>Stock</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Boston-H</td>
                                            <td>700x1950</td>
                                            <td>Kombinasi Grey SBM</td>
                                            <td>R</td>
                                            <td>1</td>
                                            <td>Common</td>
                                            <td>Stock</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Max 16 JP</td>
                                            <td>900x2200</td>
                                            <td>KAYU (P5)</td>
                                            <td>R</td>
                                            <td>1</td>
                                            <td>Common</td>
                                            <td>Display</td>
                                            <td>DISPLAY TANPA RANGKA</td>
                                        </tr>
                                        {{-- total column --}}
                                        <tr>
                                            <td colspan="5">Total Item</td>
                                            <td>16</td>
                                            <td colspan="3"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            {{-- last table --}}
                            <div class="table-responsive">
                                <table class="table table-last table-bordered text-center mb-5">
                                    <thead>
                                        <tr>
                                            <th>Tanda Terima</th>
                                            <th>Sopir</th>
                                            <th>Bag. Logistik</th>
                                            <th>SPV Admin Logistik</th>
                                            <th>Security</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="height: 100px"></td>
                                            <td style="height: 100px"></td>
                                            <td style="height: 100px"></td>
                                            <td style="height: 100px"></td>
                                            <td style="height: 100px"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Nama:</p>
                                                <p>Tanggal:</p>
                                            </td>
                                            <td>
                                                <p>Nama:</p>
                                                <p>Tanggal:</p>
                                            </td>
                                            <td>
                                                <p>Nama:</p>
                                                <p>Tanggal:</p>
                                            </td>
                                            <td>
                                                <p>Nama:</p>
                                                <p>Tanggal:</p>
                                            </td>
                                            <td>
                                                <p>Nama:</p>
                                                <p>Tanggal:</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            {{-- table footer --}}
                            <div class="table-note">
                                <p class="mb-0">
                                    *Putih:Finance Merah:Eksternal Kuning:Logistik Hijau:SCM
                                </p>
                                <p>
                                    *Barang diatas merupakan barang titipan PT. Allure Alluminio
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
