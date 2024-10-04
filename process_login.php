<?php
session_start();

include "dbconnect.php";

$email = $_POST["email"];
$password = $_POST["senha"];

$query = 'SELECT * FROM usuarios WHERE email = \'' . $email . '\'';
$result = mysqli_query($conn, $query);
$userdata = mysqli_fetch_array($result);

if (password_verify($password, $userdata['senha'])) {
    $_SESSION['userdata'] = $userdata;
    header('location:tela_inicial.php');
} else {
    unset ($_SESSION['userdata']);
    echo "<script>
            alert('Credenciais inválidas!');
            window.location.href = 'login.php';
        </script>";
    exit;
}

?>