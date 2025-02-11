<script type="text/javascript">
    function togglePassword() {
        const passwordInput = document.getElementById("passwordInput");
        const toggleIcon = document.getElementById("toggleIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.src = "images/eyeOffIcon.svg";
        } else {
            passwordInput.type = "password";
            toggleIcon.src = "images/eyeIcon.svg";
        }
    }
</script>
