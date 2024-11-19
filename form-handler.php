<?php
require_once 'exercise6/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $subjectName = htmlspecialchars($_POST['subject-name']);
        $credits = htmlspecialchars($_POST['credits']);
        $subjectType = htmlspecialchars($_POST['subject-type']);
        $isMandatory = ($subjectType === 'mandatory') ? 1 : 0;
        $description = htmlspecialchars($_POST['description']);

        $db = new Db('university');
        $pdo = $db->getPdo();

        $sql = 'INSERT INTO subjects (name, credits, is_mandatory, description) VALUES (:name, :credits, :is_mandatory, :description)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'name' => $subjectName,
            'credits' => $credits,
            'is_mandatory' => $isMandatory,
            'description' => $description
        ]);

        $response = array(
            "subjectName" => $subjectName,
            "credits" => $credits,
            "subjectType" => $subjectType,
            "description" => $description,
            "isMandatory" => $isMandatory,
            "message" => "Записан сте успешно!"
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (PDOException $e) {
        var_dump($e);
    }
} else {
    echo json_encode(array("message" => "Invalid request method."));
}
?>