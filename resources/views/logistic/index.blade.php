@extends('layouts.admin')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/logistic/main.css') }}">
@endpush

@section('content')
    <div class="content-wrapper bg-img">
        @include('sweetalert::alert')

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-table-header">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h2 class="card-title mb-0">Surat Jalan</h2>
                        <h5 class="card-bredcrumb mb-0">
                            <a href="/manufactures" class="text-secondary">Manufaktur / </a>
                            <a href="#" class="text-primary">Surat Jalan</a>
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
                        <div class="card-header__wrapper d-flex justify-content-between">
                            <div class="search d-flex align-items-center position-relative">
                                <i class="mdi mdi-magnify position-absolute"></i>
                                <input id="logisticSearch" type="text" class="form-control"
                                    placeholder="Cari berdasarkan No. Surat Jalan atau No. FPPP">
                            </div>
                            <div>
                                <a href="{{ route('logistic_create') }}"
                                    class="btn btn-info h-100 d-flex align-items-center">Buat Surat Jalan <i
                                        class="mdi mdi-plus ms-1"></i> </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped text-center mb-3">
                                <thead>
                                    <tr>
                                        <th> No. Surat Jalan </th>
                                        <th> No. FPPP </th>
                                        {{-- <th> No. Quotation </th> --}}
                                        <th> Tgl Pengiriman </th>
                                        <th> Jml Unit </th>
                                        <th> Driver </th>
                                        <th> Status </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    @foreach ($getLogistics as $data)
                                        <tr>
                                            <td>{{ $data->no_logistic }}</td>
                                            <td>{{ $data->FPPP_no }}</td>
                                            {{-- <td>
                                                @foreach ($getQuotations as $quotation)
                                                    @if ($quotation->fppp_id === $data->fppp_id)
                                                        {{ $quotation->no_quotation }}
                                                    @endif
                                                @endforeach
                                            </td> --}}
                                            <td>{{ date('d/m/Y', strtotime($data->tgl_berangkat)) }}</td>
                                            <td>
                                                @foreach ($getQtyPacking as $qty)
                                                    @if ($data->id === $qty->l_id)
                                                        {{ $qty->total }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ ucwords($data->driver, ' .') }}</td>
                                            <td>
                                                {{-- @foreach ($getStatus as $status)
                                                    @if ($data->id === $status->l_id)
                                                        <div class="dropdown status-dropdown" id="statusDropdown">
                                                            <button
                                                                class="btn btn-secondary dropdown-toggle w-100 py-1 {{ $status->last_process == 'on delivery' ? 'on-delivery' : ($status->last_process == 'delivered' ? 'delivered' : '') }} "
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false" data-id={{ $data->id }}>
                                                                <span>
                                                                    <i
                                                                        class="mdi {{ $status->last_process == 'on delivery' ? 'mdi-truck' : ($status->last_process == 'delivered' ? 'mdi-checkbox-marked-circle-outline' : '') }} me-1"></i>
                                                                    {{ ucwords($status->last_process, ' ') }}
                                                                </span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <span class="dropdown-item px-3 text-black"
                                                                        onclick="handleChangeStatus(this)"
                                                                        data-value="on delivery"
                                                                        data-id="{{ $data->id }}">
                                                                        <i class="mdi mdi-truck me-2"></i>On Delivery</span>
                                                                </li>
                                                                <li>
                                                                    <span class="dropdown-item px-3 text-black"
                                                                        onclick="handleChangeStatus(this)"
                                                                        data-value="delivered"
                                                                        data-id="{{ $data->id }}">
                                                                        <i
                                                                            class="mdi mdi-checkbox-marked-circle-outline me-2"></i>
                                                                        Delivered
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        @php
                                                            break;
                                                        @endphp
                                                    @endif
                                                @endforeach --}}
                                                <span class="delivered">
                                                    <i
                                                        class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                                    Delivered
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('logistic_show', $data->id) }}"
                                                        class="btn btn-success" title="View">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('logistic_generate_pdf', $data->id) }}"
                                                        target="_blank" class="btn btn-primary ms-2" title="Download">
                                                        <i class="mdi mdi-download"></i>
                                                    </a>

                                                    {{-- <form action="{{ route('logistic_destroy', $data->id) }}" method="post"> --}}
                                                    {{-- @csrf --}}
                                                    {{-- @method('DELETE') --}}
                                                    {{-- <a href="{{ route('logistic_destroy', $data->id) }}"
                                                        class="btn btn-danger" title="Delete">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a> --}}
                                                    {{-- </form> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- pagination --}}
                        {{ $getLogistics->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- moment js --}}
    <script src="https://momentjs.com/downloads/moment.js"></script>

    {{-- handle change status --}}
    <script>
        function handleChangeStatus(element) {
            const thisId = $(element).data('id'),
                thisValue = $(element).data('value'),
                prevValue = $(`#statusDropdown button[data-id='${thisId}'] span`).text().toLowerCase().trim();
            // prevValue = $("#statusDropdown button").data('id');
            let capt, classColor, status, iconClass;

            // only change status when the value is changed
            if (thisValue !== prevValue) {
                let PATH = '{{ route('logistic_handle_change_status', ':id') }}',
                    PARAM = thisValue;

                PATH = PATH.replace(':id', thisId);

                $.ajax({
                    url: PATH,
                    type: 'get',
                    data: {
                        id: thisId,
                        status: thisValue,
                    },
                    success: function(response) {
                        if (response.status == 'on delivery') {
                            $(`#statusDropdown button[data-id='${response.id}']`).removeClass(
                                'delivered');

                            classColor = "on-delivery";
                            status = `${response.status}`;
                            iconClass = "mdi-truck";
                        } else if (response.status == 'delivered') {
                            $(`#statusDropdown button[data-id='${response.id}']`).removeClass(
                                'on-delivery');

                            classColor = "delivered";
                            status = `${response.status}`;
                            iconClass = "mdi-checkbox-marked-circle-outline";
                        };

                        capt = `<span><i class="mdi ${iconClass} me-1"></i>${thisValue}</span>`;
                        $(`#statusDropdown button[data-id='${response.id}']`).addClass(
                            classColor);
                        $(`#statusDropdown button[data-id='${response.id}']`).children()
                            .remove();
                        $(`#statusDropdown button[data-id='${response.id}']`).append(capt);
                        $(`#statusDropdown button[data-id='${response.id}']`).children()
                            .addClass(
                                'text-capitalize');
                    },
                    error: function() {
                        alert('Data gagal diubah!');
                    }
                });
            }
        }
    </script>

    {{-- handle search --}}
    <script>
        $(document).ready(function() {
            let timeoutID, PATH = '{{ route('logistic_search') }}';

            $('#logisticSearch').keyup(function(e) {
                e.preventDefault();
                const URL = "{{ route('logistic_index') }}";

                // wait 2s before checking input
                setTimeout(() => {
                    // console.log(value);
                    const value = e.target.value.trim().toLowerCase()
                    if (value) {
                        clearTimeout(timeoutID);
                        searchReq(value);

                    } else {
                        $.ajaxSetup({
                            cache: false
                        });
                        $('body').load(window.location.href);
                        // window.location.reload()
                    }
                }, 1500)
            });

            function searchReq(param) {
                // console.log('search: ' + str)
                $.ajax({
                    type: "GET",
                    url: PATH,
                    data: {
                        query: param,
                    },
                    success: function(response) {
                        // console.log(response);
                        var tableBody = $('#tableBody'),
                            newRows, log_status, total;
                        tableBody.children().remove();

                        response["logistics"].forEach(data => {
                            let total = "",
                                log_status = "",
                                date = new Date(data.tgl_berangkat),
                                curr_date = date.getDate(),
                                curr_month = date.getMonth() + 1,
                                curr_year = date.getFullYear();

                            date = curr_date + "/" + curr_month + "/" + curr_year;

                            response["qty"].forEach(packing => {
                                if (packing.l_id === data.id) {
                                    total = packing.total
                                }
                            })

                            response["statuses"].forEach(status => {
                                if (data.id === status.l_id) {
                                    log_status = status.last_process
                                }
                            })

                        //     newRows = `
                        // <tr>
                        //     <td> ${data.no_logistic}</td>
                        //     <td> ${data.FPPP_no} </td>
                        //     <td> ${date} </td>
                        //     <td> ${total} </td>
                        //     <td class="text-capitalize"> ${data.driver} </td>
                        //     <td>
                        //         <div class="dropdown status-dropdown" id="statusDropdown">
                        //             <button class="btn btn-secondary dropdown-toggle w-100 py-1 text-capitalize ${log_status == 'on delivery' ? 'on-delivery' : (log_status == 'delivered' ? 'delivered' : 'd-none')}" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-id=${data.id}>
                        //                 <span><i class="mdi ${log_status == 'on delivery' ? 'mdi-truck' : (log_status == 'delivered' ? 'mdi-checkbox-marked-circle-outline' : '')} me-1"></i>
                        //                     ${log_status }
                        //                 </span>
                        //             </button>
                        //             <ul class="dropdown-menu">
                        //                 <li>
                        //                     <span class="dropdown-item px-3 text-black" onclick="handleChangeStatus(this)" data-value="on delivery" data-id=${data.id}>
                        //                         <i class="mdi mdi-truck me-2"></i>
                        //                         On Delivery
                        //                     </span>
                        //                 </li>
                        //                 <li>
                        //                     <span class="dropdown-item px-3 text-black" data-value="delivered" onclick="handleChangeStatus(this)" data-id=${data.id}>
                        //                         <i class="mdi mdi-checkbox-marked-circle-outline me-2"></i>
                        //                         Delivered
                        //                     </span>
                        //                 </li>
                        //             </ul>
                        //         </div>
                        //     </td>
                        //     <td>
                        //         <div class="d-flex justify-content-around">
                        //             <a href="/logistic/show/${data.id}" class="btn btn-success" title="View">
                        //                 <i class="mdi mdi-eye"></i>
                        //             </a>
                        //             <a href="/logistic/generatePDF/${data.id}" target="_blank" class="btn btn-primary" title="Download">
                        //                 <i class="mdi mdi-download"></i>
                        //             </a>
                        //         </div>
                        //     </td>
                        // </tr>
                        // `;

                            newRows = `
                        <tr>
                            <td> ${data.no_logistic}</td>
                            <td> ${data.FPPP_no} </td>
                            <td> ${date} </td>
                            <td> ${total} </td>
                            <td class="text-capitalize"> ${data.driver} </td>
                            <td>
                                <div class="dropdown status-dropdown" id="statusDropdown">
                                    <span class="delivered">
                                        <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                        Delivered
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="/logistic/show/${data.id}" class="btn btn-success" title="View">
                                        <i class="mdi mdi-eye"></i>
                                    </a>
                                    <a href="/logistic/generatePDF/${data.id}" target="_blank" class="btn btn-primary ms-2" title="Download">
                                        <i class="mdi mdi-download"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        `;

                            tableBody.append(newRows);
                        });
                    },
                    error: function() {
                        alert('Gagal mencari data!');
                    }
                });
            }
        });
    </script>
@endpush
