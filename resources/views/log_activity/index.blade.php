@extends('layouts.admin')
@section('content')
{{-- <div class="content-wrapper bg-img"> --}}

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
                        <h2 class="card-title mb-0">Log Aktifitas</h2>
                        <h5 class="card-bredcrumb mb-0"><a href="#" class="text-secondary">Manufaktur / </a><a
                                href="#" class="text-primary">Log Aktifitas</a></h5>
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
                                        <input type="text" class="form-control bg-transparent border-0" placeholder="Cari User ID/Deskripsi..." id="fppp-search" name="search">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive" id="fppp-content">
                            <table class="table table-striped" >
                                <tr class="text-center">
                                    <th>User(ID)</th>
                                    <th>IP</th>
                                    <th>Waktu</th>
                                    <th>Deskripsi</th>
                                </tr>
                                @if (!is_null($log_activities))
                                    @foreach ($log_activities as $log)
                                    <tr class="text-center">
                                        <td>{{ $log->user->name }}({{ $log->user_id}})</td>
                                        <td>{{ $log->ip }}</td>
                                        <td>{{ $log->created_at }}</td>
                                        <td>
                                            {{ $log->description }}
                                            <ul>
                                                
                                                @if (!is_null($log->new_value))
                                                    @foreach (json_decode($log->new_value) as $property=>$value)
                                                        <li>
                                                            <strong>{{ $property }}</strong> dengan value <strong>{{ $value }}</strong>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </table>
                            <div class="mt-4">
                                {{ $log_activities->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}


@endsection
@push('script')
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
        fetch('/logs?search='+keyword)
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
@endpush
