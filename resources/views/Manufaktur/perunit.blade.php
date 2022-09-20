@extends('layouts.admin')
@section('content')
<div class="content-wrapper bg-img">
            <div class="shadow p-3 mb-3 bg-body rounded">Monitoring Per Unit
            <h5 class="float-end"><a href="#" class="text-secondary">Manufaktur</a> / <a href="#" class="text-primary">Monitoring</a></h5>
            </div>

        <div class="row">
            <div class="scontent-wrapper bg-img">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex gap-5"> 
                                <div class="d-flex gap-5"> 
                                    <table> 
                                        <tr> 
                                            <td>Tanggal Terima</td> 
                                            <td>:</td> 
                                            <td>{{ $FPPP->created_at }}</td> 
                                        </tr> 
                                        <tr> 
                                            <td>No. FPPP</td> 
                                            <td>:</td> 
                                            <td>{{ $FPPP->FPPP_number }}</td> 
                                        </tr> 
                                        <tr> 
                                            <td>Deadline</td> 
                                            <td>:</td> 
                                            <td>{{ $FPPP->retrieval_deadline }}</td> 
                                        </tr> 
                                </table> 
                                <table>
                                        <tr> 
                                            <td>Nama Proyek</td> 
                                            <td>:</td> 
                                            <td>{{ $FPPP->project_name }}</td> 
                                        </tr>
                                        <tr> 
                                            <td>Aplikator</td> 
                                            <td>:</td> 
                                            <td>{{ $FPPP->applicator_name }}</td> 
                                        </tr> 
                                        <tr> 
                                            <td>Luar/Dalam Kota</td> 
                                            <td>:</td> 
                                            <td>belum ada kolom db</td> 
                                        </tr> 
                                 </table> 
                                 
                                </div> 
                            </div>
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
                            <th>Kode OP</th> 
                           <th>Kode Unit</th> 
                           <th>Warna</th> 
                           <th>Hold/Cancel/Revisi</th> 
                           <th>Last Process</th> 
                           <th>Tipe Barang</th> 
                           <th>Jenis Kaca</th> 
                           <th>Upload BOM Alumunium</th> 
                           <th>Upload BOM Aksesoris</th>
                           <th>Upload WO Alumunium</th> 
                           <th>Upload WO Lembaran</th> 
                           <th>Upload Wo Kaca</th> 
                           <th>Tanggal Proses Kaca</th> 
                           <th>User Kaca</th> 
                           <th>Tanggal Cutting</th> 
                           <th>User Cutting</th> 
                           <th>Proses Cutting</th> 
                           <th>Keterangan</th> 
                           <th>Tanggal Machining</th> 
                           <th>User Machining</th> 
                           <th>Tanggal Assembly</th> 
                           <th>User Assembly</th> 
                           <th>Subkon Assembly</th> 
                           <th>Finish QC</th> 
                           <th>User QC</th> 
                           <th>Tanggal Reject</th> 
                           <th>Alasan Reject</th> 
                           <th>Tanggal Pack</th> 
                           <th>Qty Pack</th> 
                           <th>User PAck</th> 
                           <th>Tanggal Kirim</th> 
                           <th>No.Surat Jalan</th> 
                        </tr>
                        @foreach ($MPU as $key => $MP)
                            <tr class="text-center"> 
                                <td>{{ $key+1 }}</td> 
                                <td>{{ $MP['kode_op'] }}</td> 
                                <td>{{ $MP['kode_unit'] }}</td> 
                                <td>{{ $MP['warna'] }}</td> 
                                <td>
                                    tombol
                                </td> 
                                <td>{{ $MP['last_process'] }}</td> 
                                <td>{{ $MP['tipe_barang'] }}</td> 
                                <td>{{ $MP['jenis_kaca'] }}</td> 
                                <td>{{ $MP['upload_bom_alumunium'] }}</td> 
                                <td>{{ $MP['upload_bom_aksesoris'] }}</td> 
                                <td>{{ $MP['upload_wo_alumunium'] }}</td> 
                                <td>{{ $MP['upload_wo_lembaran'] }}</td> 
                                <td>{{ $MP['upload_wo_kaca'] }}</td> 
                                <td>{{ $MP['tanggal_proses_kaca'] }}</td> 
                                <td>{{ $MP['user_kaca'] }}</td> 
                                <td>{{ $MP['tanggal_cutting'] }}</td> 
                                <td>{{ $MP['user_cutting'] }}</td> 
                                <td>{{ $MP['proses_cutting'] }}</td> 
                                <td>{{ $MP['keterangan'] }}</td> 
                                <td>{{ $MP['tanggal_machining'] }}</td> 
                                <td>{{ $MP['user_machining'] }}</td> 
                                <td>{{ $MP['tanggal_assembly'] }}</td> 
                                <td>{{ $MP['user_assembly'] }}</td> 
                                <td>{{ $MP['subkon_assembly'] }}</td> 
                                <td>{{ $MP['finish_qc'] }}</td> 
                                <td>{{ $MP['subkon_qc'] }}</td> 
                                <td>tanggal reject</td> 
                                <td>{{ $MP['alasan_qc'] }}</td> 
                                <td>{{ $MP['tanggal_pack'] }}</td> 
                                <td>{{ $MP['qty_pack'] }}</td> 
                                <td>{{ $MP['user_pack'] }}</td> 
                                <td>{{ $MP['tanggal_kirim'] }}</td> 
                                <td>{{ $MP['no_surat_jalan'] }}</td> 
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