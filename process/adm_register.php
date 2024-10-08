<?php

include "../db/dbconnect.php";

// Inicia a sessao para acessar 
session_start();

// Captura os dados enviados via POST pelo formulário
$email = $_POST['email'];

$query = "SELECT adm FROM usuarios WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) < 1) {
    $data["success"] = false;
    $data["message"] = "Usuário não existente.";
    echo json_encode($data);
    exit;
}

if ($result->fetch_assoc()["adm"]) {
    $data["success"] = false;
    $data["message"] = "Usuário já é um administrador.";
    echo json_encode($data);
    exit;
}

$query = "UPDATE usuarios SET adm = true WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if ($result) {
    $data["success"] = true;
    $data["message"] = "Administrador registrado com sucesso.";
    echo json_encode($data);
    exit;
}

$data["success"] = false;
$data["message"] = "Erro ao registrar administrador.";
echo json_encode($data);

?>