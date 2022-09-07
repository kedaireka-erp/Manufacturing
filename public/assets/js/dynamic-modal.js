const exampleModal = document.getElementById("exampleModal");
exampleModal.addEventListener("show.bs.modal", (event) => {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    const fppp_id = button.getAttribute("data-bs-id");
    const fppp_files = button.getAttribute("data-bs-files");
    const files_arr = fppp_files.split(" ").filter((e) => e);
    console.log(files_arr);
    const project_name = button.getAttribute("data-bs-title");
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    const modalTitle = exampleModal.querySelector(".modal-title");
    const modalBodyInput = exampleModal.querySelector(".modal-body input");
    const modalTable = exampleModal.querySelector("#files_table");

    let modalTableContent = `<tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Jenis</th>
                                <th class="text-center">Action</th>
                            </tr>
                            `;

    files_arr.forEach((element, index) => {
        jenisRaw = element.slice(0, element.indexOf("/"));
        jenis = jenisRaw.replace("_", " ");
        modalTableContent += `<tr>
                                <td class="text-center">${index + 1}.</td>
                                <td class="text-center">${jenis}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="/fppp/file?path=${element}" target="_blank" class="btn btn-primary me-2 btn-sm btn-info">Lihat</a>
                                    <a href="/fppp/file/delete?path=${element}&type=${jenisRaw}&id=${fppp_id}" class="btn btn-danger btn-sm">Hapus</a>

                                    
                                </td>
                            </tr>`;
    });
    modalTitle.textContent = `Impot: ${project_name}`;
    modalBodyInput.value = fppp_id;
    modalTable.innerHTML = modalTableContent;
});
