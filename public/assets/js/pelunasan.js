let nisn, total, outstanding, id_spp, id_pembayaran, dibayar

const token = document.querySelector('meta[name="csrf-token"]').content

const idPembayaran = document.getElementById('id_pembayaran')
const inpSiswa = document.getElementById('siswa')
const tanggal = document.getElementById('tanggal')
const inpTotal = document.getElementById('total')
const inpPaid = document.getElementById('paid')
const inpOutstanding = document.getElementById('outstanding')
const inpJumlah = document.getElementById('jumlah')
const inpCatatan = document.getElementById('catatan')
const inpPaidBalance = document.getElementById('paid_balance')
const inpUnpaidBalance = document.getElementById('unpaid_balance')
const btnBayar = document.getElementById('btn-bayar');

const clearInput = () => {
    while (idPembayaran.firstChild)
        idPembayaran.removeChild(idPembayaran.firstChild)
    tanggal.value = ''
    inpTotal.value = ''
    inpPaid.value = ''
    inpOutstanding.value = ''
    inpJumlah.value = ''
    inpPaidBalance.value = ''
    inpUnpaidBalance.value = ''
}

function jumlahKeyupHandler() {
    $('input[rel=jumlah]').bind('keyup', function () {
        let total = removeFormat(inpOutstanding.value)
        let awal = 0

        $('input[rel=jumlah]').each(function () {
            this.value = removeFormat(this.value)
            if (this.value !== '') awal += parseInt(this.value, 10)
        })

        let paidbalance = total - awal
        let dibayar = formatNumber(awal)
        inpPaidBalance.value = formatNumber(dibayar)
        inpUnpaidBalance.value = paidbalance < 0 ? 0 : formatNumber(paidbalance)

        $('input[rel=jumlah]').each(function () {
            this.value = formatNumber(this.value.toString())
        })
    })
}

async function idPembayaranHandler() {
    id_pembayaran = this.value
    await fetch(`/api/spp/id/${id_pembayaran}`)
        .then((res) => res.json())
        .then((data) => {
            id_spp = data.id_spp
            id_pembayaran = data.id
            total = data.jumlah_bayar
            dibayar = data.dibayar
            outstanding = data.sisa_bayar

            tanggal.value = formatDate(new Date(data.created_at))
            inpTotal.value = formatNumber(total)
            inpPaid.value = formatNumber(dibayar)
            inpOutstanding.value = formatNumber(outstanding)
            inpUnpaidBalance.val = formatNumber(outstanding)
        })
}

async function inpSiswaHanlder() {
    nisn = this.value
    await fetch(`/api/spp/hutang/${nisn}`)
        .then((res) => res.json())
        .then(data => {
            clearInput()

            for (let i = 0; i < data.length; i++) {
                $('#id_pembayaran').append(
                    `<option value="${data[i].id}" >${data[i].pembayaran_code}</option>`
                )
            }

            if (data.length) {
                id_spp = data[0].id_spp
                id_pembayaran = data[0].id
                total = data[0].jumlah_bayar
                dibayar = data[0].dibayar
                outstanding = data[0].sisa_bayar

                tanggal.value = formatDate(new Date(data[0].created_at))
                inpTotal.value = formatNumber(total)
                inpPaid.value = formatNumber(dibayar)
                inpOutstanding.value = formatNumber(outstanding)
                inpUnpaidBalance.value = formatNumber(outstanding)
            }

        })
}

async function btnBayarHandler(e) {
    if (inpSiswa.value && inpJumlah.value) {
        await fetch(`/api/spp/balance/${id_pembayaran}`,
            {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id_pembayaran,
                    id_spp,
                    nisn,
                    outstanding: inpOutstanding.value,
                    unpaid: inpUnpaidBalance.value,
                    paid: inpPaidBalance.value,
                    catatan: inpCatatan.value
                })
            })
            .then((res) => {
                Swal.fire({
                    title: 'Berhasil',
                    type: 'success',
                    text: 'berhasil melakukan transaksi'
                })

                reloadPage()
            })
            .catch((err) => {
                console.log({ err })
                Swal.fire({
                    title: 'Error',
                    type: 'error',
                    text: 'terjadi kesalahan'
                })

                reloadPage()
            })
    } else {
        Swal.fire({
            title: 'Form kosong!',
            text: 'form tidak boleh kosong',
            type: 'warning'
        })
    }

}

inpJumlah.addEventListener('keyup', jumlahKeyupHandler)
btnBayar.addEventListener('click', btnBayarHandler)
$('#id_pembayaran').on('change', idPembayaranHandler)
$('#siswa').on('change', inpSiswaHanlder)

$(".select2").select2({
    placeholder: 'Silahkan pilih'
})
