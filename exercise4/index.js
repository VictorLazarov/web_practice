fetch('users.php')
    .then(response => response.json())
    .then(data => {
        const userList = document.getElementById('user-list');
        data.forEach(user => {
            const listItem = document.createElement('li');
            listItem.textContent = user.name;
            userList.appendChild(listItem);
        });
    })
    .catch(error => console.error('Error fetching user data:', error));

const loginForm = document.getElementById('login-form');
loginForm.addEventListener('submit', event => {
    event.preventDefault();
    
    const formData = new FormData(loginForm);
    const data = {
        username: formData.get('username'),
        password: formData.get('password')
    };

    fetch('users.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        const message = document.getElementById('message');
        message.textContent = result.message;
        message.style.color = result.status === 'success' ? 'green' : 'red';
    })
    .catch(error => console.error('Error:', error));
});