<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subjectName = htmlspecialchars($_POST['subject-name']);
    $credits = htmlspecialchars($_POST['credits']);
    $subjectType = htmlspecialchars($_POST['subject-type']);
    $description = htmlspecialchars($_POST['description']);

    echo "Subject Name: $subjectName<br>";
    echo "Credits: $credits<br>";
    echo "Subject Type: $subjectType<br>";
    echo "Description: $description<br>";
} else {
    echo "Invalid request method.";
}
?>