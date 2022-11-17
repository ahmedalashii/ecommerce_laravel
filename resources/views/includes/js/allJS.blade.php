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
        @elseif (session('fail'))
            Swal.fire({
                title: "{{ session('fail') }}",
                toast: true,
                showConfirmButton: false,
                position: "bottom-end",
                icon: "{{ session('type') }}",
            });
        @endif

        $(".sidebar-nav").find('.nav-item-has-children ul li a').each(function($index, $element) {
            if (window.location.href == $($element).attr('href')) {
                $($element).addClass("active");
                console.log($($element).closest('.nav-item-has-children').first('a'));
                $($element).closest('.nav-item-has-children').find('.collapsed').removeClass('collapsed');
                $($element).closest('.dropdown-nav').addClass('show');
            }
        });

        $('#user_picture').change(function(event) {
            var output = document.getElementById('picture_user');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        });
    </script>
