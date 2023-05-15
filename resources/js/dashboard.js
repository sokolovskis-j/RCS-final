
    $("#logoutButton").click(function (e) {
        $.get({
            url: "/api/logout",
            success: function() {
                window.location.href = "/";
            },
            error: function() {}
        });
    });


$("a.active").removeClass("active");
$("a[href='" + location.href + "']").addClass("active");