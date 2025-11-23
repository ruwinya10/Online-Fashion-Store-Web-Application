document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.stars span');

    stars.forEach((star, idx) => {
        star.addEventListener('click', function () {
            stars.forEach((s, i) => {
                if (i <= idx) {
                    s.classList.add('selected');
                } else {
                    s.classList.remove('selected');
                }
            });
        });
    });

    document.getElementById('feedback-form').addEventListener('submit', function (event) {
        event.preventDefault();
        alert("Feedback submitted! Thank you.");
    });
});