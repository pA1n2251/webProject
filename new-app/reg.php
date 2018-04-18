<?php
require_once 'db.php';

$login = trim($_POST['login']);
$password = trim($_POST['password']);
$input = trim($_POST['input']);
if (!empty($login) && !empty($password) && !empty($input)) {

    $sql_check = "SELECT login, password FROM users WHERE login = :login";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([':login'=>$login]);

    $user = $stmt_check->fetch(PDO::FETCH_OBJ);

    if ($user) {
        if (password_verify($password, $user->password)){
            addMessage($user->login, $input, $pdo);
            header('Location: /new-app/index.php');
        } else{
            header('Location: /new-app/index.php');
        }
    } else{
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql_registr = 'INSERT INTO users(login, password) VALUES (:login, :password)';
        $params = ['login' => $login, 'password' => $password];

        $stmt = $pdo->prepare($sql_registr);
        $stmt->execute($params);

        addMessage($login, $input, $pdo);
        header('Location: /new-app/index.php');
    }
} else {
    echo 'Pleas, enter information';
}

function addMessage($login ,$message, $pdo){
    require_once 'db.php';
    $sql_insert = 'INSERT INTO messages(login, message) VALUES (:login, :message)';
    $params = ['login' => $login, 'message' => $message];

    $stmt = $pdo->prepare($sql_insert);
    $stmt->execute($params);
}