<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Astral Alumunium allure</title>
    <link rel="stylesheet" href="{{ public_path() . '/assets/css/logistic/show.css' }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" \>
</head>

<body>
    <div class="container-scroller">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="paper-form">
                            <div class="paper-form__header d-flex align-items-center">
                                <img src="{{ public_path() . '/assets/images/alphamax-logo.svg' }}">
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
                                                    {{ date('Y-m-d', strtotime($logistic->tgl_berangkat)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Input</td>
                                                <td>:</td>
                                                <td>
                                                    {{ date('Y-m-d H:i:s', strtotime($logistic->tgl_input)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>No. FPPP</td>
                                                <td>:</td>
                                                <td>
                                                    {{ $logistic->fppp_no }}
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
                                                    {{ $aplikator->nama }} ({{ $aplikator->kontak }})
                                                    <br>
                                                    {{ $aplikator->alamat }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td>
                                                    <span>
                                                        {{ ucwords($logistic->alamat, ',. ') }}
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
                                                        {{ $logistic->no_logistic }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No. Quotation</td>
                                                    <td>:</td>
                                                    <td>
                                                        {{ $quotation->no_quotation }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Driver</td>
                                                    <td>:</td>
                                                    <td>
                                                        {{ ucfirst($logistic->driver) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No. Polisi</td>
                                                    <td>:</td>
                                                    <td>
                                                        {{ $logistic->no_polisi }}
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
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->nama_item }}</td>
                                                <td>{{ $item->warna }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->keterangan ? $item->keterangan : '-' }}</td>
                                            </tr>
                                        @endforeach

                                        {{-- total column --}}
                                        <tr>
                                            <td colspan="3">Total Item</td>
                                            <td>{{ $totalQty->total ?? '0' }}</td>
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
</body>

</html>

{{-- 

<!DOCTYPE html>
<html>

<head>
    <title>Download Surat Jalan ({{ $logistic->no_logistic }})</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" \>
    <link rel="stylesheet" href="{{ public_path() . '/assets/css/logistic/show.css' }}">
</head>

<body>
    <div class="card-body">
        <div class="paper-form">
            <div class="paper-form__header d-flex align-items-center">
                <img src="{{ public_path() . '/assets/images/alphamax-logo.svg' }}">
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
                        {{ date('Y-m-d', strtotime($logistic->tgl_berangkat)) }}
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Input</td>
                    <td>:</td>
                    <td>
                        {{ date('Y-m-d H:i:s', strtotime($logistic->tgl_input)) }}
                    </td>
                </tr>
                <tr>
                    <td>No. FPPP</td>
                    <td>:</td>
                    <td>
                        {{ $logistic->fppp_no }}
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
                        {{ $aplikator->nama }} ({{ $aplikator->kontak }})
                        <br>
                        {{ $aplikator->alamat }}
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>
                        <span>
                            {{ ucwords($logistic->alamat, ',. ') }}
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
                            {{ $logistic->no_logistic }}
                        </td>
                    </tr>
                    <tr>
                        <td>No. Quotation</td>
                        <td>:</td>
                        <td>
                            {{ $quotation->no_quotation }}
                        </td>
                    </tr>
                    <tr>
                        <td>Driver</td>
                        <td>:</td>
                        <td>
                            {{ ucfirst($logistic->driver) }}
                        </td>
                    </tr>
                    <tr>
                        <td>No. Polisi</td>
                        <td>:</td>
                        <td>
                            {{ $logistic->no_polisi }}
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
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nama_item }}</td>
                    <td>{{ $item->warna }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->keterangan ? $item->keterangan : '-' }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">Total Item</td>
                <td>{{ $totalQty->total ?? '0' }}</td>
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
</body>

</html> --}}
