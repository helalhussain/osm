import { datatableImg, datatableButtons, datatableStatus, convertAmount } from './helper'

try {
    const dtDom = `<"row mx-1"<"col-sm-12 col-md-3" l><"col-sm-12 col-md-9"<"dt-action-buttons text-xl-end text lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center flex-wrap me-1"<"me-3"f>B>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>`;
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


$(function () {

    const dataTableInitilize = (options) => {
        var table = $('#datatable').DataTable(options);
        window.table = table
    }

    // ROLE MANAGEMENT DATATABLE
    if(route().current('admin.role.index')) {
        const options = {
            ajax: route('admin.role.index'),
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'name', name: 'name'},
                {data: 'permissions', name: 'permissions', render: (data) => data.length},
                {data: 'action', name: 'action', searchable: false, render: function (data, type, row) {
                    return datatableButtons([
                        { url: route('admin.role.edit', row.id), type: 'edit', id: false, permission: 'edit_role'},
                        { url: route('admin.role.destroy', row.id), type: 'delete', id: true, permission: 'delete_role'},
                    ])
                }},
            ]
        }
        dataTableInitilize(options)
    }

    // PERMISSION MANAGEMENT DATATABLE
    if(route().current('admin.permission.index')) {
        const options = {
            ajax: route('admin.permission.index'),
            columns: [
                {data: 'DT_RowIndex', name: 'id',searchable: false},
                {data: 'module.name', name: 'module.name'},
                {data: 'name',name: 'name'}
            ]
        }
        dataTableInitilize(options)
    }

    // USER MANAGEMENT DATATABLE
    if(route().current('admin.user.index')) {
        const options = {
            ajax: route('admin.user.index'),
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'avatar', name: 'avatar', searchable: false, orderable: false, render: (data) => datatableImg(data)},
                {data: 'role.name', name: 'role.name'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', searchable: false, orderable: false, render: function (data, type, row) {
                    return datatableButtons([
                        { url: route('admin.user.edit', row.id), type: 'edit', id: true, permission: 'edit_user'},
                        { url: route('admin.user.destroy', row.id), type: 'delete', id: true, permission: 'delete_user'},
                    ])
                }},
            ]
        }
        dataTableInitilize(options)
    }

    // Subject MANAGEMENT DATATABLE
    if(route().current('admin.subject.index')) {
        const options = {
            ajax: route('admin.subject.index'),
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'name', name: 'name'},
                {data: 'code', name: 'code'},
                { data: 'action', name: 'action', searchable: false, render: function(data, type, row) {
                    return datatableButtons([
                        { url: route('admin.subject.edit', row.id), type: 'edit', id: true, permission: 'edit_subject'},
                        { url: route('admin.subject.destroy', row.id), type: 'delete', id: true, permission: 'delete_subject'},
                    ])

                }}
            ]
        }
        dataTableInitilize(options)
    }

    // SUB CATEGORY MANAGEMENT DATATABLE
    if(route().current('admin.subcategory.index')) {
        const options = {
            ajax: route('admin.subcategory.index'),
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'name', name: 'name'},
                { data: 'action', name: 'action', searchable: false, render: function(data, type, row) {
                    return datatableButtons([
                        { url: route('admin.subcategory.edit', row.id), type: 'edit', id: true, permission: 'edit_sub_category'},
                        { url: route('admin.subcategory.destroy', row.id), type: 'delete', id: true, permission: 'delete_sub_category'},
                    ])
                }}
            ]
        }
        dataTableInitilize(options)
    }

    // SIZE MANAGEMENT DATATABLE
    if(route().current('admin.size.index')) {
        const options = {
            ajax: route('admin.size.index'),
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'name', name: 'name'},
                { data: 'action', name: 'action', searchable: false, render: function(data, type, row) {
                    return datatableButtons([
                        { url: route('admin.size.edit', row.id), type: 'edit', id: true, permission: 'edit_size'},
                        { url: route('admin.size.destroy', row.id), type: 'delete', id: true, permission: 'delete_size'},
                    ])

                }}
            ]
        }
        dataTableInitilize(options)
    }

    // CODE MANAGEMENT DATATABLE
    if(route().current('admin.color.index')) {
        const options = {
            ajax: route('admin.color.index'),
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'name', name: 'name'},
                {data: 'code', name: 'code'},
                { data: 'action', name: 'action', searchable: false, render: function(data, type, row) {
                        return datatableButtons([
                            { url: route('admin.color.edit', row.id), type: 'edit', id: true, permission: 'edit_color'},
                            { url: route('admin.color.destroy', row.id), type: 'delete', id: true, permission: 'delete_color'},
                        ])

                    }
                },
            ]
        }
        dataTableInitilize(options)
    }

    // PRODUCT MANAGEMENT DATATABLE
    if(route().current('admin.product.index')) {
        const options = {
            ajax: route('admin.product.index'),
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                { data: 'title', name: 'title' },
                { data: 'description', name: 'description' },
                { data: 'action', name: 'action', searchable: false, render: function(data, type, row) {
                    return datatableButtons([
                        { url: route('admin.product.edit', row.id), type: 'edit', id: false, permission: 'edit_product'},
                        { url: route('admin.product.destroy', row.id), type: 'delete', id: true, permission: 'delete_product'},
                    ])
                }},
            ]
        }
        dataTableInitilize(options)
    }

    // STOCK MANAGEMENT DATATABLE
    if(route().current('admin.stock.index')) {
        const options = {
            ajax: route('admin.stock.index'),
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'quantity', name: 'quantity'},
                { data: 'action', name: 'action', searchable: false, render: function(data, type, row) {
                    return datatableButtons([
                        { url: route('admin.stock.edit', row.id), type: 'edit', id: false, permission: 'edit_stock'},
                        { url: route('admin.stock.destroy', row.id), type: 'delete', id: true, permission: 'delete_stock'},
                    ])
                }},
            ]
        }
        dataTableInitilize(options)
    }
        // Fitting MANAGEMENT DATATABLE
        if(route().current('admin.fitting.index')) {
            const options = {
                ajax: route('admin.fitting.index'),
                columns: [
                    {data: 'DT_RowIndex', name: 'id', searchable: false},
                    {data: 'name', name: 'name'},
                    { data: 'action', name: 'action', searchable: false, render: function(data, type, row) {
                        return datatableButtons([
                            { url: route('admin.fitting.edit', row.id), type: 'edit', id: true, permission: 'edit_fitting'},
                            { url: route('admin.fitting.destroy', row.id), type: 'delete', id: true, permission: 'delete_fitting'},
                        ])

                    }}
                ]
            }
            console.log(options)
            dataTableInitilize(options)
        }


})
