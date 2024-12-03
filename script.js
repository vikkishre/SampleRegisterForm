$(document).ready(function () {
    $('#registrationForm').on('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            success: function (response) {
                $('#success-message').html(response).fadeIn();
            },
            error: function () {
                alert('An error occurred while submitting the form.');
            }
        });
    });
});
