@extends('layouts.admin')

@section('content')
<div class="content-wrapper bg-img">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title float-start">Master Lead</h2>
                    <h5 class="float-end"><a href="#" class="text-secondary">Master</a> / <a href="#" class="text-primary">Lead</a></h5>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <a href="/createleads" class="btn btn-info float-end"><i class="mdi mdi-plus"></i> Tambah Lead</a>
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
                            <input type="search" name="search" class="form-control bg-light border rounded" id="search" placeholder="Cari Pegawai Berdasarkan Nomor"
                                aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                    </form>

            <!-- Tabel -->
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th width="250px"> No. Pegawai </th>
                  <th width="250px"> Nama Lead </th>
                  <th width="250px"> Status </th>
                  <th  width="250px"> Action </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($leads as $lead)
                  <tr class="text-center">
                    <td>{{ $lead->employee_number }}</td>
                    <td>{{ $lead->lead_name }}</td>
                    <td><?php if ($lead->is_active == 1) {
                      echo "Active";
                    }else{
                      echo "Inactive";
                    } ?></td>
                    <td> 
                      <a href="/editleads/{{ $lead->id }}" class="btn btn-success">Ubah</a>
                      <a href="/deleteLeads/{{ $lead->id }}" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $leads->links() }}
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
    url : '{{URL::to('/searchAjax')}}',
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
