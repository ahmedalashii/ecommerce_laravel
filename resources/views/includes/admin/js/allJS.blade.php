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
                // console.log($($element).closest('.nav-item-has-children').first('a'));
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


        var confirmPopUp = Swal.mixin({
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Yes',
            denyButtonText: 'No',
            customClass: {
                actions: 'my-actions',
                confirmButton: 'order-2',
                denyButton: 'order-3',
                popup: 'swal-wide',
            }
        });
        
        $('.deactivateForm').on('click', function(event) {
            // the default action of the event will not be triggered. >> or we can change the type from submit to be a normal button
            event
                .preventDefault();
            var form = $(this).parents('form');
            confirmPopUp.fire({
                title: 'Do you want to deactivate it?',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        $('.logoutForm').on('click', function(event) {
            // the default action of the event will not be triggered. >> or we can change the type from submit to be a normal button
            event
                .preventDefault();
            var form = $(this).siblings('form'); // array of sibling elements
            confirmPopUp.fire({
                title: 'Do you want to really logout?',
            }).then((result) => {
                if (result.isConfirmed) {
                    form[0].submit(); // only the first sibling
                }
            });
        });
    </script>
