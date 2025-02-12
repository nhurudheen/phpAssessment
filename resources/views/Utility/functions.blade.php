<script type="text/javascript">

    function toggleProfileModal() {
        const modal = document.getElementById("profileRecordModal");
        modal.classList.toggle("hidden");
    }

    function toggleUpdateRecordModal(id) {
        const modal = document.getElementById(`updateRecordModal_${id}`);
        modal.classList.toggle("hidden");
    }

    function toggleDeleteModal(id) {
        const modal = document.getElementById(`deleteRecordModal_${id}`);
        modal.classList.toggle("hidden");
    }

    function togglePasswordInput(id) {
        const passwordInput = document.getElementById(`passwordInput_${id}`);
        if (passwordInput) {
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        } else {
            console.error(`Password input with ID passwordInput_${id} not found`);
        }
    }

</script>
