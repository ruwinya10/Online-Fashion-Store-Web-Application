//payment form in order information
document.addEventListener("DOMContentLoaded", function() {
    const paymentForm = document.getElementById("paymentForm");

    paymentForm.addEventListener("submit", function(e) {
        e.preventDefault();

        //get values from the form
        const cardName = document.getElementById('cardName').value;
        const cardNum = document.getElementById('cardNum').value;
        const expMonth = document.getElementById('expMonth').value;
        const expYear = document.getElementById('expYear').value;
        const cvv = document.getElementById('cvv').value;

        //save data in the local storage
        localStorage.setItem('cardName', cardName);
        localStorage.setItem('cardNum', cardNum);
        localStorage.setItem('expMonth', expMonth);
        localStorage.setItem('expYear', expYear);
        localStorage.setItem('cvv', cvv);

        window.location.href = 'checkout.html';

    });
});

//card details in the checkout page
document.addEventListener("DOMContentLoaded", function() {
    //retrieve card details from local storage
    const cardName = localStorage.getItem('cardName');
    const cardNum = localStorage.getItem('cardNum');
    const expMonth = localStorage.getItem('expMonth');
    const expYear = localStorage.getItem('expYear');
    const cvv = localStorage.getItem('cvv');

    if (cardName && cardNum && expMonth && expYear && cvv) {
        document.getElementById('billingCardName').value = cardName;
        document.getElementById('billingCardNum').value = cardNum;
        document.getElementById('billingExpMonth').value = expMonth;
        document.getElementById('billingExpYear').value = expYear;
        document.getElementById('billingCvv').value = cvv;
    }
});


//Billing Form part
document.addEventListener("DOMContentLoaded", function () {
    const sameAddressRadio = document.getElementById('sameAddress');
    const differentAddressRadio = document.getElementById('differentAddress');
    const editAddressBtn = document.getElementById('editAddressBtn');
    const billingForm = document.getElementById('billingForm');

    //get billing inputs
    const billingInputs = {
        country: document.getElementById('billingCountry'),
        address: document.getElementById('billingAddress'),
        city: document.getElementById('billingCity')
    };

    //the function to enable and disable the billing form
    function toggleBillingForm(enable) {
        editAddressBtn.disabled =!enable;
        if (!enable) {
            billingForm.style.display = 'none';
        }
        Object.keys(billingInputs).forEach(key => {
            billingInputs[key].disabled =!enable;
        });
    }

    //when the "Same as Shioping Address" is selected
    sameAddressRadio.addEventListener('change', function () {
        if (this.checked) {
            toggleBillingForm(false); 
        }
    });

    //when the "Use a different Billing Address" is selected
    differentAddressRadio.addEventListener('change', function () {
        if (this.checked) {
            toggleBillingForm(true);
        }
    });

    //when the "Edit Address" button clicked, the billing form will be appear
    editAddressBtn.addEventListener('click', function () {
        billingForm.style.display = 'block';
    });

    //disable the form when the page is loaded
    toggleBillingForm(false);
    
});

//change card part
document.addEventListener("DOMContentLoaded", function() {
    const changeCardBtn = document.getElementById('changeCardBtn');

    changeCardBtn.addEventListener('click', function() {
        const confirmDelete = confirm("Are you sure you want to delete the card information?");
        if (confirmDelete) {
            //delete the card
            alert("Card Information deleted.");
        }
        else {
            //no action
            alert("Card Information remain unchanged.");
        }
    });
});