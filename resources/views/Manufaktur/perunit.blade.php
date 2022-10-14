@extends('layouts.admin')
@push("style")
<link rel="stylesheet" href="{{ asset('style.css')}}">
@endpush
@section('content')
<div class="content-wrapper bg-img">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-table-header">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h2 class="card-title mb-0">Monitoring Per Unit</h2>
                    <h5 class="card-bredcrumb mb-0"><a href="#" class="text-secondary">Manufaktur / </a><a href="/monitoring" class="text-secondary">Monitoring Per Project / </a><a
                            href="#" class="text-primary">Monitoring Per Unit</a></h5>
                </div>
            </div>
        </div>
    </div>
    <br>
            {{-- <div class="shadow p-3 mb-3 bg-body rounded">Monitoring Per Unit
            <h5 class="float-end"><a href="#" class="text-secondary">Manufaktur</a> / <a href="#" class="text-primary">Monitoring</a></h5>
            </div> --}}

        <div class="row">
            <div class="scontent-wrapper bg-img">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex gap-5">
                                <div class="d-flex gap-5">
                                    <table class="table table-borderless">
                                        @foreach ($fppp as $fp)
                                            <tr>
                                                <td>Tanggal Terima</td>
                                                <td>:</td>
                                                <td>{{ date("d/m/Y", strtotime($fp->tanggalTerimaFppp) + 25200) . " " . date("H:i", strtotime($fp->tanggalTerimaFppp) + 25200) }}</td>
                                                <td></td>
                                                <td width=180>Nama Proyek</td>
                                                <td>:</td>
                                                <td width=300>{{ $fp->nama_proyek }}</td>
                                            </tr>
                                            <tr>
                                                <td>No. FPPP</td>
                                                <td>:</td>
                                                <td>{{ $fp->fppp_no }}</td>
                                                <td></td>
                                                <td>Aplikator</td>
                                                <td>:</td>
                                                <td>{{ $fp->aplikator }}</td>
                                            </tr>
                                            <tr>
                                                <td>Deadline</td>
                                                <td>:</td>
                                                <td>{{ date("d/m/Y", strtotime($fp->deadline) + 25200) . " " . date("H:i", strtotime($fp->deadline) + 25200) }}</td>
                                            </tr>
                                    @endforeach
                                 </table>

                                </div>
                            </div>
            <div class="col-md-6 mt-2">

                <form action="/search-unit/{{ $fppps->id }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari berdasarkan kode unit" name="search">
                        <button class="btn btn-outline-success" type="submit">Cari</button>
                    </div>
                </form>

            </div>
            <div class="">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr class="text-center">
                           <th class="sticky-col first-col bg-white">No. </th>
                           <th class="sticky-col second-col bg-white">Kode OP</th>
                           <th class="sticky-col third-col bg-white">Kode Unit</th>
                           <th>Warna</th>
                           <th>Hold/Cancel/Revisi</th>
                           <th>Last Process</th>
                           <th>Tipe Barang</th>
                           <th>Jenis Kaca</th>
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
                           <th>User Pack</th>
                           <th>Tanggal Kirim</th>
                           <th>No.Surat Jalan</th>
                        </tr>
                        @foreach ($wo as $key => $w)
                        <tr class="text-center">
                           <td class="sticky-col first-col bg-white">{{ $key+1 }}</td>
                           <td class="sticky-col second-col bg-white">{{ $w->kode_op }}</td>
                           <td class="sticky-col third-col bg-white">{{ $w->kode_unit }}</td>
                           <td>{{ $w->warna }}</td>
                           <td>@if ($w->status_hold == null)
                               {{ "-" }}
                           @else
                               {{ Str::ucfirst($w->status_hold) }}
                           @endif</td>
                           <td>{{ Str::ucfirst($w->last_process) }}</td>
                           <td>{{ Str::ucfirst($w->nama_item) }}</td>
                           <td>{{ Str::ucfirst($w->jenis_kaca) }}</td>
                           <td>
                                @if ($w->tanggal_kaca != null)
                                    {{ $w->tanggal_kaca }}
                                @else
                                    {{ "-" }}
                                @endif
                            </td>
                           <td>{{ Str::ucfirst($w->user_kaca) }}</td>
                           <td>
                            @if ($w->tanggal_cutting == null)
                               {{ "-" }}
                            @else
                                {{ date("d/m/Y", strtotime($w->tanggal_cutting) + 25200) . " " . date("H:i", strtotime($w->tanggal_cutting) + 25200) }}
                            @endif
                           </td>
                           <td>
                            @if ($w->subkon1_cutting == null)
                                {{ "-" }}
                            @else
                                {{ Str::ucfirst($w->subkon1_cutting) }}
                            @endif
                            </td>
                           <td>
                            @if ($w->proses_cutting == null)
                                {{ "-" }}
                            @else
                                {{ Str::ucfirst($w->proses_cutting) }}
                            @endif
                           </td>
                           <td>
                            @if ($w->proses_cutting == null)
                                {{ "-" }}
                            @else
                                {{ Str::ucfirst($w->proses_cutting) }}
                            @endif
                           </td>
                           <td>
                            @if ($w->tanggal_machining == null)
                                {{ "-" }}
                            @else
                                {{ date("d/m/Y", strtotime($w->tanggal_machining) + 25200) . " " . date("H:i", strtotime($w->tanggal_machining) + 25200) }}
                            @endif
                           </td>
                           <td>
                            @if ($w->subkon1_machining == null)
                                {{ "-" }}
                            @else
                                {{ Str::ucfirst($w->subkon1_machining) }}
                            @endif
                           </td>
                           <td>
                            @if ($w->tanggal_assembly1 == null)
                                {{ "-" }}
                            @else
                                {{ date("d/m/Y", strtotime($w->tanggal_assembly1) + 25200) . " " . date("H:i", strtotime($w->tanggal_assembly1) + 25200) }}
                            @endif
                           </td>
                           <td>
                            @if ($w->subkon1_assembly1 == null)
                                {{ "-" }}
                            @else
                                {{ Str::ucfirst($w->subkon1_assembly1) }}
                            @endif
                           </td>
                           <td>
                            @if ($w->subkon2_assembly1 == null)
                                {{ "-" }}
                            @else
                                {{ Str::ucfirst($w->subkon2_assembly1) }}
                            @endif
                           </td>
                           <td>
                                @if ($w->tanggalFinishQC != null)
                                    {{ $w->tanggalFinishQC }}
                                @else
                                    {{ "-" }}
                                @endif
                            </td>
                           <td>
                            @if ($w->subkon_qcs == null)
                                {{ "-" }}
                            @else
                                {{ Str::ucfirst($w->subkon_qcs) }}
                            @endif
                           </td>
                           <td>
                            @if ($w->tanggalReject)
                                {{ $w->tanggalReject }}
                            @else
                                {{ "-" }}
                            @endif
                           </td>
                           <td>{{ Str::ucfirst($w->alasanReject) }}</td>
                           <td>
                            @if ($w->tanggal_packing == null)
                                {{ "-" }}
                            @else
                                {{ date("d/m/Y", strtotime($w->tanggal_packing) + 25200) . " " . date("H:i", strtotime($w->tanggal_packing) + 25200) }}
                            @endif
                           </td>
                           <td>
                            @if ($w->qty_packing == null)
                                {{ "-" }}
                            @else
                                {{ $w->qty_packing }}
                            @endif
                           </td>
                           <td>
                            @if ($w->subkon1_packing == null)
                                {{ "-" }}
                            @else
                                {{ Str::ucfirst($w->subkon1_packing) }}
                            @endif
                           </td>
                           <td>
                            @if ($w->tanggal_kirim == null)
                                {{ "-" }}
                            @else
                                {{ date("d/m/Y", strtotime($w->tanggal_kirim) + 25200) . " " . date("H:i", strtotime($w->tanggal_kirim) + 25200) }}
                            @endif
                           </td>
                           <td>
                            @if ($w->no_surat_jalan == null)
                                {{ "-" }}
                            @else
                                {{ $w->no_surat_jalan }}
                            @endif
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
