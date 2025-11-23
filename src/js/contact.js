document.addEventListener('DOMContentLoaded', function () {

    const form = document.querySelector('form');
    const submitBtn = document.querySelector('.submit_btn');

    submitBtn.addEventListener('click', function (event) {
      
        event.preventDefault();

        const name = form.querySelector('input[placeholder="Enter your name"]').value;
        const phone = form.querySelector('input[placeholder="Enter your phone number"]').value;
        const email = form.querySelector('input[placeholder="Enter your email"]').value;
        const comment = form.querySelector('textarea[placeholder="Type your comment here"]').value;

        if (name === "" || phone === "" || email === "" || comment === "") {
            alert('Please fill out all fields.');
            return;
        }

        if (!validatePhone(phone)) {
            alert('Please enter a valid phone number.');
            return;
        }

        if (!validateEmail(email)) {
            alert('Please enter a valid email address.');
            return;
        }

        console.log("Form Submitted Successfully!");
        console.log('Name: ${name}, Phone: ${phone}, Email: ${email}, Comment: ${comment}');

        alert("Form submitted successfully!");

        form.reset();
    });

    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return re.test(String(email).toLowerCase());
    }

    function validatePhone(phone) {
        
        const phoneRe = /^[0-9]{10}$/;
        return phoneRe.test(phone);
    }
});