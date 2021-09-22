var table = $('#post-table').DataTable({
    ajax: {
        url: "/admin/post",
    },
    scrollX: true,
    columns: [
        {
            data: 'image_url',
            name: 'image_url',
            orderable: false,
            searchable: false,
            printable: false,
        },
        {
            data: 'title',
            name: 'title',
        }, 
        {
            data: 'link',
            name: 'link',
            orderable: false,
            searchable: false,
            printable: false,
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
            data: 'created_at',
            name: 'created_at',
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