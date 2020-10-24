<form action="" method="POST" id="delete-form">
    @method('DELETE')
    @csrf
</form> 

<form action="" method="POST" id="confirm-form">
    @csrf
</form> 

<script>
    $(document).ready(function(){
        if ($('.delete-btn').length > 0 ) {

            $('.delete-btn').on('click', function(e){
                e.preventDefault();
                var href = $(this).attr('href');
                Swal.fire({
                    title: "Konfirmasi",
                    text: "Data yang di hapus tidak dapat di kembalikan!", 
                    icon: "warning",
                    onClose: '',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus data',
                    confirmButtonColor: '#e74a3b',
                    cancelButtonText: 'Batalkan',
                    cancelButtonColor: '#555',
                    preConfirm: false
                })
                .then((result) => {
                    if (typeof result.value !== 'undefined') {
                        if (result.value === true) {
                            $('#delete-form').attr('action',href).submit();
                        }
                    }
                });
            });
        }

        $('.confirm-btn').on('click', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            var title = $(this).attr('title');
            var content = $(this).attr('content');
            swal({
                title: title,
                text: content, 
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((next) => {
              if (next) {
                $('#confirm-form').attr('action',href).submit();
              }
            });
        });
    });
</script>
@if(session('success'))
<script>
iziToast.success({
    title: 'Success',
    message: "{{ session('success') }}",
    position : "topRight",
});
</script>
@elseif(session('error'))
<script>
iziToast.error({
    title: 'Whoops!',
    message: "{{ session('error') }}",
    position : "topRight",
});
</script>
@endif

{{-- @if($errors->any())
@foreach($errors->all() as $error)
<script>
iziToast.error({
    title: 'Whoops!',
    message: "{{ $error }}",
    position : "topRight",
});
</script>
@endforeach --}}
{{-- @endif --}}