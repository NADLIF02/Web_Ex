<?php
require_once 'config/config.php';
function verify_user($user, $pass) {
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }
    $sql = $conn->prepare("SELECT * FROM utilisateurs WHERE username = ?");
    $sql->bind_param("s", $user);
    $sql->execute();
    $result = $sql->get_result();
    if ($row = $result->fetch_assoc()) {
        return password_verify($pass, $row['password']);
    }
    $conn->close();
    return false;
}
