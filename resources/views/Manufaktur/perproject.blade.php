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
                    <tr class="text-center">
                        <td>1</td>
                        <td><button type="button" class="btn btn-info btn-icon"><i class="mdi mdi-magnify"></i></button> 021/FPPP/AST/02/2022</td>
                        <td>11/02/2022</td>
                        <td>21/03/2022</td>
                        <td>Bina Bakti (PT Kencana) Astral</td>
                        <td>Jakarta</td>
                        <td>Allure Black Matte</td>
                        <td>-</td>
                        <td>-</td>
                        <td>529/FPPP/AST/03/2022</td>
                        <td>13</td>
                        <td>86</td>
                        <td>10</td>
                        <td>15/02/2022</td>
                        <td>20/02/2022</td>
                        <td>20</td>
                        <td>02/03/2022</td>
                        <td>20</td>
                        <td>16</td>
                        <td>10</td>
                        <td>15</td>
                        <td>5</td>
                        <td>10</td>
                        <td>05/03/2022</td>
                        <td>20</td>
                        <td>56</td>
                        <td>07/03/2022</td>
                        <td>20/03/2022</td>
                        <td>
                            <button type="button" class="btn btn-gradient-warning" disabled>PARSIAL</button>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>2</td>
                        <td><button type="button" class="btn btn-info btn-icon"><i class="mdi mdi-magnify"></i></button> 037/FPPP/AST/06/2022</td>
                        <td>14/06/2022</td>
                        <td>01/08/2022</td>
                        <td>Raffles (CV Allutech) Surabaya Astral</td>
                        <td>Surabaya</td>
                        <td>Sand Black Metallic</td>
                        <td>-</td>
                        <td>-</td>
                        <td>529/FPPP/AST/03/2022</td>
                        <td>6</td>
                        <td>6</td>
                        <td>2</td>
                        <td>22/02/2022</td>
                        <td>15/03/2022</td>
                        <td>4</td>
                        <td>15/04/2022</td>
                        <td>2</td>
                        <td>1</td>
                        <td>0</td>
                        <td>1</td>
                        <td>0</td>
                        <td>0</td>
                        <td>01/06/2022</td>
                        <td>2</td>
                        <td>4</td>
                        <td>03/06/2022</td>
                        <td>15/06/2022</td>
                        <td>
                            <button type="button" class="btn btn-gradient-warning" disabled>PARSIAL</button>
                        </td>
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