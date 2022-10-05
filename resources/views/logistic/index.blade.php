@extends('layouts.admin')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/logistic/main.css') }}">
@endpush

@section('content')
    <div class="content-wrapper bg-img">
        @include('sweetalert::alert')

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-table-header">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h2 class="card-title mb-0">Surat Jalan</h2>
                        <h5 class="card-bredcrumb mb-0"><a href="#" class="text-secondary">Manufaktur / </a><a
                                href="#" class="text-primary">Surat Jalan</a></h5>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header__wrapper d-flex justify-content-between">
                            <div class="search d-flex align-items-center position-relative">
                                <i class="mdi mdi-magnify position-absolute"></i>
                                <input type="text" class="form-control" placeholder="Cari ...">
                            </div>
                            <div>
                                <a href="{{ route('logistic_create') }}"
                                    class="btn btn-info h-100 d-flex align-items-center">Buat Surat Jalan <i
                                        class="mdi mdi-plus ms-1"></i> </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped text-center mb-3">
                                <thead>
                                    <tr>
                                        <th> No. Surat Jalan </th>
                                        <th> No. FPPP </th>
                                        <th> No. Quotation </th>
                                        <th> Tgl Pengiriman </th>
                                        <th> Jml Unit </th>
                                        <th> Driver </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getLogistics as $data)
                                        <tr>
                                            <td>{{ $data->no_logistic }}</td>
                                            <td>{{ $data->FPPP_no }}</td>
                                            <td>
                                                @foreach ($getQuotations as $quotation)
                                                    @if ($quotation->fppp_id === $data->fppp_id)
                                                        {{ $quotation->no_quotation }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ date('d/m/Y', strtotime($data->tgl_berangkat)) }}</td>
                                            <td>
                                                @foreach ($getQtyPacking as $qty)
                                                    @if ($data->id === $qty->l_id)
                                                        {{ $qty->total }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $data->driver }}</td>
                                            <td class="d-flex justify-content-around">
                                                <a href="{{ route('logistic_show', $data->id) }}" class="btn btn-success"
                                                    title="View">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                                <div class="btn btn-primary" title="Download">
                                                    <i class="mdi mdi-download"></i>
                                                </div>

                                                <form action="{{ route('logistic_destroy', $data->id) }}" method="post">
                                                    {{-- @csrf --}}
                                                    {{-- @method('DELETE') --}}
                                                    <a href="{{ route('logistic_destroy', $data->id) }}"
                                                        class="btn btn-danger" title="Delete">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                    {{-- </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- pagination --}}
                        {{ $getLogistics->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
