@if (Session::has('success'))
    <script>
        swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: "{{ Session::get('success') }}",
            confirmButtonText: 'Aceptar'
        })
    </script>
@elseif (Session::has('updated'))
    <script>
        swal.fire({
            icon: 'info',
            title: 'Éxito',
            text: "{{ Session::get('updated') }}",
            confirmButtonText: 'Aceptar'
        })
    </script>
@elseif (Session::has('deleted'))
    <script>
        swal.fire({
            icon: 'question',
            title: 'Eliminado',
            text: "{{ Session::get('deleted') }}",
            confirmButtonText: 'Cerrar'
        })
    </script>
@elseif (Session::has('error'))
    <script>
        swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ Session::get('error') }}",
            confirmButtonText: 'Cerrar'
        })
        console.log("{{ Session::get('code') }}");
    </script>

@endif

