$("#login_show_hide_password a").on('click', function(event) {
    event.preventDefault();
    if ($('#login_show_hide_password input').attr("type") == "text") {
        $('#login_show_hide_password input').attr('type', 'password');
        $('#login_show_hide_password i').addClass("fa-eye-slash");
        $('#login_show_hide_password i').removeClass("fa-eye");
    } else if ($('#login_show_hide_password input').attr("type") == "password") {
        $('#login_show_hide_password input').attr('type', 'text');
        $('#login_show_hide_password i').removeClass("fa-eye-slash");
        $('#login_show_hide_password i').addClass("fa-eye");
    }
});

$("#show_hide_password a").on('click', function(event) {
    event.preventDefault();
    if ($('#show_hide_password input').attr("type") == "text") {
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password_confirmation input').attr('type', 'password');
        $('#show_hide_password i').addClass("fa-eye-slash");
        $('#show_hide_password i').removeClass("fa-eye");
    } else if ($('#show_hide_password input').attr("type") == "password") {
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password_confirmation input').attr('type', 'text');
        $('#show_hide_password i').removeClass("fa-eye-slash");
        $('#show_hide_password i').addClass("fa-eye");
    }
});