try {
    let dtDom = `<"row mx-1"<"col-sm-12 col-md-3" l><"col-sm-12 col-md-9"<"dt-action-buttons text-xl-end text lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center flex-wrap me-1"<"me-3"f>B>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>`;
    $.extend(true, $.fn.dataTable.defaults, {
        ordering: true,
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        oLanguage: {
            sSearchPlaceholder: "Search..."
        },
        language: {
            zeroRecords: "Nothing found - sorry",
            // info: "Showing page _PAGE_ of _PAGES_",
            infoEmpty: "No records available",
            infoFiltered: "(filtered from _MAX_ total records)"
        },
        lengthMenu: [
            [10, 25, 50, 100, 150, 200, 300, 400, 500, -1],
            [10, 25, 50, 100, 150, 200, 300, 400, 500, "All"]
        ],
        pageLength: 10,
        // dom: dtDom,
        buttons: [
            'copy', 'excel', 'pdfHtml5', 'csv', 'print' //, 'colvis'
        ],
        order: [[0, 'desc']],
    });
} catch (error) {
    console.log(error);
}


// $(document).ready(function () {
//     $("#datatable").DataTable(),
//         $("#datatable-buttons")
//             .DataTable({
//                 lengthChange: !1,
//                 buttons: ["copy", "excel", "pdf", "colvis"],
//             })
//             .buttons()
//             .container()
//             .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"),
//         $(".dataTables_length select").addClass("form-select form-select-sm");
// });
