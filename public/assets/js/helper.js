function reloadPage(url, time = 2000) {
    setTimeout(() => {
        if (url) {
            window.location.href = `${window.location.origin}/${url}`
        } else {
            window.location.reload()
        }
    }, time)
}

function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

function removeFormat(num) {
    return num.toString().replace(/[^0-9]/g, '')
}

function formatDate(date) {
    return (date.getMonth() + 1) + "/" + date.getDate() + "/" + date.getFullYear();
}

function deleteData() {
    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        let deleteForm = this.parentElement
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#58db83",
            cancelButtonColor: "#ec536c",
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.value) {
                deleteForm.submit()
            }
        })
    })

}
