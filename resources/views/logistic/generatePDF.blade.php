<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css" media="all">
        .table.table-1 tr td {
            padding: 5px 20px 5px 0;
            vertical-align: top;
        }

        .table.table-2 tr td {
            padding: 5px 20px 5px 0;
            vertical-align: top;
        }

        .table.table-detail th,
        .table.table-detail td {
            border-bottom: 1px solid #b3b3b3;
            padding: 8px
        }

        .table.table-detail th {
            border-width: 2px;
            border-color: #212529
        }

        .table.table-detail {
            border-collapse: collapse
        }

        .table.table-last th,
        .table.table-last td {
            border: 1px solid black;
            padding: 5px;
        }

        .table.table-last {
            border-collapse: collapse
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="">
                        <div class="paper-form">
                            <div class="paper-form__header" style="display: flex; align-items:center; max-width: 53%; ">
                                <img src="{{ public_path('assets/images/alphamax-logo.png') }}"
                                    style="float: left; width: 25%">
                                <h4 class="paper-form__title fs-4 me-auto mb-0"
                                    style="font-weight: bold; text-transform: uppercase; margin-left:auto; font-size: 25px; font-weight: 700; margin-left: 70%; width: 95%;">
                                    surat jalan</h4>
                            </div>
                            <hr class="mb-4" style="opacity: 1;background-color: black">
                            {{-- Surat Jalan --}}
                            <div class="row row-tables mb-4" style="display: flex; justify-content: space-between">
                                {{-- table 1 --}}
                                <div class="col-6"
                                    style="flex-basis: content; flex-shrink: 1; margin-bottom:25px; float: left; width: 55%">
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
                                <div class="col-6" style="flex-basis: content; margin-left: 55%; width: 50%;">
                                    <div style="display: flex; justify-content: end">
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
                            <div class="instruction border border-1 rounded p-2 mb-4"
                                style="height: 100px; padding-left: 8px; border: 1px solid #343A40; margin-bottom: 35px; margin-top: 220px; position: relative">
                                <p
                                    style="border: 1px solid red; width: fit-content !important; position: absolute; left: 8px; padding:0; margin: 0;">
                                    Special Instruction :</p>
                            </div>

                            {{-- tabel stripped --}}
                            <div class="table-responsive" style="margin-bottom: 35px">
                                <table class="table table-detail table-striped mb-5"
                                    style="text-align: center; width: 100%">
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
                            <div class="table-responsive" style="">
                                <table class="table table-last table-bordered mb-5" style="width: 100%">
                                    <thead>
                                        <tr style="text-align: center">
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
                                        <tr style="text-align: start !important">
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
