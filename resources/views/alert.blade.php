{{-- Sweet Alert --}}
@if (Session::has('message'))
    <script>
        swal("Message", "{{ Session::get('message') }}", 'success', {
            button: false,
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    </script>
@endif

@if (Session::has('warning'))
    <script>
        swal("Message", "{{ Session::get('warning') }}", 'warning', {
            button: false,
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    </script>
@endif
