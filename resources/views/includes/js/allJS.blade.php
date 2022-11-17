    <!-- ========= All Javascript files linkup ======== -->
    {{-- <script src="{{ asset('admin-panel/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('admin-panel/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin-panel/js/polyfill.js') }}"></script>
    <script src="{{ asset('admin-panel/js/main.js') }}"></script>
    <script src="{{ asset('admin-panel/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('admin-panel/plugins/plugins.bundle.js') }}"></script>

    <script>
        @if (session('success'))
            Swal.fire({
                title: "{{ session('success') }}",
                toast: true,
                showConfirmButton: false,
                position: "bottom-end",
                icon: "{{ session('type') }}",
            });
        @endif
    </script>
