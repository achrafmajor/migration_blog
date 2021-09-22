var table = $('#service-table').DataTable({
    ajax: {
        url: "/admin/service",
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
