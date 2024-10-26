$(document).ready(function () {
    $('#contactForm').on('submit', function (e) {
        e.preventDefault();
        let isValid = true;

        $('.invalid-feedback').remove();
        $('input, select').removeClass('is-invalid');

        const name = $('#name').val().trim();
        if (name.length === 0 || name.length > 30) {
            isValid = false;
            $('#name').addClass('is-invalid').after('<div class="invalid-feedback">Please enter a valid name</div>');
        }

        const gender = $('#gender').val();
        console.log(gender);
        if (!gender) {
            isValid = false;
            $('#gender').addClass('is-invalid').after('<div class="invalid-feedback">Please select a gender</div>');
        }

        const cnp = $('#CNP').val();
        if (cnp.length !== 13) {
            isValid = false;
            $('#CNP').addClass('is-invalid').after('<div class="invalid-feedback">Please enter a valid CNP</div>');
        }

        const birthDate = $('#birth_date').val();
        if (birthDate === '') {
            isValid = false;
            $('#birth_date').addClass('is-invalid').after('<div class="invalid-feedback">Please enter a valid birth date</div>');
        }

        const email = $('#email').val().trim();
        const emailPattern = /^.+@[a-zA-Z0-9]+\.[a-zA-Z]/;
        if (email.length === 0 || !emailPattern.test(email) || email.length > 30) {
            isValid = false;
            $('#email').addClass('is-invalid').after('<div class="invalid-feedback">Please enter a valid email address</div>');
        }

        const phone = $('#phone').val().trim();
        const phonePattern = /^[0-9]+$/;
        if (!phonePattern.test(phone) || phone.length > 15) {
            isValid = false;
            $('#phone').addClass('is-invalid').after('<div class="invalid-feedback">Enter a valid phone number</div>');
        }

        if (isValid) {
            this.submit(); 
        }
    });
});