/*
     * ============================
     * Select2 - Province with ajax
     * ============================ 
     */
$('.select2-province').select2({
    placeholder: 'Masukkan nama provinsi',
    minimumInputLength: 3,
    theme: 'bootstrap4',
    ajax: {
        url: '/find-province',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {

            return {
                results: $.map(data, function (res) {
                    return {
                        text: toTitleCase(res.name),
                        id: res.id
                    }
                })
            };
        },
        cache: true
    }
}).on('change', function () {
    $('.select2-city').empty()
    $('.select2-district').empty()
    $('.select2-village').empty()
});

/*
 * ============================
 * Select2 - City with ajax
 * ============================ 
 */
$('.select2-city').select2({
    placeholder: 'Masukkan nama kota / kabupaten',
    minimumInputLength: 3,
    theme: 'bootstrap4',
    ajax: {
        url: '/find-city',
        dataType: 'json',
        data: function (term, page) {
            return {
                q: term, // search term
                qid: $('.select2-province').val(), //Get your value from other elements using Query, for example.
            };
        },
        delay: 250,
        processResults: function (data) {
            return {
                results: $.map(data, function (res) {
                    return {
                        text: toTitleCase(res.name),
                        id: res.id
                    }
                })
            };
        },
        cache: true
    }
}).on('change', function () {
    $('.select2-district').empty()
    $('.select2-village').empty()
});

/*
 * ============================
 * Select2 - District with ajax
 * ============================ 
 */
$('.select2-district').select2({
    placeholder: 'Masukkan nama kecamatan',
    minimumInputLength: 3,
    theme: 'bootstrap4',
    ajax: {
        url: '/find-district',
        dataType: 'json',
        data: function (term, page) {
            return {
                q: term, // search term
                qid: $('.select2-city').val(), //Get your value from other elements using Query, for example.
            };
        },
        delay: 250,
        processResults: function (data) {
            return {
                results: $.map(data, function (res) {
                    return {
                        text: toTitleCase(res.name),
                        id: res.id
                    }
                })
            };
        },
        cache: true
    }
}).on('change', function () {
    $('.select2-village').empty()
});

/*
 * ============================
 * Select2 - Village with ajax
 * ============================ 
 */
$('.select2-village').select2({
    placeholder: 'Masukkan nama kelurahan',
    minimumInputLength: 3,
    theme: 'bootstrap4',
    ajax: {
        url: '/find-village',
        dataType: 'json',
        data: function (term, page) {
            return {
                q: term, // search term
                qid: $('.select2-district').val(), //Get your value from other elements using Query, for example.
            };
        },
        delay: 250,
        processResults: function (data) {
            console.log(data)
            return {
                results: $.map(data, function (res) {
                    return {
                        text: toTitleCase(res.name),
                        id: res.id
                    }
                })
            };
        },
        cache: true
    }
});

/* ============================================================
 * Select2 - Medical with ajax
 * ============================================================ */
$('.select2-medical').select2({
    placeholder: 'Masukkan nama medical',
    minimumInputLength: 3,
    theme: 'bootstrap4',
    ajax: {
        url: '/find-medical',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
            return {
                results: $.map(data, function (res) {
                    return {
                        text: res.name,
                        id: res.id
                    }
                })
            };
        },
        cache: true
    }
});

function toTitleCase(str) {
    return str.replace(/\w\S*/g, function (txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}