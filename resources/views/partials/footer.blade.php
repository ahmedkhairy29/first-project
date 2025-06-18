<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('toggle-icon');
        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('mdi-eye-outline');
            icon.classList.add('mdi-eye-off-outline');
        } else {
            password.type = 'password';
            icon.classList.remove('mdi-eye-off-outline');
            icon.classList.add('mdi-eye-outline');
        }
    }
</script>

</body>
</html>
