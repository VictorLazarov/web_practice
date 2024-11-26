
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const formData = new FormData(form);
        const data = {
            username: formData.get('username'),
            email: formData.get('email'),
            password: formData.get('password'),
        };

        fetch('../backend/api/registration/registration.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            const message = document.getElementById('message');
            const status = result.status;
            if (status === 'SUCCESS') {
                message.textContent = result.message;
                form.reset();
            }
            message.textContent = result.message;
            message.style.display = 'block';
            message.style.color = status === 'SUCCESS' ? 'green' : 'red';
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});