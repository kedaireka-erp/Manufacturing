@extends('layouts.admin')

@push("style")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="content-wrapper bg-img">
    <div class="row">
        <div class="col-lg-12">
              <div class="shadow p-3 mb-2 bg-body rounded">Lihat WO</h2>
                    <h5 class="float-end"><a href="#" class="text-secondary">Manufaktur</a> / <a href="#" class="text-secondary">FPPP</a>/<a href="#" class="lihatfppp">Lihat FPPP</a></h5>
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
                  <div class="dropdown cutting-sk1">
                      <select class="form-select  bg-transparent text-center select2 js-example-basic-single"name="" id="" style="border-color: black;">
                        <option disabled selected>Subkon 1</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                      </select>
                    </div>
                    <br>
                    <div class="dropdown">
                      <select class="form-select bg-transparent text-center"name="" id="" style="border-color: black;">
                        <option disabled selected>Subkon 2</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                      </select>
                    </div>
                    <br>
                  <div class="dropdown">
                      <select class="form-select bg-transparent text-center"name="" id="" style="border-color: black;">
                        <option value="">Progress</option>
                        <option value="">Completed</option>
                      </select>
                  </div> <br> <a href="" class="d btn btn-success border-dark-rounded text-center ">Konfirmasi</a>
                  </td>
                  <td>  
                    <!-- Machining button -->
                    <div class="dropdown">
                    <select class="form-select bg-transparent text-center" name="" id="" style="border-color: black; margin-top: -50px">
                        <option disabled selected>Subkon 1</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                      </select>
                    </div>
                    <br>
                    <div class="dropdown">
                    <select class="form-select bg-transparent text-center"name="" id="" style="border-color: black;">
                        <option disabled selected>Subkon 2</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                      </select>
                    </div>
                    <br><a href="" class="d btn btn-success border-dark-rounded text-center">Konfirmasi</a>
                  </td>
                  <!-- assembly 1 button -->
                  <td>  
                    <div class="dropdown">
                    <select class="form-select bg-transparent text-center"name="" id="" style="border-color: black;">
                        <option disabled selected>Subkon 1</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                      </select>
                    </div>
                    <br>
                    <div class="dropdown">
                      <select class="form-select bg-transparent text-center"name="" id="" style="border-color: black;">
                      <option disabled selected>Subkon 2</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                      </select>
                    </div>
                    <br>
                  <div class="dropdown">
                  <select class="form-select bg-transparent text-center" name="" id="" style="border-color: black;">
                        <option disabled selected>Kegiatan</option>
                        <option value="">Las</option>
                        <option value="">Cek Opening</option>
                        <option value="">Pasang Kaca</option>
                        <option value="">Sealant Kaca</option>
                      </select>
                  </div> <br> <a href="" class="d btn btn-success text-center">Konfirmasi</a>
                  </td>
                  <!-- assembly 2 button -->
                  <td>  
                    <div class="dropdown">
                    <select class="form-select bg-transparent text-center" name="" id="" style="border-color: black;">
                        <option disabled selected>Subkon 1</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                      </select>
                    </div>
                    <br>
                    <div class="dropdown">
                    <select class="form-select bg-transparent text-center" name="" id="" style="border-color: black;">
                        <option disabled selected>Subkon 2</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                      </select>
                    </div>
                    <br>
                  <div class="dropdown">
                  <select class="form-select bg-transparent text-center" name="" id="" style="border-color: black;">
                        <option disabled selected>Kegiatan</option>
                        <option value="">Las</option>
                        <option value="">Cek Opening</option>
                        <option value="">Pasang Kaca</option>
                        <option value="">Sealant Kaca</option>
                      </select>
                  </div> <br> <a href="" class="d btn btn-success text-center">Konfirmasi</a>
                  </td>
                  <!-- assembly 3 button -->
                  <td>  
                    <div class="dropdown">
                    <select class="form-select bg-transparent text-center" name="" id="" style="border-color: black;">
                        <option disabled selected>Subkon 1</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                      </select>
                    </div>
                    <br>
                    <div class="dropdown">
                      <select class="form-select bg-transparent text-center" name="" id="" style="border-color: black;">
                        <option disabled selected>Subkon 2</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                      </select>
                    </div>
                    <br>
                  <div class="dropdown">
                  <select class="form-select bg-transparent text-center" name="" id="" style="border-color: black;">
                        <option disabled selected>Kegiatan</option>
                        <option value="">Las</option>
                        <option value="">Cek Opening</option>
                        <option value="">Pasang Kaca</option>
                        <option value="">Sealant Kaca</option>
                      </select>
                  </div> <br> <a href="" class="d btn btn-success border-dark-rounded text-center">Konfirmasi</a>
                  </td>
                  <td>
                    <!-- Qc button -->
                    <button type="button" class="d btn btn-primary text-center" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #51e29f">Isi Keterangan</button>
                    <div class="dropdown">
                    </div> <br> <a class=" btn mt-5 "></a>   
                    <div class="dropdown">
                    </div> <br> <a class=" btn mt-4 "></a>   
                    <!-- assembly 2 button -->
                  <td>  
                    <div class="dropdown">
                    <select class="form-select bg-transparent text-center" name="" id="" style="border-color: black;">
                        <option disabled selected>Subkon 1</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                      </select>
                    </div>
                    <br>
                    <div class="dropdown">
                    <select class="form-select bg-transparent text-center" name="" id="" style="border-color: black;">
                        <option disabled selected>Subkon 2</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                        <option value="">Nama Subkon</option>
                      </select>
                    </div>
                    <div class="hy form-group bg-transparent">
                        <label for="Quantity"></label>
                        <input type="number" class="form-control text-center bg-transparent" id="Quantity" placeholder="Quantity" style="border-color: black;border-radius:5px; padding:10px" >
                      </div>
                    <a href="" class="d btn btn-success" style="margin-top:-10px">Konfirmasi</a>
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
                  </div> <br> <a class="d btn btn-gradient-dark text-center">Wahyu (Lead) </a>  
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
                    <!-- packing button -->
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
            <h5 class="modal-title" id="exampleModalLabel">Form QC</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="/show" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-3">
            <input type="text" name="id" hidden>
            
            <div class="form-group mb-3">
                <label class="col-form-label fs-6">Nama Subkon</label>
                <select class="form-select border border-2" aria-label="Default select example" name="type">
                    <option value="dropdown-item">Nama Subkon</option>
                    <option value="dropdown-item">Nama Subkon</option>
                    <option value="dropdown-item">Nama Subkon</option>
                </select>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label fs-6">Alasan</label>
              <select class="form-select border border-2" name="type">
                  <option value="dropdown-item">Nama Subkon</option>
                  <option value="dropdown-item">Nama Subkon</option>
                  <option value="dropdown-item">Nama Subkon</option>
              </select>
          </div>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-control fs-6" for="Description">Keterangan</label>
              <input class="form-control border-2"  id="Description" placeholder="Isikan Keterangan di sini">
          </div>
  </div>
    </form>
    <div class="mb-3 p-3">
            <table class="table" id="files_table">
            </table>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Tanggal </th>
                    <th scope="col">Nama</th>
                    <th scope="col">Status</th>
                    <th scope="col">Alasan</th>
                    <th scope="col">Keterangan</th>
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
  </div>


@endsection

@push("script")
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
// In your Javascript (external .js resource or <script> tag)
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2({
      dropdownParent: '.cutting-sk1'
    });
});
</script>
@endpush