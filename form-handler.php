<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subjectName = htmlspecialchars($_POST['subject-name']);
    $credits = htmlspecialchars($_POST['credits']);
    $subjectType = htmlspecialchars($_POST['subject-type']);
    $description = htmlspecialchars($_POST['description']);

    $response = array(
        "subjectName" => $subjectName,
        "credits" => $credits,
        "subjectType" => $subjectType,
        "description" => $description,
        "message" => "Записан сте успешно!"
    );

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    echo json_encode(array("message" => "Invalid request method."));
}
?>