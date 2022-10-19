const exampleModal = document.getElementById("exampleModal");
exampleModal.addEventListener("hide.bs.modal", (event) => {
    document.querySelector(".file-upload-default").value = "";
    document.querySelector(".file-upload-info").value = "";
});
exampleModal.addEventListener("show.bs.modal", (event) => {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    const base_path = button.getAttribute("data-bs-base-path");
    const fppp_id = button.getAttribute("data-bs-id");
    let fppp_files = button.getAttribute("data-bs-files");
    fppp_files = fppp_files.replaceAll(base_path, "");
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
    const fileSelector = exampleModal.querySelector("#file-selector");
    let existingFileArr = [0, 0, 0, 0];

    let modalTableContent = `<tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Jenis</th>
                                <th class="text-center">Action</th>
                            </tr>
                            `;

    files_arr.forEach((element, index) => {
        if (element.includes("detail_wo")) {
            existingFileArr[0] = 1;
        } else if (element.includes("bom_alumunium")) {
            existingFileArr[1] = 1;
        } else if (element.includes("bom_aksesoris")) {
            existingFileArr[2] = 1;
        } else if (element.includes("wo_potong_alumunium")) {
            existingFileArr[3] = 1;
        }
        element = base_path + element;
        let simplePath = element.replace(base_path, "");
        simplePath = simplePath.substring(1);
        jenisRaw = simplePath.slice(0, simplePath.lastIndexOf("/"));
        jenisRaw = jenisRaw.replace("/", "");
        jenis = jenisRaw.replace("_", " ");
        jenis = jenis.replace("/", "");
        modalTableContent += `<tr>
                                <td class="text-center">${index + 1}.</td>
                                <td class="text-center">${jenis}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="${element}" target="_blank" class="btn btn-primary me-2 btn-sm btn-info">Lihat</a>

                                    
                                </td>
                            </tr>`;
    });

    let fileSelectorOption = "";
    if (existingFileArr[0] == 0) {
        fileSelectorOption += `<option value="detail_wo">
                                Detail WO(.xlsx)</option>`;
    }
    if (existingFileArr[1] == 0) {
        fileSelectorOption += `<option value="bom_alumunium">
                                BOM Alumunium(.xlsx)
                            </option>`;
    }
    if (existingFileArr[2] == 0) {
        fileSelectorOption += `<option value="bom_aksesoris">
                                BOM Aksesoris(.xlsx)
                            </option>`;
    }
    if (existingFileArr[3] == 0) {
        fileSelectorOption += `<option value="wo_potong_alumunium">
                                WO Potong Alumunium(.pdf)
                            </option>`;
    }
    fileSelector.innerHTML = fileSelectorOption;
    modalTitle.textContent = `Impot: ${project_name}`;
    modalBodyInput.value = fppp_id;
    modalTable.innerHTML = modalTableContent;
});
