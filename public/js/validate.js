/* <![CDATA[ */
/// Jquery validate newsletter
jQuery(document).ready(function () {
    $("#newsletter_form").submit(function () {
        var action = $(this).attr("action");

        $("#message-newsletter").slideUp(750, function () {
            $("#message-newsletter").hide();

            $("#submit-newsletter")
                .after('<i class="icon-spin4 animate-spin loader"></i>')
                .attr("disabled", "disabled");

            $.post(
                action,
                {
                    email_newsletter: $("#email_newsletter").val(),
                },
                function (data) {
                    document.getElementById("message-newsletter").innerHTML =
                        data;
                    $("#message-newsletter").slideDown("slow");
                    $("#newsletter_form .loader").fadeOut("slow", function () {
                        $(this).remove();
                    });
                    $("#submit-newsletter").removeAttr("disabled");
                    if (data.match("success") != null)
                        $("#newsletter_form").slideUp("slow");
                }
            );
        });

        return false;
    });
});

// Jquery validate form contact
jQuery(document).ready(function () {
    $("#contactform").submit(function () {
        var action = $(this).attr("action");

        $("#message-contact").slideUp(750, function () {
            $("#message-contact").hide();

            $("#submit-course")
                .after('<i class="icon-spin4 animate-spin loader"></i>')
                .attr("disabled", "disabled");

            $.post(
                action,
                {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    slug: $("#slug").val(),
                    user_id: $("#user_id").val(),
                },
                function (data) {
                    if (data.success) {
                        $('#message-contact').append(`
                            <div class="alert alert-success mt-3" role="alert">
                                <span class="text-sm">
                                    Selamat, anda sudah mengambil materi ini. Silahkan tunggu konfirmasi dari guru pengampu mata pelajaran.
                                </span>
                            </div>
                        `)
                        $('#submit-course').attr('disabled', true);
                    } else {
                        $("#submit-course").removeAttr("disabled");
                    }
                    $("#message-contact").slideDown("slow");
                    $("#contactform .loader").fadeOut("slow", function () {
                        $(this).remove();
                    });
                    if (data.match("success") != null)
                        $("#contactform").slideUp("slow");
                }
            );
        });
        return false;
    });
});

/* ]]> */
