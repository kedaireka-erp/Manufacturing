@extends('layouts.admin')
@push('style')
    <link rel="stylesheet" href="{{ asset('style.css') }}">
@endpush
@section('content')
    {{-- <div class="content-wrapper bg-img">
            <div class="shadow p-3 mb-3 bg-body rounded">Monitoring Per Project
            <h5 class="float-end"><a href="#" class="text-secondary">Manufaktur</a> / <a href="#" class="text-primary">Monitoring Per Project</a></h5>
        </div> --}}

    <div class="content-wrapper bg-img">
        <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
            <div class="col-md-6">
                <form action="/search-project" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari berdasarkan no fppp" name="search">
                        <button class="btn btn-outline-success" type="submit">Cari</button>
                    </div>
                </form>
            </div>
            <div class="">
                <div class="table-responsive">
                <table class="table table-striped">
                    <tr class="text-center">
                        <th class="sticky-col first-col bg-white" >No. </th>
                        <th class="sticky-col second-col bg-white width" >No. FPPP</th>
                        <th class="sticky-col third-col bg-white" >Tgl. Terima FPPP</th>
                        <th>Deadline</th>
                        <th>Project</th>
                        <th>Warna</th>
                        <th>Sales</th>
                        <th>No. Co/Quo</th>
                        <th>Total OP</th>
                        <th>Total Unit</th>
                        <th>Unit Hold/Revisi/Cancel</th>
                        <th>Proses Kaca</th>
                        <th>Cutting</th>
                        <th>Machining</th>
                        <th>Assembly</th>
                        <th>QC</th>
                        <th>Packing</th>
                        <th>Delivery</th>
                        <th>Acc Pengiriman Finance</th>
                        <th>Unit Belum Kirim</th>
                        <th>Unit Terkirim</th>
                        <th>Tgl Kirim Awal</th>
                        <th>Tgl Kirim Akhir</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($mpp as $key => $mPP)
                    <tr class="text-center">
                        <td class="sticky-col first-col bg-white">{{ $key+1 }}</td>
                        <td class="sticky-col second-col bg-white"><a href="/monitoring/{{ $mPP['id_fppp'] }}" class="nav-link"><button type="button" class="btn btn-info btn-icon"><i class="mdi mdi-magnify"></i></button> {{ $mPP['no_fppp'] }}</a></td>
                        <td class="sticky-col third-col bg-white">{{ $mPP['tanggalTerimaFppp'] }}</td>
                        <td>{{ date("d/m/Y", strtotime($mPP['deadline']) + 25200) }}</td>
                        <td>{{ $mPP['project'] }}</td>
                        <td>{{ $mPP['warna'] }}</td>
                        <td>{{ $mPP['sales'] }}</td>
                        <td>{{ $mPP['no_quo'] }}</td>
                        <td>{{ $mPP['total_op'] }}</td>
                        <td>{{ $mPP['total_unit'] }}</td>
                        <td>{{ $mPP['unit_hold'] }}</td>
                        <td>{{ $mPP['proses_kaca'] }}</td>
                        <td>{{ $mPP['cutting'] }}</td>
                        <td>{{ $mPP['machining'] }}</td>
                        <td>{{ $mPP['assembly'] }}</td>
                        <td>{{ $mPP['qc'] }}</td>
                        <td>{{ $mPP['packing'] }}</td>
                        <td>{{ $mPP['delivery'] }}</td>
                        <td>{{ $mPP['acc_pengiriman_status'] }}</td>
                        <td>{{ $mPP['unitBelumKirim'] }}</td>
                        <td>{{ $mPP['unitTerkirim'] }}</td>
                        <td>{{ date("d/m/Y", strtotime($mPP['tanggalKirimAwal']) + 25200) }}</td>
                        <td>{{ date("d/m/Y", strtotime($mPP['tanggalKirimAkhir']) + 25200) }}</td>
                        <td>
                            <button type="button" class="btn btn-gradient-warning" disabled>{{ $mPP['status'] }}</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
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
