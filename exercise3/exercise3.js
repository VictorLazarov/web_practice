const registrationForm = document.getElementById('registrationForm');

registrationForm.addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(registrationForm);
    const data = Object.fromEntries(formData);
    console.log(data);
    }
);