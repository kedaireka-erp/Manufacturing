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
                    <button type="button" class="d btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #51e29f">Isi Keterangan</button>
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
                        <input type="text" class="form-control text-center" id="Quantity" placeholder="Quantity" >
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

                    <button type="button" class="d btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #51e29f">Lihat QC</button>
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
                    </div> <br> <a class="d btn btn-dark">Budi (Lead) </a>
                    <div class="dropdown">
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
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-white">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import: Lantai 1 BRI</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="/fppp" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-3">
            <input type="text" name="id" hidden>
            
            <div class="form-group mb-3">
                <label class="col-form-label fs-6">Pilih Jenis</label>
                <select class="form-select border border-2" aria-label="Default select example" name="type">
                    <option value="bom_alumunium">BOM Alumunium</option>
                    <option value="bom_aksesoris">BOM Aksesoris</option>
                    <option value="wo_alumunium">WO Alumunium</option>
                    <option value="wo_kaca">WO Kaca</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label class="col-form-label fs-6">Import File</label>
                <input type="file" name="img[]" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-select file-upload-info border border-2" disabled placeholder="Upload File">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>
    </div>
    </form>
    <div class="mb-3 p-3">
            <div class="text-primary fw-bold">File yang telah diupload</div>
            <table class="table" id="files_table">
            </table>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No. </th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"></th>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Simpan      <i class="mdi mdi-content-save fs-3"></i></button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection