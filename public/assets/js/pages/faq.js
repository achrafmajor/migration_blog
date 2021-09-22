var table = $('#faq-table').DataTable({
    ajax: {
        url: "/admin/faq",
    },
    scrollX: true,
    columns: [
        {
            data: 'ordre',
            name: 'ordre',
        }, {
            data: 'title',
            name: 'title',
        },{
            data: 'statut',
            name: 'statut',
            render: function(data, type, full, meta) {
                if (data == 'Publier') {
                    return '<span class="badge badge-success">' + data + '</span>';
                } else {
                    return '<span class="badge badge-danger">' + data + '</span>';
                }
            }
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

// on submit filter form
$('#filter-form').on('submit', function(e) {
    var formUrl = $(this).serialize(); // 
    e.preventDefault();
    hundleFilterEmailSubmit(formUrl);
});
// generate url and reload table
function hundleFilterEmailSubmit(formUrl) {
    // generate url
    var url = "/dashboard/website/pages?" + formUrl;
    // close modal
    $('#filterModal').modal('toggle');
    // load table with new url
    table.ajax.url(url).load();

}