@extends('layout/template')
@section('link')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@push('style')
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet') }}">
@endpush
@section('content')
<div class="container">
    <h1 class="text-center mt-3 mb-2">Data Mahasiswa</h1>
    <div class="form-group">

      <input type="search" class="form-control mb-2" name="search" id="search" placeholder="Search" style="width: 200px">
      
      </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr class="text-center">
                          <th>Nama Mahasiswa</th>
                          <th>Jenis Kelamin</th>
                          <th>No Telepon</th>
                          <th>Jurusan</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                        <td>{{ $mahasiswa->jenis_kelamin }}</td>
                        <td>{{ $mahasiswa->no_telepon }}</td>
                        <td>{{ $mahasiswa->jurusan->nama_jurusan }}</td>
                        <td class="text-center">
                            <a href="{{ route('editDataMahasiswa',$mahasiswa->id_mahasiswa) }}"><button type="button" class="btn btn-success" style="font-size: 10px">Edit</button></a>
                            <a href="{{ route('deleteDataMahasiswa',$mahasiswa->id_mahasiswa) }}"><button type="button" class="btn btn-danger" style="font-size: 10px">Hapus</button></a>
                        </td>
                    </tr>
                @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>



    <script type="text/javascript">
      $('#search').on('keyup',function(){
      $value=$(this).val();
      $.ajax({
      type : 'get',
      url : '{{URL::to('search')}}',
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

      @push('script')
          <!-- Page level plugins -->
          <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
          <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

          <!-- Page level custom scripts -->
          <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
      @endpush

</div>
        
@endsection