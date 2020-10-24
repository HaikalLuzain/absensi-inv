$('.select2').select2({
    minimumInputLength: 3, // only start searching when the user has input 3 or more characters
    theme: 'bootstrap4'
});

$('.dropify').dropify({
    messages: {
        'default': $(this).attr('message'),
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});

$('.datetimepicker').datetimepicker({
    autoclose: true,
    startDate: new Date()
});