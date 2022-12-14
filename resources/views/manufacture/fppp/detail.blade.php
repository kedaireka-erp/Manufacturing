@extends('layouts.admin')
@section('content')
{{-- <div class="content-wrapper bg-img"> --}}
            {{-- <div class="shadow p-3 mb-3 bg-body rounded">Detail FPPP
            <h5 class="float-end"><a href="#" class="text-secondary">Manufaktur</a> /<a href="#" class="text-secondary">FPPP</a>/ <a href="#" class="text-primary">Detail FPPP</a></h5>
            </div> --}}

            <div class="content-wrapper bg-img">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-table-header">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <h2 class="card-title mb-0">Detail FPPP</h2>
                                <h5 class="card-bredcrumb mb-0"><a href="#" class="text-secondary">Manufaktur / </a><a href="/manufactures" class="text-secondary">FPPP / </a><a
                                        href="#" class="text-primary">Detail FPPP</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
        <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                            <a class="btn btn-info btn-fw" href="{{ route("manufactures.detail.pdf",$manufacture) }}">Download File <i class="mdi mdi-download"></i></a>
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
                                    <td>{{ $manufacture->quotation->nama_proyek}}</td> 
                                </tr> 
                                <tr> 
                                    <td>Alamat Proyek</td> 
                                    <td>{{ $manufacture->quotation->alamat_proyek}}</td> 
                                </tr> 
                                <tr> 
                                    <td>Sales/Site Manager</td> 
                                    <td>-</td>
                                    <td>Koordinator</td> 
                                    <td>Clivia</td>  
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
                        <div class=""> 
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
                                    <td>{{ $kodeItems }}</td> 
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
                        <div class=""> 
                            <h2>PENGIRIMAN</h2> 
                            <table class="table table-bordered table-hover"> 
                            <thead> 
                            </thead> 
                            <tbody> 
                                {{-- <tr> 
                                    <td>Jenis Pengiriman</td> 
                                    <td>Luar Kota(Ini tidak jadi?)</td> 
                                </tr>  --}}
                                <tr> 
                                    <td>Deadline</td> 
                                    <td>{{ \Carbon\Carbon::parse($manufacture->retrival_deadline)->translatedFormat('d F Y') }}</td> 
                                </tr> 
                                {{-- <tr> 
                                    <td>Ditujukan Kepada</td> 
                                    <td>Andi(Dummy)</td> 
                                </tr>  --}}
                                {{-- <tr> 
                                    <td>No. Telepon Tujuan</td> 
                                    <td>089234567890(dummy)</td> 
                                </tr>  --}}
                                {{-- <tr> 
                                    <td>Nama & Alamat Ekspedisi</td> 
                                    <td>Andi, Jl. Kebun Jeruk 36 Jakarta Timur (Dummy)</td> 
                                </tr>  --}}
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
                     
                        <div class="">
                            <h2>PENGIRIMAN</h2> 
        <table class="" style="border: 1px #eaea solid"> 
            <thead style="border: 1px #eaea solid"> 
                <tr class="text-center"> 
                    <th scope="col">No.</th> 
                    <th scope="col">Code Item</th> 
                    <th scope="col">Item</th> 
                    <th scope="col">Glass Speification</th> 
                    {{-- <th scope="col">Leaves</th> 
                    <th scope="col">Opening Direct</th>  --}}
                    <th scope="col">Finish</th> 
                    <th scope="col">Marketing Approval</th> 
                </tr> 
            </thead> 
            <tbody style="border: 1px #eaea solid">
                @foreach ($workOrders as $no => $wo)
                    <tr style="background-color: #eaeaea" class="text-center
                    @if($no%2 == 0)
                    bg-white
                    @endif
                    "> 
                    <td>0{{ $no+1 }}</td> 
                    <td class="p-4">{{ $wo->kode_unit }}</td> 
                    <td class="p-4">{{ $wo->nama_item }}</td> 
                    <td class="p-4">{{ $manufacture->glass }} {{ $manufacture->glass_type }}</td> 
                    {{-- <td class="p-4">1(Dummy)</td> 
                    <td class="p-4">Outsite(Dummy)</td>  --}}
                    <td class="p-4">{{ $manufacture->color }}</td> 
                    <td class="p-4"></td> 
                </tr>
                @endforeach 
                
            </tbody> 
        </table> 
        </div> 

                        


        </div>

{{-- </div> --}}
</div>
</div>
</div>


@endsection

@push('script')
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <!-- End custom js for this page -->
@endpush
