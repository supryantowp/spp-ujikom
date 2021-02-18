function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

function removeFormat(num) {
    return num.toString().replace(/[^0-9]/g, '')
}

function formatDate(date) {
    return (date.getMonth()+1) + "/" + date.getDate() + "/" + date.getFullYear();
}

$(".select2").select2({
    placeholder: 'Silahkan pilih'
});
