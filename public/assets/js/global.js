let dropify,
    globalForm,
    LoadingOverlay,
    submitBtn,
    deleteButton,
    singleSelectOptions,
    singleSumoSelect,
    multiSumoSelect,
    multiSelectOptions,
    onlineUsers,
    onlineUserButton,
    errorsList;
const LOADING_OVERLAY_DELAY = 200; // ms
initVariables();
initEvents();
function initVariables() {
    dropify = $(".dropify").dropify();
    globalForm = $("#data");
    deleteButton = $(".deleteButton");
    LoadingOverlay = $("#overlayLoading");
    submitBtn = $(".submit-btn");
    singleSumoSelect = $(".SlectBox");
    multiSumoSelect = $(".MultiSlectBox");
    onlineUsers = $("#onlineUsers");
    onlineUserButton = $("#onlineUserButton");
    errorsList = $(".errors-list");
    // sumo selects
    singleSelectOptions = { search: true };
    multiSelectOptions = {
        selectAll: true,
        captionFormatAllSelected: "Tous sélectionnés",
        csvSepChar: true,
        okCancelInMulti: true,
        csvDispCount: 4,
        locale: ["OK", "Annuler", "sélectionner toutes"],
        search: true,
    };
}

function initEvents() {
    // timepcker

    // -- loading
    $(window).on("load", function () {
        setTimeout(removeOverlayLoading(), LOADING_OVERLAY_DELAY);
    });

    singleSumoSelect.SumoSelect(singleSelectOptions);
    multiSumoSelect.SumoSelect(multiSelectOptions);

    // on Delete Button click event
    $(".deleteButton").on("click", function () {
        deleteItem($(this).data("id"));
    });

    // Setting datatable defaults
    $.extend($.fn.dataTable.defaults, {
        order: false,
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
        ],
        processing: true,
        serverSide: true,
        autoWidth: false,
        dom: "Blfrtip",
        iDisplayLength: 50,
        buttons: [
            {
                extend: "copy",
                className: "btn btn-outline-primary",
                exportOptions: {
                    columns: ":visible",
                },
            },
            {
                extend: "excel",
                className: "btn btn-outline-primary",
                exportOptions: {
                    columns: ":visible",
                },
            },
            {
                extend: "csv",
                className: "btn btn-outline-primary",
                exportOptions: {
                    columns: ":visible",
                },
            },
            {
                extend: "pdf",
                className: "btn btn-outline-primary",
                exportOptions: {
                    columns: ":visible",
                },
            },
            {
                extend: "colvis",
                className: "btn btn-outline-primary",
                exportOptions: {
                    columns: ":visible",
                },
            },
            {
                extend: "selectAll",
                className: "btn btn-outline-primary",
                exportOptions: {
                    columns: ":visible",
                },
            },
            {
                extend: "selectNone",
                className: "btn btn-outline-primary mr-r-20",
                exportOptions: {
                    columns: ":visible",
                },
            },
        ],
        select: {
            style: "multi",
        },
        language: {
            searchPlaceholder: "Search...",
            sSearch: "",
            lengthMenu: "_MENU_ ",
            buttons: {
                selectAll: "Select all",
                selectNone: "Unselect",
            },

            processing: false,

            paginate: {
                previous: '<i class="fas fa-chevron-left"></i>',
                next: '<i class=" fas fa-chevron-right"></i>',
            },
        },
        drawCallback: function (settings) {
            $(".deleteButton").on("click", function () {
                deleteItem($(this).data("id"));
            });
        },
    });

    // Apply custom style to select
    $.extend($.fn.dataTableExt.oStdClasses, {
        sLengthSelect: "custom-select",
    });

    // -- global ajax form
    globalForm.ajaxForm({
        beforeSend: function () {
            showSubmitBtnLoading();
        },
        success: function (response) {
            hideSubmitButtonLoading();
            notifySuccess(response.message);
            redirect(response); // auto check if date-redirect not null
        },
        error: function (response, textStatus) {
            if (response.status === 422) {
                showFormErrors(response.responseJSON.errors);
            }
            notifyError(textStatus + " : " + response.responseJSON.message);
            hideSubmitButtonLoading();
        },
    });

    onlineUserButton.on("click", function () {
        fetchOnlineUsers();
    });
}

// -- functions

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split("&"),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split("=");

        if (sParameterName[0] === sParam) {
            return typeof sParameterName[1] === undefined
                ? true
                : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};

