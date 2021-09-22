/* ------------------------------------------------------------------------------
 *
 *  # Select extension for Datatables
 *
 *  Demo JS code for datatable_extension_select.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------



var DatatableSelect = function() {


    // Basic Datatable examples
    var _componentDatatableSelect = function() {

        $(".multi-select-toolbar").hide();


        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        // Setting datatable defaults
        $.extend($.fn.dataTable.defaults, {

            processing: true,
            serverSide: true,
            autoWidth: false,
            columnDefs: [{
                orderable: false,
                width: 100,
                targets: [5]
            }],
            dom: 'Blfrtip',
            iDisplayLength: 50,
            buttons: [
                { extend: 'copy', className: 'btn btn-outline-primary' },
                { extend: 'excel', className: 'btn btn-outline-primary' },
                { extend: 'csv', className: 'btn btn-outline-primary' },
                { extend: 'pdf', className: 'btn btn-outline-primary' },
                { extend: 'colvis', className: 'btn btn-outline-primary' },
                { extend: 'selectAll', className: 'btn btn-outline-primary' },
                { extend: 'selectNone', className: 'btn btn-outline-primary mr-r-20' },

            ],
            select: {
                style: 'multi'
            },

            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ ',
                buttons: {
                    selectAll: "Select all",
                    selectNone: "Unselect"
                },

                processing: 'loading...',

                paginate: {
                    'previous': '<i class="fas fa-chevron-left"></i>',
                    'next': '<i class=" fas fa-chevron-right"></i>'
                }
            },
        });


        // Apply custom style to select
        $.extend($.fn.dataTableExt.oStdClasses, {
            "sLengthSelect": "custom-select"
        });



        var table = $('#users-table').DataTable({
            columnDefs: [{
                "defaultContent": "-",
                "targets": "_all"
            }],
            ajax: {
                url: "/users",


            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'id',
                    name: 'production id',
                    render: function(data) {
                        return 'u' + data;
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'team',
                    name: 'team'
                },
                {
                    data: 'image_id',
                    orderable: false,
                    searchable: false,
                    printable: false,
                    name: 'profile',
                    render: function(data) {
                        return '<img class="profile-image" src="https://widgetwhats.com/app/uploads/2019/11/free-profile-photo-whatsapp-4.png" >'
                    }
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'telegram_id',
                    name: 'telegram id'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, full, meta) {
                        if (data === 'active') {
                            return '<span class="badge badge-success">' + data + '</span>';
                        } else {
                            return '<span class="badge badge-danger">' + data + '</span>';
                        }

                    }
                },
                {
                    data: 'created_at',
                    name: 'created at'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    printable: false,
                }
            ],
        });

        table.on('processing.dt', function(e, settings, processing) {
            $('#processingIndicator').css('display', 'none');
            if (processing) {
                $(e.currentTarget).LoadingOverlay("show", {
                    background: "#252b360d",
                    zIndex: 10,
                    maxSize: 30
                });
            } else {
                $(e.currentTarget).LoadingOverlay("hide", true);
            }
        })

        $('#refreshBtn').on('click', function() {
            table.ajax.reload();
        });

        $('body').on('click', '.deleteButton', function() {
            deleteItem($(this).data('id'));
        });

        function deleteItem(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You Are going to Delete Item with id : " + id,
                icon: 'warning',

                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger',
                },
                buttonsStyling: true,
                showCancelButton: true,

            }).then((result) => {
                if (result.isConfirmed) {
                    sendDeleteItemRequest(id);
                } else {
                    Swal.fire({
                        title: '',
                        text: 'operation cancled!',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger',
                        },
                    })
                }
            })
        }

        table.on('select', function(e, dt, type, indexes) {
            manageMultiSelectToolbar(type, dt);
        });

        table.on('deselect', function(e, dt, type, indexes) {
            manageMultiSelectToolbar(type, dt);
        });

        $("#delete_selected_rows").click(function() {
            var items_to_delete = [];
            table.rows({
                selected: true
            }).every(function() {
                items_to_delete.push(this.data());
                console.log(this.data());
            });
            deleteConfirmation(items_to_delete, function() {
                deleteSelectedRows(items_to_delete);
            })

        });

        function deleteConfirmation(items_to_delete, op) {
            swal.fire({
                    title: "Are you sure?",
                    text: "Once clicked, you will delete " + items_to_delete.length + " items",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger',
                    },
                })
                .then((willDelete) => {
                    if (willDelete) {
                        op();
                    } else {
                        swal("operation canceled!", {
                            icon: 'error',
                            button: false,
                            customClass: {
                                confirmButton: 'btn btn-success',
                                cancelButton: 'btn btn-danger',
                            },
                        });
                    }
                });
        }

        function manageMultiSelectToolbar(type, dt) {
            if (type === 'row' && dt.rows({
                    selected: true
                }).count() > 0) {
                $(".multi-select-toolbar").show();
            } else {
                $(".multi-select-toolbar").hide();
            }
        }
        ``

        function sendDeleteItemRequest(id) {
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "users/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Your file has been deleted.' + id,
                        icon: 'success',
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger',
                        },
                    });
                    table.ajax.reload();
                },
                error: function(request, status, error) {
                    Swal.fire({
                        title: error,
                        text: request.responseJSON.message,
                        icon: 'error',

                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger',
                        },
                    });
                    table.ajax.reload();
                }

            });

        }

        function deleteSelectedRows(items_to_delete) {
            var delete_link = window.location.href.replace(/\/+$/, "") + '/';
            if (typeof override_delete_link !== 'undefined') {
                delete_link = override_delete_link;
            }

            var _counter = 0;
            $.each(items_to_delete, function(i, item) {
                $.ajax({
                    url: delete_link + item['id'],
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'DELETE',
                    contentType: 'application/json',
                    success: function(response) {
                        new Noty({
                            text: response.message,
                            type: 'success'
                        }).show();
                        _counter++;
                        if (_counter >= items_to_delete.length) {
                            table.ajax.reload();
                        }
                    },

                    error: function(request, msg, error) {
                        _counter++;
                        if (_counter >= items_to_delete.length) {
                            table.ajax.reload();

                            new Noty({
                                text: request.responseJSON.message,
                                type: 'error'
                            }).show();
                        }
                    }
                });
            });
        }


        $("form").ajaxForm({
            beforeSend: function() {
                $(".submit-btn").prop('disabled', true);
                $(".submit-btn").html(
                    '<span class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></span> saving ...'
                );
            },
            success: function(response) {
                $(".submit-btn").html('Save<i class="icon-paperplane ml-2"></i>');
                $(".submit-btn").prop('disabled', false);
                new Noty({
                    text: response.message,
                    type: 'success'
                }).show();

                location.href = $('#data').data('redirect');
            },
            error: function(response, textStatus, errorThrown) {
                new Noty({
                    text: textStatus + " : " + response.responseJSON.message,
                    type: 'error'
                }).show();
                $(".submit-btn").html('Save<i class="icon-paperplane ml-2"></i>');
                $(".submit-btn").prop('disabled', false);
            },
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentDatatableSelect();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    DatatableSelect.init();
});