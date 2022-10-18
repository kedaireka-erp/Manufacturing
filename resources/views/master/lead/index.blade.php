

@extends('layouts.admin')
@section('content')
<div class="content-wrapper bg-img">
  @include('sweetalert::alert')
  <div class="row">
    <div class="col-lg-12">
        <div class="card card-table-header">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h2 class="card-title mb-0">Master Lead</h2>
                <h5 class="card-bredcrumb mb-0"><a href="#" class="text-secondary">Master / </a><a
                        href="#" class="text-primary">Lead</a></h5>
            </div>
        </div>
    </div>
</div>
<br>
    {{-- <div class="row">
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

    <br> --}}
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <div class="row">
              <div class="col-lg-12 justify-content-between">
                  <a href="{{ route('createLead') }}" class="btn btn-info float-end"><i class="mdi mdi-plus"></i> Tambah Lead</a>
                  <form class="col-lg-4 my-md-0">
                    <div class="input-group" >
                        <input type="search" name="search" class="form-control bg-light border rounded" id="search" placeholder="Cari Pegawai Berdasarkan Nama Pegawai"
                            aria-label="Search" aria-describedby="basic-addon2">
                    </div>
                </form>
              </div>
          </div>

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
                @if ($leads->count() > 0)
                      @foreach ($leads as $lead)
                          <?php if ($lead->is_active == 1) {
                            $is_active = "Active";
                            $warna = "success";
                          }else{
                            $is_active = "Inactive";
                            $warna = "danger";
                          } ?>
                            <tr class="text-center">
                              <td>{{ $lead->employee_number }}</td>
                              <td>{{ $lead->lead_name }}</td>
                              <input type="hidden" class="delete_id" value="{{ $lead->id }}">
                              <td>
                                <label class="badge badge-{{ $warna }}">{{ $is_active }}</label>
                              </td>
                              <td>
                                <a class="btn btn-success" style="font-size: 10px" href="/lead/edit/{{ $lead->id }}">Ubah</a>
                                <button type="button" style="font-size: 10px" class="btn btn-danger" onclick="handleDelete({{ $lead->id }})">Hapus</button>
                              </td>
                            </tr>
                      @endforeach
                @else
                    <tr>
                      <td colspan="10" align="center">Tidak ada data</td>
                    </tr>
                @endif

              </tbody>
            </table>

          </div>
            <div class="container">
              {{ $leads->links() }}
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel"><b>Konfirmasi Hapus</b></h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah anda yakin untuk menghapus data ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          <a id="deleteLink" class="btn btn-danger">Hapus</a>
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
    url : '{{URL::to('/lead/search')}}',
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
    <!--modal delete -->
    <script>
      function handleDelete(id)
      {
        var link = document.getElementById('deleteLink');

        link.href = "/lead/delete/"+id;
        $('#modalDelete').modal('show');
      }
    </script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

@push('script')
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <!-- End custom js for this page -->
@endpush
