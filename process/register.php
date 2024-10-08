<?php
session_start();

include "../db/dbconnect.php";

$nome = $_POST['nome'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$genero = $_POST['genero'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$escolaridade = empty($_POST['escolaridade']) ? 'null' : $_POST['escolaridade'];
$cep = $_POST['cep'];
$bairro = $_POST['bairro'];
$municipio = $_POST['municipio'];
$escola = empty($_POST['escola']) ? 'null' : $_POST['escola'];
$uf = $_POST['uf'];

$query = "INSERT INTO usuarios (nome, senha, email, genero, cpf, nascimento, escolaridade, cep, bairro, municipio, escola, uf) 
VALUES ('$nome', '$senha', '$email', '$genero', '$cpf', '$nascimento', '$escolaridade', '$cep', '$bairro', '$municipio', '$escola', '$uf')";

$data = [];

try {
    $result = $conn->query($query);

    session_unset();
    session_destroy();
    
    $data["success"] = true;
    $data["message"] = "Usuário cadastrado com sucesso.";


} catch (Exception $err) {
    $data["success"] = false;
    if ($err->getCode() == 1062) {
        if (str_contains($err->getMessage(), 'email')) {
            $data["message"] = "Este email já está sendo usado por outra pessoa.";
        } else if (str_contains($err->getMessage(), 'cpf')) {
            $data["message"] = "Este cpf já está sendo usado por outra pessoa.";
        }
    } else {
        throw new Exception("Erro: " . $err->getMessage());
    }
}

echo json_encode($data);


?>