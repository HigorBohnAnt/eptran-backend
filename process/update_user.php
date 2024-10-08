<?php 

include "../auth/login_required.php";
include "../db/dbconnect.php";

// //variáveis
$id = $_SESSION['userdata']['id'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$genero = $_POST['genero'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$escolaridade = $_POST['escolaridade'];
$cep = $_POST['cep'];
$bairro = $_POST['bairro'];
$municipio = $_POST['municipio'];
$escola = $_POST['escola'];
$uf = $_POST['uf'];

$update_nome = !empty($nome) ? "nome = '$nome', " : "";
$update_senha = !empty($senha) ? "senha = '" . 
    password_hash($senha, PASSWORD_DEFAULT) . "' , " : "";
$update_email = !empty($email) ? "email = '$email', " : "";
$update_genero = !empty($genero) ? "genero = '$genero', " : "";
$update_cpf = !empty($cpf) ? "cpf = '$cpf', " : "";
$update_nascimento = !empty($nascimento) ? "nascimento = '$nascimento', " : "";
$update_escolaridade = !empty($escolaridade) ? "escolaridade = '$escolaridade', " : "";
$update_cep = !empty($cep) ? "cep = '$cep', " : "";
$update_bairro = !empty($bairro) ? "bairro = '$bairro', " : "";
$update_municipio = !empty($municipio) ? "municipio = '$municipio', " : "";
$update_escola = !empty($escola) ? "escola = '$escola', " : "";
$update_uf = !empty($uf) ? "uf = '$uf', " : "";

$query = "UPDATE usuarios SET " . "$update_nome" . "$update_senha" . "$update_email" . 
    "$update_genero" . "$update_cpf" . "$update_nascimento" . "$update_escolaridade" . 
    "$update_cep" . "$update_bairro" . "$update_municipio" . "$update_escola" . "$update_uf" . 
    "WHERE id = $id";

$query = str_replace(", WHERE", " WHERE", $query);

$executa_update = mysqli_query($conn, $query);

$data = [];

if($executa_update){
    // Busca os dados atualizados
    $query_select = "SELECT * FROM usuarios WHERE id = $id";
    $result = mysqli_query($conn, $query_select);

    $data["success"] = true;
    
    if($result && mysqli_num_rows($result) > 0){
        $userdata = mysqli_fetch_assoc($result);
        $_SESSION["userdata"] = $userdata; // Atualiza a sessão com todos os dados

        $data["message"] = "Usuário atualizado com sucesso.";
    } else {
        $data["message"] = "Usuário atualizado porém erro ao recuperar as informações, tente logar novamente.";
    }
} else {
    $data["success"] = false;
    $data["message"] = "Erro ao atualizar o usuário.";
}

echo json_encode($data);

?>