<?php
include "../db/dbconnect.php";

session_start();

$email = $_POST["email"];
$password = $_POST["senha"];

$query = 'SELECT * FROM usuarios WHERE email = \'' . $email . '\'';
$result = mysqli_query($conn, $query);
$userdata = mysqli_fetch_array($result);

$data = [];

if (password_verify($password, $userdata['senha'])) {
    $_SESSION['userdata'] = $userdata;
    $data["success"] = true;
    $data["message"] = "Login efetuado com sucesso.";
} else {
    unset ($_SESSION['userdata']);
    $data["success"] = false;
    $data["message"] = "Credenciais inválidas.";
}

echo json_encode($data);

?>