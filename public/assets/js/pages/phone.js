var table = $('#phone-table').DataTable({
    ajax: {
        url: "/admin/phone",
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
            data: 'contry_code',
            name: 'contry_code',
        },   {
            data: 'phone',
            name: 'phone',
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
