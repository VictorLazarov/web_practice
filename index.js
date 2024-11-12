const form = document.getElementById('form');
const message = document.getElementById('message');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    const formData = new FormData(form);

    fetch('form-handler.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        const subjectName = result.subjectName;
        const credits = result.credits;
        const subjectType = result.subjectType;
        const description = result.description;
        const messageText = result.message;

        message.innerHTML = `Subject Name: ${subjectName}<br/>Credits: ${credits}<br/>Subject Type: ${subjectType}<br/>Description: ${description}<br/>Message: ${messageText}`;
        message.style.display = 'block';
    });
});