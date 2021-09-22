var table = $('#partner-table').DataTable({
    ajax: {
        url: "/admin/partner",
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
            data: 'name',
            name: 'name',
        }, 
        {
            data: 'link',
            name: 'link',
            orderable: false,
            searchable: false,
            printable: false,
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

