let csrf_token = document.querySelector('meta[name="csrf-token"').getAttribute('content');

window.onload = () => {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': csrf_token }
    });


    // Add/Edit/Show modal show
    $(document).on('click', '#addBtn, #editBtn, #showBtn', function(e) {
        e.preventDefault();
        sendGetRequest($(this).attr('href'), $(this))
    });

    /* Send a GET request in the server */
    function sendGetRequest(url, btn) {
        $('#modal').remove();
        $.ajax({
            type: "GET",
            url: url,
            dataType: "HTML",
            beforeSend: function () {
                $(btn).addClass("disabled");
            },
            success: function (response) {
                $('body').append(response);
                $("#modal").modal("show");
            },
            complete: function () {
                $(btn).removeClass("disabled");
            },
            error: function (e) {
                handleError(e)
            }
        });
    }

    /* Submit post request in server without file upload */
    $(document).on('submit', 'form#submit', function (e) {
        e.preventDefault();
        let url      = $(this).attr('action');
        let file     = $(this).attr('enctype');
        let redirect = $(this).data('redirect');
        let btn      = $(this).find('button[type="submit"]')[0];
        let spinner  = $(this).find('span#submit-spinner')[0];
        let btnText  = $(this).find('span#btn--text')[0];

        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').text('');

        let options = {
            type: 'POST',
            url: url,
            dataType: 'JSON'
        }

        if (typeof file === 'undefined') {
            options.data = $(this).serialize();
        }
        else {
            options.data = new FormData($(this)[0]);
            options.contentType = false;
            options.enctype = file;
            options.processData = false;
        }

        $.ajax({
            ...options,
            beforeSend: () => {
                $(spinner).removeClass('d-none')
                $(btn).addClass('disabled')
                $(btnText).text('Please wait...')
            },
            success: (response) => handleSuccess(response, redirect),
            complete: () => {
                $(spinner).addClass('d-none')
                $(btn).removeClass('disabled')
                $(btnText).text($(btn).data('text'))
            },
            error: (e) => handleError(e, redirect)
        });

    });

    // Delete Data
    $(document).on('click', '#deleteBtn', function (e) {
        e.preventDefault();
        deleteData($(this), $(this).attr('href'));
    });



/* Send delete request in server */
function deleteData(btn, url, removeElement = null) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
            confirmButton: 'btn btn-primary me-3',
            cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: 'DELETE',
                url: url,
                data: {
                    _method: 'DELETE',
                    _token: csrf_token
                },
                dataType: 'JSON',
                beforeSend: () => $(btn).addClass("disabled"),
                success: function (response) {
                    handleSuccess(response);
                    if(removeElement != null) {
                        $(removeElement).remove();
                    }
                    // swal("Deleted!", "Your file has been deleted.", "success");
                },
                complete: () => $(btn).removeClass("disabled"),
                error: function (e) {
                    handleError(e);
                },
            });
            return true;
        }
        else return false;
    });
};

    // Status Data
    // $(document).on('click', '#statusBtn', function (e) {
    //     e.preventDefault();
    //     deleteData($(this), $(this).attr('href'));
    // });


/* Handle success request response */
function handleSuccess(response, redirect = null){
    toastr.clear();
    if (typeof response.message !== 'undefined' || typeof response.status !== 'undefined') {
        toastr.success(response.message || response.status, "Success!");
    }
    if (typeof response.redirect !== 'undefined' || redirect !== null) {
        location.replace(redirect || response.redirect);
    }
    else {
        $('.modal').modal('hide');
        if(typeof table !== 'undefined') {
            table.ajax.reload();
        }
    }
}

/* Handle error request response */
function handleError(e, redirect = null){
    if (e.status === 0) {
        toastr.error(
            "Not connected Please verify your network connection.",
            "Connect Internet"
        );
    }
    else if (e.status === 200 && typeof redirect !== 'undefined') {
        location.replace(redirect);
    }
    else if (e.status === 404) {
        toastr.error("The requested data not found.", "Not Found");
    }
    else if (e.status === 403) {
        toastr.error("You are not allowed this action", "UNAUTHORIZED");
    }
    else if (e.status === 419) {
        toastr.error("CSRF token mismatch", "Something wrong");
    }
    else if (e.status === 500) {
        toastr.error("Internal Server Error.", "Server Error");
    }
    else if (e === "parsererror") {
        toastr.error("Requested JSON parse failed.", "Opps!!");
    }
    else if (e === "timeout") {
        toastr.error("Requested Time out.", "Try Again");
    }
    else if (e === "abort") {
        toastr.error("Request aborted.", "Something Wrong");
    }
    else if (e.status === 422) {
        $.each(e.responseJSON.errors, function (index, error) {
            $("#invalid_" + index).text(error[0]);
            $("#" + index).addClass("is-invalid");
        });
        toastr.error("Please fillup all required fieled", "Opps!!");
    }
    else if ([300, 301, 302, 401].includes(e.status)) {
        toastr.error(e.responseJSON.message, "Opps!!");
    }
    else {
        toastr.error(e.statusText, "Something Wrong");
    }
    return true;
}

}
