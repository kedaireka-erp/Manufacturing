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
                        <h5 class="card-bredcrumb mb-0">
                            <a href="/manufactures" class="text-secondary">Manufaktur / </a>
                            <a href="{{ route('logistic_index') }}" class="text-secondary"> Surat Jalan / </a>
                            <a href="#" class="text-primary">Lihat Surat Jalan</a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @php
            $data = $getLogistic;
        @endphp
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header__wrapper d-flex justify-content-end">
                            <div>
                                <a href="{{ route('logistic_generate_pdf', $data->id) }}" target="_blank"
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
                                                    {{ date('Y-m-d', strtotime($data->tgl_berangkat)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Input</td>
                                                <td>:</td>
                                                <td>
                                                    {{ date('Y-m-d H:i:s', strtotime($data->tgl_input)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>No. FPPP</td>
                                                <td>:</td>
                                                <td>
                                                    {{ $data->fppp_no }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Brand</td>
                                                <td>:</td>
                                                <td>
                                                    Astral
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mitra/Store</td>
                                                <td>:</td>
                                                <td style="line-height: 1.2rem">
                                                    {{ $getAplicator->nama }} ({{ $getAplicator->kontak }})
                                                    <br>
                                                    {{ $getAplicator->alamat }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td>
                                                    <span>
                                                        {{ ucwords($data->alamat, ',. ') }}
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                {{-- table 2 --}}
                                <div class="col-6">
                                    <div class="d-flex justify-content-end">
                                        <table class="table table-2 table-borderless mb-3">
                                            <tbody>
                                                <tr>
                                                    <td>No. Surat Jalan</td>
                                                    <td>:</td>
                                                    <td>
                                                        {{ $data->no_logistic }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No. Quotation</td>
                                                    <td>:</td>
                                                    <td>
                                                        {{ $getQuotationNo->no_quotation }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Driver</td>
                                                    <td>:</td>
                                                    <td>
                                                        {{ ucfirst($data->driver) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No. Polisi</td>
                                                    <td>:</td>
                                                    <td>
                                                        {{ $data->no_polisi }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
                                            <th>Warna</th>
                                            <th>Qty</th>
                                            {{-- <th>Ukuran</th>
                                            <th>Bukaan</th>
                                            <th>Tipe</th>
                                            <th>Status</th> --}}
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getItems as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->nama_item }}</td>
                                                <td>{{ $item->warna }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->keterangan ? $item->keterangan : '-' }}</td>
                                            </tr>
                                        @endforeach

                                        {{-- <tr>
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
                                        </tr> --}}
                                        {{-- total column --}}
                                        <tr>
                                            <td colspan="3">Total Item</td>
                                            <td>{{ $getTotalQty->total ?? '0' }}</td>
                                            <td colspan="2"></td>
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
