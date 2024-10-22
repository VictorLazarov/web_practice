const registrationForm = document.getElementById('registrationForm');

registrationForm.addEventListener('submit', function(event) {
    event.preventDefault();
    /* const formData = new FormData(registrationForm);
    const data = Object.fromEntries(formData);
    console.log(data); */
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    console.log(username, password);
});