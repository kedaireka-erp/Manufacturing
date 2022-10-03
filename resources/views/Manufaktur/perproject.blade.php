@extends('layouts.admin')
@push("style")
<link rel="stylesheet" href="{{ asset('style.css')}}">    
@endpush
@section('content')
<div class="content-wrapper bg-img">
            <div class="shadow p-3 mb-3 bg-body rounded">Monitoring Per Project
            <h5 class="float-end"><a href="#" class="text-secondary">Manufaktur</a> / <a href="#" class="text-primary">Monitoring Per Project</a></h5>
            </div>

        <div class="row">
            <div class="scontent-wrapper bg-img">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
            <div class="col-md-6">
                <form action="/search-project" method="GET">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari berdasarkan no fppp" name="search">
                        <button class="btn btn-outline-success" type="submit">Cari</button>
                    </div>
                </form>
            </div>
            <div class="view">
                <div class="wrapper">
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <tr class="text-center">
                            <th class="sticky-col first-col bg-white" >No. </th>
                            <th class="sticky-col second-col bg-white width" >No. FPPP</th>
                            <th class="sticky-col third-col bg-white" >Tgl. Terima FPPP</th>
                            <th>Deadline</th>
                            <th>Project</th>
                            <th>Luar/Dalam Kota</th>
                            <th>Warna</th>
                            <th>Sales</th>
                            <th>SM</th>
                            <th>No. Co/Quo</th>
                            <th>Total OP</th>
                            <th>Total Unit</th>
                            <th>Unit Hold/Revisi/Cancel</th>
                            <th>Proses Alumunium</th>
                            <th>Proses Aksesoris</th>
                            <th>Proses Kaca</th>
                            <th>Proses Lembaran</th>
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
                        @foreach ($monitoringPerProject as $key => $mPP)
                            <tr class="text-center">
                                <td class="sticky-col first-col bg-white" >{{ $key+1 }}</td>
                                <td class="sticky-col second-col bg-white width" ><a href="/monitoringperunit/{{ $mPP['id'] }}" class="nav-link"><button type="button" class="btn btn-info btn-icon"><i class="mdi mdi-magnify"></i></button> {{ $mPP['no_fppp'] }}</a></td>
                                <td class="sticky-col third-col bg-white" >{{ $mPP['tgl_terima_fppp'] }}</td>
                                <td>{{ $mPP['deadline'] }}</td>
                                <td>{{ $mPP['project'] }}</td>
                                <td>{{ $mPP['luar/dalamKota'] }}</td>
                                <td>{{ $mPP['warna'] }}</td>
                                <td>{{ $mPP['sales'] }}</td>
                                <td>{{ $mPP['sm'] }}</td>
                                <td>{{ $mPP['no_quo'] }}</td>
                                <td>{{ $mPP['total_op'] }}</td>
                                <td>{{ $mPP['total_unit'] }}</td>
                                <td>{{ $mPP['unit_hold_revisi_cancel'] }}</td>
                                <td>{{ $mPP['proses_alumunium'] }}</td>
                                <td>{{ $mPP['proses_aksesoris'] }}</td>
                                <td>{{ $mPP['proses_kaca'] }}</td>
                                <td>{{ $mPP['proses_lembaran'] }}</td>
                                <td>{{ $mPP['cutting'] }}</td>
                                <td>{{ $mPP['machining'] }}</td>
                                <td>{{ $mPP['assembly'] }}</td>
                                <td>{{ $mPP['qc'] }}</td>
                                <td>{{ $mPP['packing'] }}</td>
                                <td>{{ $mPP['delivery'] }}</td>
                                <td>{{ $mPP['acc_pengiriman_finance'] }}</td>
                                <td>{{ $mPP['unit_belum_kirim'] }}</td>
                                <td>{{ $mPP['unit_terkirim'] }}</td>
                                <td>{{ $mPP['tgl_kirim_awal'] }}</td>
                                <td>{{ $mPP['tgl_kirim_akhir'] }}</td>
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
</div>
</div>
</div>


@endsection

@push('script')
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <!-- End custom js for this page -->
@endpush