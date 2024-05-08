function paramsUrl(url, params) {
    if (params) {
        return url + '?' + $.param(params)
    }
    return url
}

function paginationLink(element, params) {
    let html = '';
    params.data.links.forEach((link, index) => {
        if (index === 0) {
            html += `
                <li class="page-item ${params.data.prev_page_url ? '' : 'disabled'}">
                    <a class="page-link" href="${params.data.prev_page_url && typeof params.data.prev_page_url === 'string' ? params.data.prev_page_url : '#'}" aria-label="Previous" id="pagination-prev" >
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            `;
        } else if (index === params.data.links.length - 1) {
            html += `
                <li class="page-item ${params.data.next_page_url ? '' : 'disabled'}">
                    <a class="page-link" href="${params.data.next_page_url && typeof params.data.next_page_url === 'string' ? params.data.next_page_url : '#'}" aria-label="Next" id="pagination-next" >
                        <span aria-hidden="true">»</span></span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            `;
        } else {
            html += `
                <li class="page-item ${link.active ? 'active' : ''}"><a class="page-link" href="${link.url}">${link.label}</a></li>
            `;
        }
    });
    element.innerHTML = html;
}


function successAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Data berhasil ditambahkan',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
    })
}

function successResetPasswordAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Password berhasil direset',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
    })
}

function successSettingPasswordAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Password berhasil diperbaharui',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
    })
}

function errorAlert() {
    Swal.fire({
        title: 'Error!',
        text: 'Terjadi kesalahan',
        icon: 'error',
        timer: 5000,
        showConfirmButton: true
    }).then(function () {
        window.location.reload();
    });
}

function warningAlert() {
    Swal.fire({
        title: 'Peringatan',
        text: 'Input tidak boleh kosong !',
        icon: 'warning',
        timer: 5000,
        showConfirmButton: true
    });
}

function protectedAlert() {
    Swal.fire({
        title: 'warning',
        text: 'Anda telah melakukan perubahan terhadap sistem, anda akan di kembalikan ke halaman home!',
        icon: 'warning',
        timer: 5000,
        showConfirmButton: false
    });
}

function warningExtentionAlert() {
    Swal.fire({
        title: 'Peringatan',
        text: 'Format file tidak di dukung !',
        icon: 'warning',
        timer: 5000,
        showConfirmButton: true
    });
}

function deleteAlert() {
    return Swal.fire({
        title: 'Hapus ?',
        text: 'Anda tidak dapat mengembalikan  ini',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ya',
        reverseButtons: true,
    })
}

function failedDeleteDataAlert() {
    Swal.fire({
        title: 'Gagal menghapus data',
        text: 'Data sedang digunakan !',
        icon: 'error',
        timer: 5000,
        showConfirmButton: true
    });
}

function successDeleteAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Data berhasil dihapus',
        icon: 'success',
        timer: 5000,
        showConfirmButton: true
    })
}


function insertLineBreaks(text, wordsPerLine) {
    const words = text.split(' ');
    let newText = '';
    let wordCount = 0;

    for (let i = 0; i < words.length; i++) {
        newText += words[i] + ' ';
        wordCount++;

        if (wordCount === wordsPerLine) {
            newText += '<br>';
            wordCount = 0;
        }
    }

    return newText.trim();
}

function stripHtmlTags(text) {
    var div = document.createElement("div");
    div.innerHTML = text;
    return div.textContent || div.innerText || "";
}

const dataNotFound = () => {
    const emptyInfoTemplate = `
        <tr class="text-center text-muted" id="template-empty-info">
            <td colspan="9" class="">
                <i class="fas fa-folder-open mr-1"></i> Data tidak ditemukan ...
            </td>
        </tr>`;
    return emptyInfoTemplate;
}