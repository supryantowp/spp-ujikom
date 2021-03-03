let siswa_nisn, id_spp, jumlah_bayar, tot = 0

const token = document.querySelector('meta[name="csrf-token"]').content
const btnBayar = document.getElementById('btn-bayar')
const iDibayar = document.getElementById('dibayar')
const iUnpaid = document.getElementById('unpaid')
const iChange = document.getElementById('change')
const iJumlahBayar = document.getElementById('jumlah_bayar')
const iJumlah = document.getElementById('jumlah')
const iSpp = document.getElementById('spp')
const iCatatan = document.getElementById('catatan')
const iBulanDibayar = document.getElementById('bulan_dibayar')

function hitung() {
    $("input[rel=jumlah]").bind('keyup', function () {
        let total = removeFormat(iJumlahBayar.value);
        let awal = 0;

        $("input[rel=jumlah]").each(function () {
            this.value = removeFormat(this.value);
            if (this.value != '') awal += parseInt(this.value, 10);
        });

        let totalpembayaran = total - awal;
        let dibayar = formatNumber(awal)
        let change = awal - removeFormat(total)

        iDibayar.value = dibayar
        iUnpaid.value = totalpembayaran < 0 ? 0 : formatNumber(totalpembayaran)
        iChange.value = change < 0 ? 0 : formatNumber(change)

        $("input[rel=jumlah]").each(function () {
            this.value = formatNumber(this.value.toString())
        });

    })
}

function sppChangeHandler() {
    id_spp = this.value
    tot = $('option:selected', this).attr('data-harga')
    let toto = $("#bulan_dibayar").val().length * tot
    iJumlahBayar.value = formatNumber(toto)
    iUnpaid.value = formatNumber(tot)
}

function bulanDibayarHandler() {
    tot += jumlah_bayar
    iJumlahBayar.value = formatNumber(tot)
    iUnpaid.value = formatNumber(tot)
}

async function siswaChangeHandler() {
    if (this.value !== null) {
        siswa_nisn = this.value
        $('#form-siswa').show()
    } else {
        $('#form-siswa').hide()
    }

    await fetch('/api/spp')
        .then((res) => res.json())
        .then((data) => {
            if (!data.length) {
                alert('spp tidak ada')
            }
            $("#spp").empty()
            for (let i = 0; i < data.length; i++) {
                $('#spp').append(
                    `<option value="${data[i].nominal}" data-harga="${data[i].nominal}" >${data[i].tahun}</option>`
                )
            }

            id_spp = data[0].id
            jumlah_bayar = data[0].nominal

            iJumlahBayar.value = formatNumber(jumlah_bayar)
            iUnpaid.value = formatNumber(jumlah_bayar)
        })
        .catch((err) => {
            console.log({ err })
            Swal.fire({
                title: 'Error',
                text: 'terjadi kesalahan',
                type: 'error'
            })
        })

}

async function bayarHandler() {
    if (iBulanDibayar.value.length === 0 || !iJumlah.value) {
        Swal.fire({
            title: 'Form kosong!',
            text: 'form tidak boleh kosong',
            type: 'warning'
        })
    } else {
        await fetch(`/api/spp/${siswa_nisn}`, {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                nisn: siswa_nisn,
                bulan_dibayar: $("#bulan_dibayar").val(),
                id_spp,
                jumlah_bayar: iJumlahBayar.value,
                sisa_bayar: iUnpaid.value,
                dibayar: iDibayar.value,
                catatan: iCatatan.value
            })
        })
            .then((res) => res.json())
            .then((data) => {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'berhasil melakukan transaksi',
                    type: 'success'
                }).then((res) => {
                    reloadPage(`dashboard/siswa/${data.siswa.id}/transaksi/${data.id}`, 0)
                })

            })
            .catch((err) => {
                Swal.fire({
                    title: 'Error',
                    text: 'terjadi kesalahan',
                    type: 'error'
                })

                reloadPage()
            })

    }


}

iJumlah.addEventListener('keyup', hitung)
btnBayar.addEventListener('click', bayarHandler)

$("#spp").on('change', sppChangeHandler)
$("#siswa").on('change', siswaChangeHandler)
$("#bulan_dibayar").on('change', bulanDibayarHandler)


$(".select2").select2({
    placeholder: 'Silahkan pilih'
})
