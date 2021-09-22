table.on('processing.dt', function(e, settings, processing) {
    $('#processingIndicator').css('display', 'none');
    if (processing) {
        $("#refreshBtn").html(
            '<span class="spinner-border spinner-border-sm mx-2" role="status"aria-hidden="true"></span> refreshing ...'
        );
        $(e.currentTarget).LoadingOverlay("show", {
            background: "#252b360d",
            zIndex: 10,
            maxSize: 30
        });
    } else {
        $("#refreshBtn").html('<i class="fas fa-redo mr-2"></i> refresh </button>');
        $(e.currentTarget).LoadingOverlay("hide", true);
    }
})

table.on('select', function(e, dt, type, indexes) {
    manageMultiSelectToolbar(type, dt);
});

table.on('deselect', function(e, dt, type, indexes) {
    manageMultiSelectToolbar(type, dt);
});

$('#refreshBtn').on('click', function() {
    table.ajax.reload();
});



function reloadTableWithNewUrl(url) {
    table.ajax.url(url);
}



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


$('body').on('click', '#change_status_selected_rows', function() {
    var items_to_change_status = [];
    table.rows({
        selected: true
    }).every(function(e) {
        items_to_change_status.push(this.data()['id']);
    });
    chnageItemStatus(items_to_change_status);
});


$(document).on('keypress', function(event) {
    let keycode = (event.keyCode ? event.keyCode : event.which);
    console.log(keycode)
    if (keycode == '114') {
        table.ajax.reload();
    }
    if (keycode == '99') {
        $('#createBtn').click();
    }
    if (keycode == '115') {
        $('#change_status_selected_rows').click();
    }

});


document.addEventListener('keydown', function(event) {
    const key = event.key;
    if (key === "Delete") {
        $('#delete_selected_rows').click();
    }
});