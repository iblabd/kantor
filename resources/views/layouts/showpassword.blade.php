<script>
    function showPassword() {
        var x = document.getElementById("show_hide_password");
        if (x.type === "password") {
            x.type = "text";
            $("#show_hide_password_icon").removeClass("fa-eye-slash").addClass("fa-eye");
        } else {
            x.type = "password";
            $("#show_hide_password_icon").removeClass("fa-eye").addClass("fa-eye-slash");
        }
    }

    function showPassword2() {
        var x = document.getElementById("show_hide_password2");
        if (x.type === "password") {
            x.type = "text";
            $("#show_hide_password_icon2").removeClass("fa-eye-slash").addClass("fa-eye");
        } else {
            x.type = "password";
            $("#show_hide_password_icon2").removeClass("fa-eye").addClass("fa-eye-slash");
        }
    }
</script>
