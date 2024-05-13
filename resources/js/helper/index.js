export function insertLineBreaks(text, wordsPerLine) {
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



export function successAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Data berhasil ditambahkan',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
    })
}

export function successResetPasswordAlert() {
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

export function errorAlert() {
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

export function warningAlert() {
    Swal.fire({
        title: 'Peringatan',
        text: 'Input tidak boleh kos !',
        icon: 'warning',
        timer: 5000,
        showConfirmButton: true
    });
}

export function protectedAlert() {
    Swal.fire({
        title: 'warning',
        text: 'Anda telah melakukan perubahan terhadap sistem, anda akan di kembalikan ke halaman home!',
        icon: 'warning',
        timer: 5000,
        showConfirmButton: false
    });
}

export function warningExtentionAlert() {
    Swal.fire({
        title: 'Peringatan',
        text: 'Format file tidak di dukung !',
        icon: 'warning',
        timer: 5000,
        showConfirmButton: true
    });
}

export function deleteAlert() {
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

export function failedDeleteDataAlert() {
    Swal.fire({
        title: 'Gagal menghapus data',
        text: 'Data sedang digunakan !',
        icon: 'error',
        timer: 5000,
        showConfirmButton: true
    });
}

export function successDeleteAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Data berhasil dihapus',
        icon: 'success',
        timer: 5000,
        showConfirmButton: true
    })
}

export function decodeEntities(encodedString) {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = encodedString;
    return textArea.value;
}

export function stripHtmlTags(text) {
    var div = document.createElement("div");
    div.innerHTML = text;
    return div.textContent || div.innerText || "";
}

export function truncateString(str) {
    var words = str.split(' ');
    if (words.length <= 5) {
        return str;
    } else {
        return words.slice(0, 5).join(' ') + '...';
    }
}
