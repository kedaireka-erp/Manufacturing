@extends('layouts.admin')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/logistic/main.css') }}">
@endpush

@section('content')
    <div class="content-wrapper bg-img">
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
                                <a href="#" class="btn btn-info h-100 d-flex align-items-center">Buat Surat Jalan <i
                                        class="mdi mdi-plus ms-1"></i> </a>
                            </div>
                        </div>
                        <table class="table table-striped text-center mb-3">
                            <thead>
                                <tr>
                                    <th> No. Surat Jalan </th>
                                    <th> No. FPPP </th>
                                    <th> No. Quatation </th>
                                    <th> Tgl Pengiriman </th>
                                    <th> Jml Unit </th>
                                    <th> Driver </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>130/AST/03/2022</td>
                                    <td>528/order/02/2022</td>
                                    <td>IM 068/ALP/01022022</td>
                                    <td>2022/03/01</td>
                                    <td>8</td>
                                    <td>Irwan</td>
                                    <td class="d-flex justify-content-around">
                                        <div class="btn btn-success" title="View">
                                            <i class="mdi mdi-eye"></i>
                                        </div>
                                        <div class="btn btn-primary" title="Download">
                                            <i class="mdi mdi-download"></i>
                                        </div>
                                        <div class="btn btn-danger" title="Delete">
                                            <i class="mdi mdi-delete"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>130/AST/03/2022</td>
                                    <td>528/order/02/2022</td>
                                    <td>IM 068/ALP/01022022</td>
                                    <td>2022/03/01</td>
                                    <td>8</td>
                                    <td>Irwan</td>
                                    <td class="d-flex justify-content-around">
                                        <div class="btn btn-success" title="View">
                                            <i class="mdi mdi-eye"></i>
                                        </div>
                                        <div class="btn btn-primary" title="Download">
                                            <i class="mdi mdi-download"></i>
                                        </div>
                                        <div class="btn btn-danger" title="Delete">
                                            <i class="mdi mdi-delete"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>130/AST/03/2022</td>
                                    <td>528/order/02/2022</td>
                                    <td>IM 068/ALP/01022022</td>
                                    <td>2022/03/01</td>
                                    <td>8</td>
                                    <td>Irwan</td>
                                    <td class="d-flex justify-content-around">
                                        <div class="btn btn-success" title="View">
                                            <i class="mdi mdi-eye"></i>
                                        </div>
                                        <div class="btn btn-primary" title="Download">
                                            <i class="mdi mdi-download"></i>
                                        </div>
                                        <div class="btn btn-danger" title="Delete">
                                            <i class="mdi mdi-delete"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>130/AST/03/2022</td>
                                    <td>528/order/02/2022</td>
                                    <td>IM 068/ALP/01022022</td>
                                    <td>2022/03/01</td>
                                    <td>8</td>
                                    <td>Irwan</td>
                                    <td class="d-flex justify-content-around">
                                        <div class="btn btn-success" title="View">
                                            <i class="mdi mdi-eye"></i>
                                        </div>
                                        <div class="btn btn-primary" title="Download">
                                            <i class="mdi mdi-download"></i>
                                        </div>
                                        <div class="btn btn-danger" title="Delete">
                                            <i class="mdi mdi-delete"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>130/AST/03/2022</td>
                                    <td>528/order/02/2022</td>
                                    <td>IM 068/ALP/01022022</td>
                                    <td>2022/03/01</td>
                                    <td>8</td>
                                    <td>Irwan</td>
                                    <td class="d-flex justify-content-around">
                                        <div class="btn btn-success" title="View">
                                            <i class="mdi mdi-eye"></i>
                                        </div>
                                        <div class="btn btn-primary" title="Download">
                                            <i class="mdi mdi-download"></i>
                                        </div>
                                        <div class="btn btn-danger" title="Delete">
                                            <i class="mdi mdi-delete"></i>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <nav aria-label="Page pagination ">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <span class="page-link"> <i class="mdi mdi-chevron-left"></i></span>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item" aria-current="page">
                                    <span class="page-link">2</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"> <i class="mdi mdi-chevron-right"></i> </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
