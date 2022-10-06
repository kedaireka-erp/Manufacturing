@extends('layouts.admin')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/logistic/create.css') }}">
@endpush

@section('content')
    <div class="content-wrapper bg-img">
        @include('sweetalert::alert')

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-table-header">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h2 class="card-title mb-0">Buat Surat Jalan</h2>
                        <h5 class="card-bredcrumb mb-0">
                            <a href="/manufactures" class="text-secondary">Manufaktur /</a>
                            <a href="{{ route('logistic_index') }}" class="text-secondary"> Surat Jalan /</a>
                            <a href="#" class="text-primary">Buat Surat Jalan</a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('logistic_store') }}" method="POST">
                            <div class="add-form">
                                <div class="card-header__wrapper d-flex justify-content-between">
                                    <h4 class="text-uppercase fs-6 mb-0">informasi umum</h4>
                                </div>
                                @csrf
                                <div class="row form-row">
                                    {{-- input date --}}
                                    <div class="col-4">
                                        <div class="form-wrap">
                                            <label for="input-date" class="form-label">Tanggal Input</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control fs-6 text-uppercase border-end-0"
                                                    id="input-date" name="inputDate" value="{{ date('d/m/Y') }}" disabled>
                                                <span class="input-group-text" id="date-addon">
                                                    <i class="mdi mdi-calendar-blank"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- depart date --}}
                                    <div class="col-4">
                                        <div class="form-wrap">
                                            <label for="depart-date" class="form-label">Tanggal Berangkat</label>
                                            <input type="date" class="form-control fs-6 text-uppercase" id="depart-date"
                                                name="departDate" value="{{ old('departDate') }}" required>
                                        </div>
                                    </div>
                                    {{-- brand --}}
                                    <div class="col-4">
                                        <div class="form-wrap">
                                            <label for="brand" class="form-label">Brand</label>
                                            <select class="form-select" aria-label="Select brand" name="brand"
                                                id="brand">
                                                <option selected value="astral">Astral</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-6">
                                                {{-- fppp --}}
                                                <div class="mb-3 form-row">
                                                    <label for="codeFPPP" class="form-label">Nomor FPPP</label>
                                                    <select class="form-select" aria-label="Select fppp" id="codeFPPP"
                                                        name="fppp" required>
                                                        <option selected disabled>Pilih Nomor FPPP</option>
                                                        @foreach ($getFppps as $data)
                                                            <option value="{{ $data->id }}"
                                                                {{ $data->id == old('fppp') ? 'selected' : '' }}>
                                                                {{ $data->FPPP_no }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- quotation --}}
                                            <div class="col-6">
                                                <div class="mb-3 form-row">
                                                    <label for="quotation" class="form-label">Nomor
                                                        Quotation</label>
                                                    <input type="text" class="form-control" id="quotation"
                                                        name="quotation" value="{{ old('quotation') ?? 'Nomor Quotation' }}"
                                                        readonly />
                                                </div>
                                            </div>
                                            {{-- sopir --}}
                                            <div class="col-6">
                                                <div class="mb-3 form-row">
                                                    <label for="driver" class="form-label">Driver</label>
                                                    <input class="form-control" id="driver" name="driver"
                                                        placeholder="Alex Dudung" value="{{ old('driver') }}" required />
                                                </div>
                                            </div>
                                            {{-- no polisi --}}
                                            <div class="col-6">
                                                <div class="mb-3 form-row">
                                                    <label for="plate-number" class="form-label">Nomor Polisi</label>
                                                    <input class="form-control" id="plate-number" name="plateNumber"
                                                        placeholder="B 1234 AMD" value="{{ old('plateNumber') }}"
                                                        required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- alamat --}}
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Alamat</label>
                                            <textarea class="form-control" id="address" name="address" placeholder="Alamat" required>{{ old('address') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-list">
                                <div class="card-header__wrapper d-flex justify-content-between flex-column">
                                    <h4 class="text-uppercase fs-6 mb-4">informasi barang</h4>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="table-list__subtitle mb-0">Daftar Barang</p>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info h-100 d-flex align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#addFormModal">Tambah Barang
                                            <i class="mdi mdi-plus ms-2"></i> </button>
                                    </div>
                                </div>
                                {{-- table --}}
                                <table class="table table-striped mb-3" id="tableItems">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Item</th>
                                            <th>Warna</th>
                                            <th>Qty</th>
                                            <th>Keterangan</th>
                                            {{-- <th>Ukuran</th>
                                            <th>Bukaan</th>
                                            <th>Tipe</th>
                                            <th>Status</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr></tr>
                                    </tbody>
                                </table>
                                <div class="mt-5">
                                    <p class="text-center table-description">Belum ada barang yang ditambahkan</p>
                                </div>
                                <div class="table-btn d-flex justify-content-end mt-5">
                                    <a href="{{ route('logistic_index') }}"
                                        class="btn btn-dark d-flex align-items-center">Kembali</a>
                                    <button type="submit" class="btn btn-info d-flex align-items-center ms-4">Simpan
                                        <i class="mdi mdi-content-save ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addFormModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="#" method="get" id="itemForm">
                                <div class="modal-header p-0 mb-4 border-bottom-0">
                                    <h5 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Tambah Barang</h5>
                                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0 mb-3">
                                    <div class="code-item">
                                        <label for="codeItem" class="form-label">Kode Item</label>
                                        <select class="form-select" aria-label="Select code-item" name="codeItem"
                                            id="codeItem">
                                            <option selected disabled>Pilih Salah Satu</option>
                                        </select>
                                    </div>
                                    <div class="color">
                                        <label for="color" class="form-label">Warna</label>
                                        <input class="form-control" type="text" readonly id="color"
                                            name="color">
                                    </div>
                                    {{-- <div class="size">
                                        <label for="size" class="form-label">Ukuran</label>
                                        <div class="d-flex">
                                            <input class="form-control" type="text" readonly id="sizeLength"
                                                name="sizeLength">
                                            <input class="form-control ms-3" type="text" readonly name="sizeWidth"
                                                id="sizeWidth">
                                        </div>
                                    </div> --}}
                                    {{-- <div class="d-flex input-wrap flex-wrap">
                                        <div class="opener">
                                            <label for="opener" class="form-label">Bukaan</label>
                                            <input class="form-control" type="text" readonly id="opener"
                                                name="opener">
                                        </div>
                                        <div class="qty ms-3">
                                            <label for="qty" class="form-label">Qty</label>
                                            <input class="form-control" type="text" readonly id="qty"
                                                name="qty">
                                        </div>
                                        <div class="type ms-3">
                                            <label for="type" class="form-label">Type</label>
                                            <input class="form-control" type="text" readonly id="type"
                                                name="type">
                                        </div>
                                        <div class="status ms-3">
                                            <label for="status" class="form-label">Status</label>
                                            <input class="form-control" type="text" readonly id="status"
                                                name="status">
                                        </div>
                                    </div> --}}
                                    <div class="description">
                                        <label for="description" class="form-label">Keterangan</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Isikan Keterangan di sini"
                                            rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer p-0 border-top-0">
                                    <div class="d-flex justify-content-end">
                                        <button class="modal-btn btn btn-dark d-flex align-items-center"
                                            aria-label="Close" data-bs-dismiss="modal" id="cancelModal">Kembali</button>
                                        <button type="submit"
                                            class="modal-btn btn btn-info d-flex align-items-center ms-4">Simpan
                                            <i class="mdi mdi-content-save ms-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- autofill quotation by dropdown --}}
    <script>
        $('#codeFPPP').change(function() {
            var id = $(this).val();
            var url = '{{ route('logistic_get_quotation', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response != null) {
                        $('#quotation').val(response.no_quotation);
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            let counter = 0,
                id;

            // get items by fppps' id for dropdown
            $('#codeFPPP').change(function() {
                let id = $(this).val(),
                    url = '{{ route('logistic_get_dropdown_items', ':id') }}',
                    selectElement = $('#codeItem');
                url = url.replace(':id', id);

                // remove select's child that has value
                selectElement.children("option[value]").remove()

                // remove items in table if exist
                if ($('#tableItems tbody').children()) {
                    $('#tableItems tbody').children().remove();
                    $('.table-description').removeClass('d-none');
                    id = 0;
                    counter = 0;
                }

                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        if (response != null) {
                            $.each(response, function(i, item) {
                                option =
                                    `<option value="${item.id}" id="item${item.id}" data-name="${item.nama_item}" data-qty="${item.qty_packing}">${item.kode_op} - ${item.nama_item} (${item.qty_packing})</option>`

                                selectElement.append(option);
                            });
                        }
                    }
                });
            })

            // store from modal to table
            $('#itemForm').on('submit', function(e) {
                e.preventDefault();

                let rows = [];
                $.each($(this).serializeArray(), function(i, field) {
                    if (i > 0 && field.name === rows[rows.length - 1].name) {
                        rows[rows.length - 1].value += ';' + field.value;
                    } else {
                        if (field.name === 'codeItem') {
                            id = field.value;
                            // console.log('id', id);
                            field.value = counter + 1;
                        }
                        // console.log();
                        if ((!field.value && field.name !== 'description')) {
                            rows = [];
                            return false; // breaks
                        } else {
                            rows.push(field);
                        }
                    }
                });

                let list = '<tr>';

                if (rows.length > 0) {
                    let nama_item = $(`#item${id}`).data("name"),
                        qty = $(`#item${id}`).data("qty");

                    $.each(rows, function(i, field) {
                        // console.log(field);
                        if (i === 1) {
                            // nama item
                            list +=
                                `<td class="text-center">${nama_item}<input type="hidden" name="items[${String(id)}][namaItem]" value="${nama_item}"/></td>`;

                            // value
                            list +=
                                `<td class="text-center">${field.value}<input type="hidden" name="items[${String(id)}][${field.name}]" value="${field.value}"/></td>`

                            // qty
                            list +=
                                `<td class="text-center">${qty}<input type="hidden" name="items[${String(id)}][qty]" value="${qty}"/></td>`;

                            // remove selected option from dropdrown (avoid duplicate)
                            $(`#item${id}[value="${id}"]`).remove();
                        } else {
                            list +=
                                `<td class="text-center">${field.value}<input type="hidden" name="items[${String(id)}][${field.name}]" value="${field.value}"/></td>`
                        }
                    });

                    $('.table-description').addClass('d-none')
                    $('#tableItems tbody').append(list);

                    counter++;
                }

                $('#addFormModal').modal('hide');
                $(this)[0].reset();
            });
        });
    </script>

    {{-- autofill item's color by dropdown --}}
    <script>
        $('#codeItem').change(function() {
            var id = $(this).val();
            var url = '{{ route('logistic_get_item_color', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response != null) {
                        $('#color').val(response.color);
                    }
                }
            });
        });
    </script>

    {{-- reset form --}}
    <script>
        $("#cancelModal").click(function() {
            $("#itemForm")[0].reset();
            return false;
        });
    </script>

    {{-- trigger onchange function --}}
    <script>
        $(document).ready(function() {
            if ($('#codeFPPP').val()) {
                $('#codeFPPP').trigger("change");
            };
        })
    </script>
@endpush
