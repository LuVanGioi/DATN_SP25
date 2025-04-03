$("form[submit-ajax=true]").on("submit", function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();

    let form = $(this);
    let url = form.attr("action");
    let button = form.find('button[type=submit]:focus');
    let actionValue = button.data("action");
    let swal_success = form.attr("swal_success");
    let time_load = form.attr("time_load");
    $("#actionField").val(actionValue);
    let oldTextButton = button.html();

    if (!actionValue) {
        AlertDATN("error", "Không xác định được hành động!");
        return false;
    }

    button.html('Đang Xử Lý...').prop('disabled', true);

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        dataType: "json",
        success: function (response) {
            if (response.status == "success") {
                if (swal_success !== "none" && response.message) {
                    AlertDATN(response.status, response.message);
                }
                if (response.redirect) {
                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, time_load);
                }
            } else {
                AlertDATN("error", response.message);
            }
        },
        error: function (xhr) {
            let errorMsg = "Có Lỗi Xảy Ra!!";
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMsg = xhr.responseJSON.message;
            }

            if (response.redirect) {
                setTimeout(function () {
                    window.location.href = response.redirect;
                }, time_load);
            }
            
            AlertDATN("error", errorMsg);
        },
        complete: function () {
            button.html(oldTextButton).prop('disabled', false);
        }
    });

    return false;
});
