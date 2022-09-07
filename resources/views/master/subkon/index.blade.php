@extends('layouts.admin')

@section('content')
<div class="content-wrapper bg-img">
    <div class="row">
        <div class="col-lg-12" >
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title float-start">Master Subkon</h2>
                    <h5 class="float-end"><a href="#" class="text-secondary">Dashboard</a> / <a href="#" class="text-secondary">Master</a> / <a href="#" class="text-primary">Subkon</a></h5>
                </div>
            </div>
        </div>
    </div>
    <br>
    
    <br>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <div class="row">
              <div class="col-lg-12 justify-content-between">
                  <a href="/createsubkon" class="btn btn-info float-end"><i class="mdi mdi-plus"></i>Tambah Subkon</a>
                  <form class="col-lg-4 my-md-0" >
                    <div class="input-group" >
                      <input type="search" name="search" class="form-control bg-light border rounded" id="search" placeholder="Cari Pegawai Berdasarkan Pegawai"
                          aria-label="Search" aria-describedby="basic-addon2">
                  </div>
                </form>
              </div>
          </div>

            <!-- search -->
           

            
        <!-- Tabel -->
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr class="text-center">
                  <th width="250px"> No. Pegawai </th>
                  <th width="250px"> Nama Subkon </th>
                  <th width="250px"> Nama Lead </th>
                  <th width="250px"> Status </th>
                  <th width="250px"> Action </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($subkons as $subkon)
                  <tr class="text-center">
                    <td> {{ $subkon->employee_number }} </td>
                    <td> {{ $subkon->subkon_name }} </td>
                    <td> {{ $subkon->lead_name }} </td>
                    <td> <?php if ($subkon->is_active == 1) {
                      echo "Active";
                    }else{
                      echo "Inactive";
                    } ?> </td>
                    <td> 
                      <a href="/editsubkon/{{ $subkon->id }}" class="btn btn-success">Ubah</a>
                      <a href="/deletesubkon/{{ $subkon->id }}" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $subkons->links() }}
             </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script type="text/javascript">
    $('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '{{URL::to('/serachAjaxSubkon')}}',
    data:{'search':$value},
    success:function(data){
    $('tbody').html(data);
    }
    });
    })
    </script>
    <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endsection
