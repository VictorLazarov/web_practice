const form = document.getElementById('form');
const message = document.getElementById('message');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    
    const subjectName = document.getElementById('subject-name').value;
    const credits = document.getElementById('credits').value;
    const subjectType = document.getElementById('subject-type').value;
    const description = document.getElementById('description').value;
    
    const messageText = `Предмет: ${subjectName}, Кредити: ${credits}, Тип: ${subjectType}, Описание: ${description}. Записан сте успешно!`;
    
    message.textContent = messageText;
});