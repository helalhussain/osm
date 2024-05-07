    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('teacher') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="{{ asset('teacher') }}/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{ asset('teacher') }}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('teacher') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/swiper/swiper.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('teacher') }}/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('teacher') }}/assets/js/dashboards-analytics.js"></script>

@if (request()->is('account/profile'))
 <!-- Profile JS -->
 <script src="{{ asset('teacher') }}/assets/js/pages-profile.js"></script>
@endif
<script src="{{ asset('teacher') }}/assets/js/app-chat.js"></script>

    <!-- Message JS -->

    <script src="{{ asset('teacher') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/popper/popper.js"></script>

    <!--Drop down not support--->
    {{-- <script src="{{ asset('teacher') }}/assets/vendor/js/bootstrap.js"></script> --}}
    <script src="{{ asset('teacher') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="{{ asset('teacher') }}/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{ asset('teacher') }}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('teacher') }}/assets/vendor/libs/quill/katex.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/quill/quill.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('teacher') }}/assets/vendor/libs/block-ui/block-ui.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('teacher') }}/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('teacher') }}/assets/js/app-email.js"></script>

    <!-- End Message JS -->

<script src="{{ asset('admin/assets/js/main.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.js') }}"></script>
</body>
</html>
