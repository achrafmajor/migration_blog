var table = $('#newsletter-table').DataTable({
    ajax: {
        url: "/admin/newsletter",
    },
    scrollX: true,
    columns: [
        {
            data: 'email',
            name: 'email',
        },{
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