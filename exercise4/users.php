<?php
header('Content-Type: application/json');

$users = [
    ['id' => 1, 'username' => 'john', 'password' => 'doe123'],
    ['id' => 2, 'username' => 'jane', 'password' => 'smith123'],
    ['id' => 3, 'username' => 'alice', 'password' => 'johnson123']
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $username = $input['username'];
    $password = $input['password'];

    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            echo json_encode(['status' => 'success', 'message' => 'Login successful']);
            exit;
        }
    }
    echo json_encode(['status' => 'error', 'message' => 'Invalid username or password']);
    exit;
}

echo json_encode($users);
?>