function onlineUsersHTML(id, name, imageURL, job) {
    return (
        '<li class="media"> <div class="mr-3"> <img src="' +
        imageURL +
        '" width="36" height="36" class="rounded-circle" alt=""> </div> <div class="media-body"> <a href="/users/' +
        id +
        '" class="media-title font-weight-semibold">' +
        name +
        '</a> <span class="d-block text-muted font-size-sm">' +
        job +
        '</span> </div> <div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div> </li>'
    );
}

function showFormErrors(errors) {
    errorsList.html(""); // clear errors list
    $.each(errors, function (index, value) {
        errorsList.append(errorAlert("error !", value[0]));
    });
    scrollToErrors();
}

function scrollToErrors() {
    $(".content-inner").stop().animate(
        {
            scrollTop: errorsList,
        },
        200
    );
}

function showOnlineUsersLoading() {
    onlineUsers.LoadingOverlay("show", {
        background: "#252b360d",
        zIndex: 100000,
        maxSize: 30,
    });
}

function hideOnlineUsersLoading() {
    onlineUsers.LoadingOverlay("hide", true);
}

function fetchOnlineUsers() {
    showOnlineUsersLoading();

    var token = $("meta[name='csrf-token']").attr("content");
    var url = "/users/online";
    $.ajax({
        url: url,
        type: "GET",
        data: {
            _token: token,
        },
        success: function (response) {
            hideOnlineUsersLoading();
            onlineUsers.html("");
            $.each(response, function (index, value) {
                onlineUsers.append(
                    onlineUsersHTML(
                        value.id,
                        value.name,
                        value.image_url,
                        value.role
                    )
                );
            });
        },
        error: function (response) {
            hideOnlineUsersLoading();
        },
    });
}

function removeOverlayLoading() {
    LoadingOverlay.fadeOut(500, function () {
        LoadingOverlay.hide();
    });
}

// delete table item
function deleteItem(id) {
    Swal.fire({
        title: "vous étés sûr ??",
        text: "Vous allez supprimer cet élément.",
        icon: "warning",
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger",
        },
        buttonsStyling: true,
        showCancelButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            sendDeleteItemRequest(id);
        } else {
            Swal.fire({
                title: "",
                text: "opération annulée!",
                icon: "error",
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",
                },
            });
        }
    });
}

// delete confirmation
function deleteConfirmation(items_to_delete, op) {
    swal.fire({
        title: "Are you sure?",
        text:
            "Une fois cliqué, vous supprimerez " +
            items_to_delete.length +
            " éléments",
        icon: "warning",
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger",
        },
        buttonsStyling: true,
        showCancelButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            op();
        } else {
            Swal.fire({
                title: "",
                text: "opération annulée!",
                icon: "error",
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",
                },
            });
        }
    });
}

// manage multi select
function manageMultiSelectToolbar(type, dt) {
    if (
        type === "row" &&
        dt
            .rows({
                selected: true,
            })
            .count() > 0
    ) {
        $(".multi-select-toolbar").show();
    } else {
        $(".multi-select-toolbar").hide();
    }
}

function applyCustomSelect() {
    singleSelectOptions.SumoSelect(singleSelectOptions);
}

// backend routing helpers
function getRouteUrl() {
    let baseUrl, url;
    baseUrl = $("table").data("base");
    if (baseUrl != null) {
        return baseUrl;
    }
    url = window.location.href.replace(/\/+$/, "");
    url = url.replace("https://", "");
    url = url.replace("http://", "");
    url = url.replace("#", "");
    url = url.split("/")[1];
    return url + "/";
}

function redirect(response) {
    let redirectTo = globalForm.data("redirect");
    if (response.data !== null) {
        if (response.data.redirect_to && response.data.redirect_to !== null) {
            redirectTo = response.data.redirect_to;
        }
    }
    if (redirectTo != null && redirectTo != "") {
        location.href = redirectTo;
    }
}

// submit loading
function hideSubmitButtonLoading() {
    submitBtn.html('Save<i class="icon-paperplane ml-2"></i>');
    submitBtn.prop("disabled", false);
}

function showSubmitBtnLoading() {
    submitBtn.prop("disabled", true);
    submitBtn.html(
        '<span class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></span> saving ...'
    );
}

// ----  notifications
function notify(type, message) {
    new Noty({
        text: message,
        type: type,
    }).show();
}

