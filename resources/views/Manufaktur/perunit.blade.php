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
                                            <td>11 Februari 2022</td> 
                                        </tr> 
                                        <tr> 
                                            <td>No. FPPP</td> 
                                            <td>:</td> 
                                            <td>02/FPPP/AST/02/2022</td> 
                                        </tr> 
                                        <tr> 
                                            <td>Deadline</td> 
                                            <td>:</td> 
                                            <td>21 Maret 2022</td> 
                                        </tr> 
                                </table> 
                                <table>
                                        <tr> 
                                            <td>Nama Proyek</td> 
                                            <td>:</td> 
                                            <td>Bina Bakti(PT. Kencana) Astral</td> 
                                        </tr>
                                        <tr> 
                                            <td>Aplikator</td> 
                                            <td>:</td> 
                                            <td>PT.Kencana</td> 
                                        </tr> 
                                        <tr> 
                                            <td>Luar/Dalam Kota</td> 
                                            <td>:</td> 
                                            <td>Depok</td> 
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
                           <th>User MAchining</th> 
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
                        <tr class="text-center"> 
                            <td>1</td> 
                            <td>AW4</td> 
                            <td>AW4.1</td> 
                            <td>Allure Black Mate</td> 
                            <td>-</td> 
                            <td>Terkirim</td> 
                            <td>Astral Top Hug Window (SG-SB)</td> 
                            <td>EXCLUDE 6mm</td> 
                            <td>16 Februari 2022</td> 
                            <td>05 Maret 2022</td> 
                            <td>05 Maret 2022</td> 
                            <td>05 Maret 2022</td> 
                            <td>-</td> 
                            <td>-</td> 
                            <td>-</td> 
                            <td>08 Maret 2022</td> 
                            <td>Budi</td> 
                            <td>Lunas</td> 
                            <td>-</td> 
                            <td>09 Maret 2022</td> 
                            <td>Sugeng</td> 
                            <td>10 Maret 2022</td> 
                            <td>Andi</td> 
                            <td>Arno</td> 
                            <td>13 Maret 2022</td> 
                            <td>Frans</td> 
                            <td>-</td> 
                            <td>-</td> 
                            <td>14 Maret 2022</td> 
                            <td>1</td> 
                            <td>Farhan</td> 
                            <td>22 Maret 2022</td> 
                            <td>SJAST2022030412</td> 
                        </tr> 
                        <tr class="text-center"> 
                            <td>1</td> 
                            <td>AW4</td> 
                            <td>AW4.2</td> 
                            <td>Allure Black Mate</td> 
                            <td>-</td> 
                            <td>Terkirim</td> 
                            <td>Astral Top Hug Window (SG-SB)</td> 
                            <td>EXCLUDE 6mm</td> 
                            <td>16 Februari 2022</td> 
                            <td>05 Maret 2022</td> 
                            <td>05 Maret 2022</td> 
                            <td>05 Maret 2022</td> 
                            <td>-</td> 
                            <td>-</td> 
                            <td>-</td> 
                            <td>08 Maret 2022</td> 
                            <td>Budi</td> 
                            <td>Lunas</td> 
                            <td>-</td> 
                            <td>09 Maret 2022</td> 
                            <td>Sugeng</td> 
                            <td>10 Maret2022</td> 
                            <td>Andi</td> 
                            <td>Arno</td> 
                            <td>13 Maret 2022</td> 
                            <td>Frans</td> 
                            <td>-</td> 
                            <td>-</td> 
                            <td>14 Maret 2022</td> 
                            <td>1</td> 
                            <td>Farhan</td> 
                            <td>22 Maret 2022</td> 
                            <td>SJAST2022030412</td> 
                        </tr> 
                        <tr class="text-center"> 
                            <td>1</td> 
                            <td>AW4</td> 
                            <td>AW4.3</td> 
                            <td>Allure Black Mate</td> 
                            <td>-</td> 
                            <td>Terkirim</td> 
                            <td>Astral Top Hug Window (SG-SB)</td> 
                            <td>EXCLUDE 6mm</td> 
                            <td>16 Februari 2022</td> 
                            <td>05 Maret 2022</td> 
                            <td>05 Maret 2022</td> 
                            <td>05 Maret 2022</td> 
                            <td>-</td> 
                            <td>-</td> 
                            <td>-</td> 
                            <td>08 Maret 2022</td> 
                            <td>Budi</td> 
                            <td>Lunas</td> 
                            <td>-</td> 
                            <td>09 Maret 2022</td> 
                            <td>Sugeng</td> 
                            <td>10 Maret 2022</td> 
                            <td>Andi</td> 
                            <td>Arno</td> 
                            <td>13 Maret 2022</td> 
                            <td>Frans</td> 
                            <td>-</td> 
                            <td>-</td> 
                            <td>14 Maret 2022</td> 
                            <td>1</td> 
                            <td>Farhan</td> 
                            <td>22 Maret 2022</td> 
                            <td>SJAST2022030412</td> 
                        </tr> 
                        <tr class="text-center"> 
                            <td>1</td> 
                            <td>AW4</td> 
                            <td>AW4.4</td> 
                            <td>Allure Black Mate</td> 
                            <td>-</td> 
                            <td>Terkirim</td> 
                            <td>Astral Top Hug Window (SG-SB)</td> 
                            <td>EXCLUDE 6mm</td> 
                            <td>16 Februari 2022</td> 
                            <td>05 Maret 2022</td> 
                            <td>05 Maret 2022</td> 
                            <td>05 Maret 2022</td> 
                            <td>-</td> 
                            <td>-</td> 
                            <td>-</td> 
                            <td>08 Maret 2022</td> 
                            <td>Budi</td> 
                            <td>Lunas</td> 
                            <td>-</td> 
                            <td>09 Maret 2022</td> 
                            <td>Sugeng</td> 
                            <td>10 Maret 2022</td> 
                            <td>Andi</td> 
                            <td>Arno</td> 
                            <td>13 Maret 2022</td> 
                            <td>Frans</td> 
                            <td>-</td> 
                            <td>-</td> 
                            <td>14 Maret 2022</td> 
                            <td>1</td> 
                            <td>Farhan</td> 
                            <td>22 Maret 2022</td> 
                            <td>SJAST2022030412</td> 
                        </tr> 
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