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
            <tr>

            </tr>
        </table>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="mb-3">
                        <table>
                            <tr>
                                <th>No.</th>
                                <th>Jenis</th>
                                <th>Action</th>
                            </tr>
                            
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script>

        const exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', event => {
  // Button that triggered the modal
  const button = event.relatedTarget
  // Extract info from data-bs-* attributes
  const fppp_id = button.getAttribute('data-bs-id')
  const project_name = button.getAttribute('data-bs-title')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  const modalTitle = exampleModal.querySelector('.modal-title')
  const modalBodyInput = exampleModal.querySelector('.modal-body input')

  modalTitle.textContent = `Impot: ${project_name}`
  modalBodyInput.value = fppp_id
})

    </script>

</body>

</html>