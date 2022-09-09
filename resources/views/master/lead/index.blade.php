@extends('layouts.admin')

@section('content')
<div class="content-wrapper bg-img">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h2 class="card-title float-start">Lihat WO</h2>
                    <h5 class="float-end"><a href="#" class="text-secondary">Manufaktur</a> / <a href="#" class="text-secondary">FPPP</a>/<a href="#" class="lihatfppp">Lihat FPPP</a></h5>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            
            <!-- search -->
                    <form class="col-lg-4 my-md-0">
                        <div class="input-group" >
                            <input type="text" class="form-control bg-light border-dark-rounded" placeholder="Cari Pegawai Berdasarkan Nomor atau Nama.."
                                aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                    </form>

            <!-- Tabel -->
            <div class="table-responsive" >
            <table class="table table-striped text-center">
              <thead>
                <tr>
                  <th width="250px"> No. </th>
                  <th width="250px"> Kode Gambar </th>
                  <th width="250px"> Item </th>
                  <th  width="250px"> Glass Specification </th>
                  <th  width="250px"> Leaves </th>
                  <th  width="250px"> Opening Direct </th>
                  <th  width="250px"> Finish </th>
                  <th  width="250px"> Cutting </th>
                  <th  width="250px"> Machining </th>
                  <th  width="250px"> Assembly 1 </th>
                  <th  width="250px"> Assembly 2 </th>
                  <th  width="250px"> Assembly 3 </th>
                  <th  width="250px"> QC </th>
                  <th  width="250px"> Packing </th>
                </tr>
              </thead>
              <tbody>
                <tr class="">
                  <td> 1 </td>
                  <td> B1-001 </td>
                  <td> Astral AS 01 <br> top hung windo </td>
                  <td> clear 6mm excluded <br> <br> <a href="" class="d btn btn-success border-dark-rounded ">OK!</a>  </td>
                  <td> 1 </td>
                  <td> Outside </td>
                  <td> Allure Black Matte </td>
                   <!-- cutting button -->
                   <td>
                   <div class="dropdown">
                      <button type="button" class="d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                        Subkon 1
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                      </ul>
                    </div>
                    <br>
                    <div class="dropdown">
                      <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                        Subkon 2
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                      </ul>
                    </div>
                    <br>
                  <div class="dropdown">
                    <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                      Progress
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                    </ul>
                  </div> <br> <a href="" class="d btn btn-success border-dark-rounded">Konfirmasi</a>
                   </td>
                  <td>  
                    <!-- Machining button -->
                    <div class="dropdown">
                      <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                        Subkon 1
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                      </ul>
                    </div>
                    <br>
                    <div class="dropdown">
                      <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                        Subkon 2
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                      </ul>
                    </div>
                    <br><a href="" class="d btn btn-success border-dark-rounded">Konfirmasi</a>
                  </td>
                  <!-- assembly 1 button -->
                  <td>  
                    <div class="dropdown">
                      <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                        Subkon 1
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                      </ul>
                    </div>
                    <br>
                    <div class="dropdown">
                      <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                        Subkon 2
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                      </ul>
                    </div>
                    <br>
                  <div class="dropdown">
                    <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                      Kegiatan
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#"> Las </a></li>
                      <li><a class="dropdown-item" href="#">Cek Opening</a></li>
                      <li><a class="dropdown-item" href="#">Pasang Kaca</a></li>
                      <li><a class="dropdown-item" href="#">Sealant Kaca</a></li>
                    </ul>
                  </div> <br> <a href="" class="d btn btn-success">Konfirmasi</a>
                  </td>
                  <!-- assembly 2 button -->
                  <td>  
                    <div class="dropdown">
                      <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                        Subkon 1
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                      </ul>
                    </div>
                    <br>
                    <div class="dropdown">
                      <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                        Subkon 2
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                      </ul>
                    </div>
                    <br>
                  <div class="dropdown">
                    <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                      Kegiatan
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#"> Las </a></li>
                      <li><a class="dropdown-item" href="#">Cek Opening</a></li>
                      <li><a class="dropdown-item" href="#">Pasang Kaca</a></li>
                      <li><a class="dropdown-item" href="#">Sealant Kaca</a></li>
                    </ul>
                  </div> <br> <a href="" class="d btn btn-success">Konfirmasi</a>
                  </td>
                  <!-- assembly 3 button -->
                  <td>  
                    <div class="dropdown">
                      <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                        Subkon 1
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                      </ul>
                    </div>
                    <br>
                    <div class="dropdown">
                      <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                        Subkon 2
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                      </ul>
                    </div>
                    <br>
                  <div class="dropdown">
                    <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                      Kegiatan
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#"> Las </a></li>
                      <li><a class="dropdown-item" href="#">Cek Opening</a></li>
                      <li><a class="dropdown-item" href="#">Pasang Kaca</a></li>
                      <li><a class="dropdown-item" href="#">Sealant Kaca</a></li>
                    </ul>
                  </div> <br> <a href="" class="d btn btn-success border-dark-rounded">Konfirmasi</a>
                  </td>
                  <td>
                    <!-- Qc button -->
                    <a href="" class="btn btn-info">Isi Keterangan</a>
                        <!-- assembly 2 button -->
                  <td>  
                    <div class="dropdown">
                      <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                        Subkon 1
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                      </ul>
                    </div>
                    <br>
                    <div class="dropdown">
                      <button type="button" class=" d dropdown-toggle vertical-align:top " data-bs-toggle="dropdown" aria-expanded="false">
                        Subkon 2
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                        <li><a class="dropdown-item" href="#">Nama Subkon</a></li>
                      </ul>
                    </div>
                    <div class="form-group">
                        <label for="Quantity"></label>
                        <input type="text" class="form-control" id="Quantity" placeholder="Quantity" >
                      </div>
                     <a href="" class="d btn btn-success">Konfirmasi</a>
                  </td>
                      </div>
                  </td>
                </tr>
                <tr class=" ">
                  <td> 2 </td>
                  <td> B1-002 </td>
                  <td> Astral AS 01 <br> top hung windo </td>
                  <td> clear 6mm excluded <br> <br> <a href="" class="d btn btn-gradient-success border-dark-rounded ">COMPLETED</a> </td>
                  <td> 1 </td>
                  <td> Outside </td>
                  <td> Allure Black Matte </td>
                   <!-- cutting button -->
                  <td>
                  <div class="dropdown">
                  </div> <br> <a class="d btn btn-gradient-dark">Wahyu (Lead) </a>  
                  <div class="dropdown">
                  </div> <br> <a class="d btn btn-dark"> - </a>   
                  <div class="dropdown">
                  </div> <br> <a class=" btn btn-gradient-info">08/08/2022 <br> 10.00 </a>
                  <div class="">
                  </div> <br> <a class=" btn mt-2"></a>
                  </td> 
                  <!-- Machining button -->
                  <td>
                    <div class="dropdown">
                    </div> <br> <a class="d btn btn-dark">Wahyu (Lead) </a>  
                    <div class="dropdown">
                    </div> <br> <a class="d btn btn-dark">Budi (Lead) </a> 
                    <div class="dropdown">
                    </div> <br> <a class=" btn btn-gradient-info ">08/08/2022 <br> 10.00 </a>
                    <div class="">
                    </div> <br> <a class=" btn mt-2"></a>
                    </td>
                  <!-- assembly 1 button -->
                  <td>
                    <div class="dropdown">
                    </div> <br> <a class="d btn btn-dark">Wahyu (Lead) </a>  
                    <div class="dropdown">
                    </div> <br> <a class="d btn btn-dark">Budi (Lead) </a>  
                    <div class="dropdown">
                    </div> <br> <a class="d btn btn-gradient-primary"> Las </a>  
                    <div class="dropdown">
                    </div> <br> <a class=" btn btn-gradient-info ">08/08/2022 <br> 10.00 </a>
                    </td>
                  <!-- assembly 2 button -->
                  <td>
                    <div class="dropdown">
                    </div> <br> <a class="d btn btn-dark">Wahyu (Lead) </a>  
                    <div class="dropdown">
                    </div> <br> <a class="d btn btn-dark">Budi (Lead) </a>  
                    <div class="dropdown">
                    </div> <br> <a class="d btn btn-gradient-primary"> Cek Opening </a>  
                    <div class="dropdown">
                    </div> <br> <a class=" btn btn-gradient-info ">08/08/2022 <br> 10.00 </a>
                    </td>
                  <!-- assembly 3 button -->
                  <td>
                    <div class="dropdown">
                    </div> <br> <a class="d btn btn-dark">Wahyu (Lead) </a>  
                    <div class="dropdown">
                    </div> <br> <a class="d btn btn-dark">Budi (Lead) </a>  
                    <div class="dropdown">
                    </div> <br> <a class="d btn btn-gradient-primary">Pasang Kaca</a>  
                    <div class="dropdown">
                    </div> <br> <a href="" class="btn btn-gradient-info ">08/08/2022 <br> 10.00</a>
                    </td>
                    <!-- Qc button -->
                  <td>
                    <div class="dropdown">
                    </div> <br> <a href="" class="d btn btn-primary">Lihat QC <br></a>
                    <div class="text">
                    </div> <br> <a href=" " class="btn btn-gradient-info">08/08/2022 <br> 10.00</a>
                    <div class="dropdown">
                    </div> <br> <a class=" btn mt-5 "></a>
                    </td>
                    <!-- assembly 2 button -->
                  <td>
                    <div class="dropdown">
                    </div> <br> <a class="d btn btn-dark">Wahyu (Lead) </a>  
                    <div class="dropdown">
                    </div> <br> <a class="d btn btn-dark">Budi (Lead) </a>                        <div class="dropdown">
                    </div> <br> <a class="d form-control"> 2 </a>  
                    <div class="dropdown">
                    </div> <br> <a href="" class="btn btn-gradient-info ">08/08/2022 <br> 10.00</a>
                    </td>
              <!-- my css -->
              <link rel="stylesheet" href="style.css">
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
