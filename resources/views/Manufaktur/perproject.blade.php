@extends('layouts.admin')
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
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari.." name="search">
                  
                    </div>
                </form>
            </div>
            <div class="">
                <div class="table-responsive">
                <table class="table table-striped">
                    <tr class="text-center">
                        <th>No. </th>
                        <th>No. FPPP</th>
                        <th>Tgl. Terima FPPP</th>
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
                    @foreach ($monitoring as $mtr)
                        
                    <tr class="text-center">
                        <td>1</td>
                        <td><button type="button" class="btn btn-info btn-icon"><i class="mdi mdi-magnify"></i></button> {{ $mtr['no_fppp'] }}</td>
                        <td>{{ $mtr['tgl_terima_fppp'] }}</td>
                        <td>{{ $mtr['deadline'] }}</td>
                        <td>{{ $mtr['project'] }}</td>
                        <td>{{ $mtr['luar_dalam_kota'] }}</td>
                        <td>{{ $mtr["warna"] }}</td>
                        <td>{{ $mtr['sales'] }}</td>
                        <td>{{ $mtr['sm'] }}</td>
                        <td>{{ $mtr['no_co_quo'] }}</td>
                        <td>-</td>
                        <td>{{ $mtr['total_unit'] }}</td> 
                        <td>{{ $mtr['unit_hold_cancel_revisi'] }}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>{{ $mtr['jumlah_cutting'] }}</td>
                        <td>{{ $mtr['jumlah_machining'] }}</td>
                        <td>{{ $mtr['jumlah_asembly'] }}</td>
                        <td>{{ $mtr['jumlah_qc'] }}</td>
                        <td>{{ $mtr['jumlah_packing'] }}</td>
                        <td>{{ $mtr['jumlah_delivery'] }}</td>
                        <td>05/03/2022</td>
                        <td>{{ $mtr['unit_belum_kirim'] }}</td>
                        <td>{{ $mtr['unit_terkirim'] }}</td>
                        <td>07/03/2022</td>
                        <td>20/03/2022</td>
                        <td>
                            <button type="button" class="btn btn-gradient-warning" disabled>{{ $mtr['status'] }}</button>
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


@endsection

@push('script')
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <!-- End custom js for this page -->
@endpush