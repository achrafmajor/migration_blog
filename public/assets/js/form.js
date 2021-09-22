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