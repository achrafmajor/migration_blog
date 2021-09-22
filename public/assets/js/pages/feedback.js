var table = $('#feedback-table').DataTable({
    ajax: {
        url: "/admin/feedback",
    },
    scrollX: true,
    columns: [
        {
            data: 'name',
            name: 'name',
        }, {
            data: 'content',
            name: 'content',
        }, {
            data: 'job',
            name: 'job',
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