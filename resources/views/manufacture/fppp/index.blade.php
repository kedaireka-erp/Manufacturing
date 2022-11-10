@extends('layouts.admin')
@section('content')
{{-- <div class="content-wrapper bg-img"> --}}
      @include('sweetalert::alert')

    {{-- <div class="shadow p-3 mb-3 bg-body rounded">
        FPPP
        <h5 class="float-end">
            <a href="#" class="text-secondary">Manufaktur</a> /
            <a href="#" class="text-primary">FPPP</a>
        </h5>
    </div> --}}

    <div class="content-wrapper bg-img">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-table-header">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h2 class="card-title mb-0">FPPP</h2>
                        <h5 class="card-bredcrumb mb-0"><a href="#" class="text-secondary">Manufaktur / </a><a
                                href="#" class="text-primary">FPPP</a></h5>
                    </div>
                </div>
            </div>
        </div>
        <br>
    <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-6">
                                <div class="search-field d-none d-md-block mb-4">
                                <form class="d-flex align-items-center h-100" action="#">
                                    <div class="input-group rounded" style="border: solid rgb(184, 184, 184) 1px">
                                        <div class="input-group-prepend bg-transparent">
                                        <i class="input-group-text border-0 mdi mdi-magnify bg-transparent text-dark"></i>
                                        </div>
                                        <input type="text" class="form-control bg-transparent border-0" placeholder="Cari..." id="fppp-search" name="search">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="" id="fppp-content">
                            <table class="table table-striped" >
                                <tr class="text-center">
                                    <th>No. FPPP</th>
                                    <th>Nama Proyek</th>
                                    <th>Aplikator</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($all_fppp as $fppp)
                                <tr class="text-center">
                                    <td>{{ $fppp->fppp_no }}</td>
                                    <td>{{ $fppp->quotation->nama_proyek }}</td>
                                    <td>{{ $fppp->quotation->Aplikator->aplikator }}</td>
                                    <td class="">
                                        @if (Auth::user()->hasRole("admin-manufacture") || Auth::user()->hasRole("Manager-PPIC") || Auth::user()->hasRole("Admin-PPIC"))
                                        <button
                                            type="button"
                                            class="btn btn-purple btn-sm text-white"
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            style="background-color: #51e29f"
                                            data-bs-id="{{ $fppp->id }}"
                                            data-bs-title="{{ $fppp->quotation->nama_proyek }}"
                                            data-bs-base-path="{{ asset("storage/") }}"
                                            data-bs-files="{{ asset("storage/{$fppp->file_bom_alumunium}")." ".asset("storage/{$fppp->file_bom_aksesoris}")." ".asset("storage/{$fppp->file_wo_potong_alumunium}")." ".asset("storage/{$fppp->file_detail_wo}")}}" > Import
                                        </button>
                                        @endif
                                        @if (Auth::user()->hasRole("admin-manufacture") || Auth::user()->hasRole("Manager-PPIC") || Auth::user()->hasRole("Admin-PPIC") || Auth::user()->hasRole("Lead-produksi") || Auth::user()->hasRole("Operator-produksi") || Auth::user()->hasRole("Lead-logistik") || Auth::user("Operator-logistik"))
                                        <a href="{{ route("manufactures.show",$fppp->id) }}" class="btn btn-info btn-sm"
                                            >Lihat</a
                                        >
                                        @endif
                                        @if (Auth::user()->hasRole("admin-manufacture") || Auth::user()->hasRole("Manager-PPIC") || Auth::user()->hasRole("Admin-PPIC") || Auth::user()->hasRole("Lead-produksi") || Auth::user()->hasRole("Operator-produksi") || Auth::user()->hasRole("Lead-logistik") || Auth::user("Operator-logistik"))
                                        <a href="{{ route("manufactures.detail",$fppp) }}" class="btn btn-primary btn-sm"
                                            >Detail</a
                                        >
                                        @endif
                                        <a href="/monitoring/{{ $fppp->id }}" class="btn btn-warning btn-sm">Monitoring</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="mt-4">
                                {{ $all_fppp->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
<div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
<div class="modal-dialog modal-xl">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h5
                    class="modal-title"
                    id="exampleModalLabel"
                ></h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <form
                method="POST"
                action="/manufactures"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="modal-body p-3">
                    <input type="text" name="id" hidden />

                    <div class="form-group mb-3">
                        <label class="col-form-label fs-6"
                            >Pilih Jenis</label
                        >
                        <select
                            class="form-select border border-2"
                            aria-label="Default select example"
                            name="type"
                            id="file-selector"
                        >

                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label fs-6"
                            >Import File</label
                        >
                        <input
                            type="file"
                            name="file"
                            class="file-upload-default"
                        />
                        <div class="input-group col-xs-12">
                            <input
                                type="text"
                                class="text-wrap form-select file-upload-info border border-2"
                                disabled
                                placeholder="Upload File"
                            />
                            <span
                                class="input-group-append"
                            >
                                <button
                                    class="file-upload-browse btn btn-primary"
                                    type="button"
                                >
                                    Upload
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <a href="{{ asset("template/document/template.xlsx") }}" class="text-decoration-none">Unduh Template File Detail WO</a>
                    </div>
                </div>

            <div class="mb-3 p-3">
                <div class="text-primary fw-bold">
                    File yang telah diupload
                </div>
                <table
                    class="table"
                    id="files_table"
                ></table>

            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary btn-sm"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                <button type="submit" class="btn btn-info btn-sm">
                    Simpan
                    <i
                        class="mdi mdi-content-save"
                    ></i>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
@push('script')
<!-- Custom js for this page -->
<script src="{{ asset('assets/js/file-upload.js') }}"></script>
<script src="{{ asset('assets/js/dynamic-modal.js') }}"></script>
<script>
    const input_search = document.querySelector("#fppp-search")
    let typingTimer;
    let doneTypingInterval = 500;
    console.log(input_search);

    input_search.addEventListener("keyup", (event) => {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTyping, doneTypingInterval, input_search.value);
        });
    input_search.addEventListener("keydown", (event) => {
        clearTimeout(typingTimer);
        });
    function doneTyping (keyword) {
        fetch('/manufactures?search='+keyword)
            .then(response => response.text())
            .then(html => {
                let el = document.createElement('div')
                el.innerHTML = html
                let oldContent = document.querySelector("#fppp-content")
                let newContent = el.querySelector("#fppp-content")
                oldContent.innerHTML = newContent.innerHTML;
                el.remove()

            })
    }
</script>




<!-- End custom js for this page -->
@endpush
