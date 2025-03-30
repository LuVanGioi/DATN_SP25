$("form[submit-ajax=true]").on("submit", function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();

    let form = $(this);
    let url = form.attr("action");
    let button = form.find('button[type=submit]:focus');
    let actionValue = button.data("action");
    $("#actionField").val(actionValue);
    let oldTextButton = button.html();

    if (!actionValue) {
        Swal.fire("Lỗi", "Không xác định được hành động!", "error");
        return false;
    }

    button.html('Đang Xử Lý...').prop('disabled', true);

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        dataType: "json",
        success: function (response) {
            AlertDATN(response.status, response.message);
            if (response.redirect) {
                setTimeout(function () {
                    window.location.href = response.redirect;
                }, 1500);
            }
        },
        error: function (xhr) {
            let errorMsg = "Có lỗi xảy ra!";
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMsg = xhr.responseJSON.message;
            }

            AlertDATN("error", errorMsg);
        },
        complete: function () {
            button.html(oldTextButton).prop('disabled', false);
        }
    });

    return false;
});
