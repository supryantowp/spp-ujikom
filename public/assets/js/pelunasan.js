$(document).ready(function () {
    let nisn,
        tanggal,
        total,
        paid,
        outstanding,
        jumlah,
        jumlah_bayar,
        unpaid_balance,
        id_spp,
        id_pembayaran

    function clearInput() {
        $('#id_pembayaran').empty()
        $("#tanggal").val('')
        $("#total").val('')
        $("#paid").val('')
        $("#outstanding").val('')
        $("#jumlah").val('')
        $("#paid_balance").val('')
        $("#unpaid_balance").val('')
    }

    $('#jumlah').on('keyup', function () {
        $('input[rel=jumlah]').bind('keyup', function () {
            let total = removeFormat($('#outstanding').val())
            let awal = 0

            $('input[rel=jumlah]').each(function () {
                this.value = removeFormat(this.value)
                if (this.value !== '') awal += parseInt(this.value, 10)
            })

            let paidbalance = total - awal
            let dibayar = formatNumber(awal)

            $('#paid_balance').val(formatNumber(dibayar))
            $('#unpaid_balance').val(paidbalance < 0 ? 0 : formatNumber(paidbalance))

            $('input[rel=jumlah]').each(function () {
                this.value = formatNumber(this.value.toString())
            })
        })
    })

    $('#id_pembayaran').on('change', function () {
        id_pembayaran = this.value

        $.ajax({
            url: `/api/spp/id/${id_pembayaran}`,
            success: function (result) {
                id_spp = result.id_spp
                id_pembayaran = result.id
                total = result.jumlah_bayar
                dibayar = result.dibayar
                outstanding = result.sisa_bayar

                $('#tanggal').val(formatDate(new Date(result.created_at)))
                $('#total').val(formatNumber(total))
                $('#paid').val(formatNumber(dibayar))
                $('#outstanding').val(formatNumber(outstanding))
                $('#unpaid_balance').val(formatNumber(outstanding))
            },
        })
    })

    $('#siswa').on('change', function () {
        nisn = this.value

        $.ajax({
            url: `/api/spp/hutang/${nisn}`,
            success: function (result) {
                clearInput()

                for (let i = 0; i < result.length; i++) {
                    $('#id_pembayaran').append(
                        `<option value="${result[i].id}" >${result[i].pembayaran_code}</option>`
                    )
                }

                if (result.length) {
                    id_spp = result[0].id_spp
                    id_pembayaran = result[0].id
                    total = result[0].jumlah_bayar
                    dibayar = result[0].dibayar
                    outstanding = result[0].sisa_bayar

                    $('#tanggal').val(formatDate(new Date(result[0].created_at)))
                    $('#total').val(formatNumber(total))
                    $('#paid').val(formatNumber(dibayar))
                    $('#outstanding').val(formatNumber(outstanding))
                    $('#unpaid_balance').val(formatNumber(outstanding))
                }
            },
        })
    })

    $('#btn-bayar').on('click', function () {
        if (!$('#payment').val() || !$('#jumlah').val()) {
            Swal.fire({
                type: 'warning',
                title: 'Error',
                text: 'form tidak boleh kosong!',
            })
        } else {
            $.ajax({
                type: 'POST',
                url: `/api/spp/balance/${id_pembayaran}`,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id_pembayaran,
                    id_spp,
                    nisn,
                    outstanding: $('#unpaid_balance').val(),
                    catatan: $('#catatan').val(),
                },
                success: function (result) {
                    Swal.fire({
                        type: 'success',
                        title: 'Berhasil',
                        text: 'berhasil melakukan transaksi'
                    })
                },
                error: function (error) {
                    Swal.fire({
                        type: 'danger',
                        title: 'Gagal',
                        text: 'Gagal melakukan transaksi'
                    })
                },
            })
        }
    })
})
