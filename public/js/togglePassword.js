document.addEventListener('DOMContentLoaded', function () {
    const toggleButtons = document.querySelectorAll('.toggle-password');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function () {
            const input = this.previousElementSibling; // Ambil input password
            const showIcon = this.getAttribute('data-show');
            const hideIcon = this.getAttribute('data-hide');

            if (input.type === 'password') {
                input.type = 'text';
                this.querySelector('img').src = hideIcon; // ganti jadi icon hide
            } else {
                input.type = 'password';
                this.querySelector('img').src = showIcon; // ganti jadi icon show
            }
        });
    });
});
