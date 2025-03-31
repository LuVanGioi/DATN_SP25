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
                    if(swal_success !== "none") {
                        window.location.href = response.redirect;
                    }
                }, time_load);
            }
        },
        error: function (xhr) {
            let errorMsg = "Có Lỗi Xảy Ra!!";
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
