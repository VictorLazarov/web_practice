<?php

    require_once '../../db/db.php';

    function isUserDataValid($userData) {
        if (!$userData || !isset($userData['username']) || !isset($userData['email']) || !isset($userData['password'])) {
            return ["isValid" => false, "message" => "Invalid user data."];
        }

        // regex for email
        $regex = "/^[a-z0-9_]+@[a-z]+\.[a-z]+$/";

        if (!preg_match($regex, $userData['email'])) {
            return ["isValid" => false, "message" => "Invalid email."];
        }

        return ["isValid" => true, "message" => "Valid user data."];
    }

    function getUserRoleId(PDO $connection) {
        $sql = 'SELECT id FROM roles WHERE code = "REGULAR_USER"';
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    $userData = json_decode(file_get_contents('php://input'), true);

    $valid = isUserDataValid($userData);

    if ($valid["isValid"]) {
        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

        try {
            $db = new Db('store');
            $conn = $db->getPdo();

            $sql = 'INSERT INTO users (username, email, password, roles_id) VALUES (:username, :email, :password, :roles_id)';

            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'username' => $userData['username'],
                'email' => $userData['email'],
                'password' => $userData['password'],
                'roles_id' => getUserRoleId($conn)
            ]);

            echo json_encode(["status" => "SUCCESS", "message" => "You have been successfully registered!"]);
        } catch (PDOException $e) {
            http_response_code(500);

            if ($e->errorInfo[1] === 1062) {
                echo json_encode(["status" => "FAIL", "message" => "User with this email already exists."]);
            } else {
                echo json_encode(["status" => "FAIL", "message" => "Something went wrong."]);
            }
        }
    } else {
        http_response_code(400);

        echo json_encode(["message" => $valid["message"]]);
    }
?>