<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <form action="/fppp" class="d-flex mt-5">
            <input type="text" name="search" id="search" placeholder="Cari bernasarkan No. FPPP, jenis proyek, atau aplikator" class="form-control">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        @if ($message = Session::get('failed'))
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
            
        <table class="table table-striped-columns">
            <tr>
                <th>No. FPPP</th>
                <th>Nama Proyek</th>
                <th>Aplikator</th>
                <th>Action</th>
            </tr>
            
            @foreach ($all_fppp as $fppp)
            <tr>
                <td>{{ $fppp->FPPP_number }}</td>
                <td>{{ $fppp->project_name }}</td>
                <td>{{ $fppp->applicator_name }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="{{ $fppp->id }}" data-bs-title="{{ $fppp->project_name }}" data-bs-files="{{ "{$fppp->file_bom_alumunium} {$fppp->file_bom_aksesoris} {$fppp->file_wo_alumunium} {$fppp->file_wo_kaca}" }}">Import</button>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="modal modal-xl fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/fppp" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="text" name="id" hidden>
                    
                    <div class="mb-3">
                        <label class="col-form-label">Pilih Jenis</label>
                        <select class="form-select" aria-label="Default select example" name="type">
                            <option value="bom_alumunium">BOM Alumunium</option>
                            <option value="bom_aksesoris">BOM Aksesoris</option>
                            <option value="wo_alumunium">WO Alumunium</option>
                            <option value="wo_kaca">WO Kaca</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Import File</label>
                        <input class="form-control" type="file" id="formFile" name="file">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    

                </div>
                </form>
                <div class="mb-3 p-2">
                        <div class="text-primary fw-bold">File yang telah diupload</div>
                        <table class="table" id="files_table">
                            
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{ $all_fppp->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script>

        const exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', event => {
  // Button that triggered the modal
  const button = event.relatedTarget
  // Extract info from data-bs-* attributes
  const fppp_id = button.getAttribute('data-bs-id')
  const fppp_files = button.getAttribute('data-bs-files')
  const files_arr = fppp_files.split(" ").filter(e =>  e)
  console.log(files_arr)
  const project_name = button.getAttribute('data-bs-title')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  const modalTitle = exampleModal.querySelector('.modal-title')
  const modalBodyInput = exampleModal.querySelector('.modal-body input')
  const modalTable = exampleModal.querySelector('#files_table')

  let modalTableContent = `<tr>
                                <th>No.</th>
                                <th>Jenis</th>
                                <th>Action</th>
                            </tr>
                            `;


files_arr.forEach((element, index) => {
    jenisRaw = element.slice(0,element.indexOf("/"))
    jenis = jenisRaw.replace("_"," ")
    modalTableContent += `<tr>
                                <td>${index+1}.</td>
                                <td>${jenis}</td>
                                <td class="d-flex">
                                    <a href="/fppp/file?path=${element}" target="_blank" class="btn btn-primary me-2">Lihat</a>
                                    <form action="/fppp/delete" method="POST">
                                        @csrf
                                        <input type="hidden" name="type" value="${jenisRaw}">
                                        <input type="hidden" name="path" value="${element}">
                                        <input type="hidden" name="id" value="${fppp_id}">
                                        <button type="submit" class="btn btn-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>`
    
});
  modalTitle.textContent = `Impot: ${project_name}`
  modalBodyInput.value = fppp_id
  modalTable.innerHTML = modalTableContent;
})

    </script>

</body>

</html>