function notifySuccess(message) {
    notify("success", message);
}

function notifyError(message) {
    notify("error", message);
}

// ---- alerts
function alertElementHTML(title, content, type = "danger") {
    return (
        '<div class="alert alert-' +
        type +
        ' alert-styled-left alert-dismissible"> <button type="button" class="close" data-dismiss="alert"><span>×</span></button> <div class="row"> </div> <span class="font-weight-semibold">' +
        title +
        "</span> " +
        content +
        "</div>"
    );
}

function errorAlert(title, content) {
    return alertElementHTML(title, content, "danger");
}

function successAlert(title, content) {
    return alertElementHTML(title, content, "success");
}

function warningAlert(title, content) {
    return alertElementHTML(title, content, "warning");
}

function infoAlert(title, content) {
    return alertElementHTML(title, content, "info");
}

// --- requests
function sendDeleteItemRequest(id) {
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: id,
        type: "DELETE",
        data: {
            _token: token,
        },
        success: function (response) {
            Swal.fire({
                title: "Supprimer!",
                text: "Supprimer avec succés",
                icon: "success",
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",
                },
            });
            table.ajax.reload();
        },
        error: function (request, status, error) {
            Swal.fire({
                title: error,
                text: request.responseJSON.message,
                icon: "error",

                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",
                },
            });
            table.ajax.reload();
        },
    });
}

function deleteSelectedRows(items_to_delete) {
    if (items_to_delete.length > 0) {
        var _counter = 0;
        var url = window.location.href;
        $.each(items_to_delete, function (i, item) {
            $.ajax({
                url: url + "/" + item["id"],
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                method: "DELETE",
                contentType: "application/json",
                success: function (response) {
                    new Noty({
                        text: response.message,
                        type: "success",
                    }).show();
                    _counter++;
                    if (_counter >= items_to_delete.length) {
                        table.ajax.reload();
                    }
                },

                error: function (request, msg, error) {
                    _counter++;
                    if (_counter >= items_to_delete.length) {
                        table.ajax.reload();

                        new Noty({
                            text: request.responseJSON.message,
                            type: "error",
                        }).show();
                    }
                },
            });
        });
    }
}

function chnageItemStatus(items_to_change_status) {
    if (items_to_change_status.length > 0) {
        swal.fire({
            title: "Are you sure?",
            text:
                "Once clicked, you will chnage status of " +
                items_to_change_status.length +
                " items",
            icon: "warning",
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger",
            },
            buttonsStyling: true,
            showCancelButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                sendChangeStatusRequest(items_to_change_status);
            } else {
                Swal.fire({
                    title: "",
                    text: "operation cancled!",
                    icon: "error",
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger",
                    },
                });
            }
        });
    }
}

function sendChangeStatusRequest(items_to_change_status) {
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: getRouteUrl() + "bulk-status-change",
        type: "POST",
        data: {
            ids: items_to_change_status,
            _token: token,
        },
        success: function (response) {
            new Noty({
                text: response.message,
                type: "success",
            }).show();
        },
        error: function (request, status, error) {
            Swal.fire({
                title: error,
                text: request.responseJSON.message,
                icon: "error",

                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",
                },
            });
            new Noty({
                text: request.responseJSON.message,
                type: "error",
            }).show();
        },
        complete: function () {
            table.ajax.reload();
        },
    });
}

function enableSumoSelect(element) {
    element[0].sumo.enable();
}
function disableSumoSelect(element) {
    element[0].sumo.disable();
}
function removeAllSumoSelectOptions(element) {
    var count = element.find("option").length;
    for (var i = count; i >= 1; i--) {
        element[0].sumo.remove(i - 1);
    }
}

function replaceMany(text, values, valuesToReplace) {
    // check if text type is string
    if (typeof text !== "string") {
        throw new Error("first paramter must be string");
    }
    if (!Array.isArray(values)) {
        throw new Error("second paramter must be an array");
    }
    if (!Array.isArray(valuesToReplace)) {
        throw new Error("third paramter must be an array");
    }
    // check if value and valuesToReplace have the same size
    if (values.length !== valuesToReplace.length) {
        throw new Error(
            "the second and third paramter should be array and have the same size"
        );
    }
    // remplace all strings
    $.each(values, function (index) {
        text = text.replaceAll(values[index], valuesToReplace[index]);
    });

    return text;
}
