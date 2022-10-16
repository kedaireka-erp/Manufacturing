@extends('layouts.admin')
@section('content')
<div class="content-wrapper bg-img">
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-table-header">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h2 class="card-title mb-0">Dashboard</h2>
                    <h5 class="card-bredcrumb mb-0"><a href="#" class="text-primary">Dashboard</a></h5>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="col-12 stretch-card grid-margin">
        <div class="card bg-gradient-primary card-img-holder text-white">
            <div class="card-body">
                <img src="assets/images/welcome.svg" class="card-img-absolute" alt="welcome">
                <h2 class="mb-2" style="color: black;">Selamat Datang, Alfat Mutoriq!</h2>
                <h4 class="card-text" style="color: black;">Sistem Manufacture Astral Allumunium System</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-6 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                            <h4 class="font-weight-normal mb-3"><i class="mdi mdi-account mdi-24px float-right"></i>
                                Jumlah Subkon
                            </h4>
                            <h2 class="mb-4 mt-4 text-center">10</h2>
                            <a>Lihat Detail <i class="mdi mdi-chevron-right"></i> </a>
                        </div>
                    </div>
                </div>



                <div class="col-6 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                            <h4 class="font-weight-normal mb-3"><i class="mdi mdi-account mdi-24px float-right"></i>
                                Jumlah Lead
                            </h4>
                            <h2 class="mb-4 mt-4 text-center">8</h2>
                            <a>Lihat Detail <i class="mdi mdi-chevron-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                            <h4 class="font-weight-normal mb-3"><i
                                    class="mdi mdi-file-document mdi-24px float-right"></i> Jumlah FPPP
                            </h4>
                            <h2 class="mb-4 mt-4 text-center">23</h2>
                            <a>Lihat Detail <i class="mdi mdi-chevron-right"></i> </a>
                        </div>
                    </div>
                </div>



                <div class="col-6 stretch-card grid-margin">
                    <div class="card bg-gradient-info card-img-holder text-white">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                            <h4 class="font-weight-normal mb-5"><i
                                    class="mdi mdi-book-open-variant mdi-24px float-right"></i> Panduan
                            </h4>
                            <a>Lihat Detail <i class="mdi mdi-chevron-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- chart --}}
        <div class="col-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                            <h4 class="card-title">Total Item</h4>
                            <h2>1000</h2>

                        <li class="list-group-item">
                        </li>
                        <br>
                        <br>
                        <br>
                          <div>
                            <canvas id="pieChart"></canvas>
                          </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

@push('script')
<!-- Custom js for this page -->
<script src="{{ asset('assets/js/chart.js') }}"></script>
<!-- End custom js for this page -->
@endpush