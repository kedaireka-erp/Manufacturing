@extends('layouts.admin')
@section('content')
<div class="content-wrapper bg-img">
            <div class="shadow p-3 mb-3 bg-body rounded">Detail FPPP
            <h5 class="float-end"><a href="#" class="text-secondary">Manufaktur</a> /<a href="#" class="text-secondary">FPPP</a>/ <a href="#" class="text-primary">Detail FPPP</a></h5>
            </div>

        <div class="row">
            <div class="scontent-wrapper bg-img">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-info btn-fw">Download File <i class="mdi mdi-download"></i></button>
                            </div>
                            <h2>DETAIL FPPP No. {{ $manufacture->fppp_no }}</h2> 
                            <table class="table table-bordered table-hover"> 
                            <thead> 
                            </thead> 
                            <tbody> 
                                <tr> 
                                    <td>Tanggal</td> 
                                    {{-- <td>Kamis, 25 Agustus 2022</td>  --}}
                                    <td>{{ \Carbon\Carbon::parse($manufacture->created_at)->translatedFormat('d F Y') }}</td>
                                    <td>Divisi</td>
                                    <td>Astral</td>
                                </tr> 
                                <tr> 
                                    <td>Aplikator</td> 
                                    <td>{{ $manufacture->quotation->Aplikator->aplikator }}</td> 
                                </tr> 
                                <tr> 
                                    <td>Nama Proyek</td> 
                                    <td>{{ $manufacture->quotation->DataQuotation->nama_proyek}}</td> 
                                </tr> 
                                <tr> 
                                    <td>Alamat Proyek</td> 
                                    <td>{{ $manufacture->quotation->DataQuotation->alamat_proyek}}</td> 
                                </tr> 
                                <tr> 
                                    <td>Sales/Site Manager</td> 
                                    <td>Wahyu(Dummy)</td>
                                    <td>Koordinator</td> 
                                    <td>Clivia(Dummy)</td>  
                                </tr> 
                                <tr> 
                                    <td>Status Order</td> 
                                    <td>{{ $manufacture->order_status }}</td> 
                                </tr> 
                                <tr> 
                                    <td>Waktu Prodeksi</td> 
                                    <td>{{ $manufacture->production_time }}</td> 
                                </tr>   
                            </tbody> 
                            <table><br> 
                        </div> 
                        <div class="container"> 
                            <h2>PAKET DATA PRODUKSI</h2> 
                            <table class="table table-bordered table-hover"> 
                            <thead> 
                            </thead> 
                            <tbody> 
                                <tr> 
                                    <td>Gambar</td> 
                                    <td>{{ $workOrders->count() }} Lembar</td> 
                                </tr> 
                                <tr> 
                                    <td>Kode Item</td> 
                                    <td>#AW4, AW5, AW6, AW7 Dummy</td> 
                                </tr> 
                                <tr> 
                                    <td>Warna</td> 
                                    <td>{{ $manufacture->color }}</td> 
                                </tr> 
                                <tr> 
                                    <td>Kaca</td> 
                                    <td>{{ $manufacture->glass }}</td> 
                                </tr> 
                                <tr> 
                                    <td>Jenis Kaca</td> 
                                    <td>{{ $manufacture->glass_type }}</td> 
                                </tr> 
                                <tr> 
                                    <td>Note</td> 
                                    <td>{{ $manufacture->note }}</td> 
                                </tr> 
                            </tbody> 
                            <table><br> 
                        </div> 
                        <div class="container"> 
                            <h2>PENGIRIMAN</h2> 
                            <table class="table table-bordered table-hover"> 
                            <thead> 
                            </thead> 
                            <tbody> 
                                <tr> 
                                    <td>Jenis Pengiriman</td> 
                                    <td>Luar Kota(Ini tidak jadi?)</td> 
                                </tr> 
                                <tr> 
                                    <td>Deadline</td> 
                                    <td>{{ \Carbon\Carbon::parse($manufacture->retrival_deadline)->translatedFormat('d F Y') }}</td> 
                                </tr> 
                                <tr> 
                                    <td>Ditujukan Kepada</td> 
                                    <td>Andi(Dummy)</td> 
                                </tr> 
                                <tr> 
                                    <td>No. Telepon Tujuan</td> 
                                    <td>089234567890(dummy)</td> 
                                </tr> 
                                <tr> 
                                    <td>Nama & Alamat Ekspedisi</td> 
                                    <td>Andi, Jl. Kebun Jeruk 36 Jakarta Timur (Dummy)</td> 
                                </tr> 
                                <tr> 
                                    <td>Pembayaran Ekspedisi</td> 
                                    <td>{{ $manufacture->delivery_to_expedition }}</td> 
                                </tr> 
                                <tr> 
                                    <td>Penggunaan Peti</td> 
                                    <td>{{ $manufacture->box_usage }}</td> 
                                </tr> 
                                <tr> 
                                    <td>Penggunaan Sealent</td> 
                                    <td>{{ $manufacture->sealant_usage }}</td> 
                                </tr> 
                                <tr> 
                                    <td>Note</td> 
                                    <td>-</td> 
                                </tr> 
                            </tbody> 
                            <table><br> 
                        </div> 
                     
                        <div class="container">
                            <h2>PENGIRIMAN</h2> 
        <table class="table table-striped"> 
            <thead> 
                <tr class="text-center"> 
                    <th scope="col">No.</th> 
                    <th scope="col">Code Item</th> 
                    <th scope="col">Item</th> 
                    <th scope="col">Glass Speification</th> 
                    <th scope="col">Leaves</th> 
                    <th scope="col">Opening Direct</th> 
                    <th scope="col">Finish</th> 
                    <th scope="col">Marketing Approval</th> 
                </tr> 
            </thead> 
            <tbody>
                @foreach ($workOrders as $no => $wo)
                    <tr class="text-center"> 
                    <td>0 {{ $no+1 }}</td> 
                    <td>{{ $wo->kode_unit }}</td> 
                    <td>{{ $wo->nama_item }}</td> 
                    <td>{{ $manufacture->glass }} {{ $manufacture->glass_type }}</td> 
                    <td>1(Dummy)</td> 
                    <td>Outsite(Dummy)</td> 
                    <td>{{ $manufacture->color }}</td> 
                    <td></td> 
                </tr>
                @endforeach 
                
            </tbody> 
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