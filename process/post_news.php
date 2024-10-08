<?php
session_start();

include "../db/dbconnect.php";

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$texto = $_POST['texto'];
$escolaridade = empty($_POST['escolaridade']) ? 'null' : $_POST['escolaridade'];

$img_url = '';

if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
    $nome = $_FILES[ 'arquivo' ][ 'name' ];

    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
    $extensao = strtolower ( $extensao );
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        $novoNome = uniqid ( time () ) . '.' . $extensao;
        $img_url = 'uploads/' . $novoNome;
        $destino = '../' . $img_url;
 
        move_uploaded_file( $arquivo_tmp, $destino);
    }
}

$query = "INSERT INTO noticias (titulo, descricao, texto, usuario_id, escolaridade_minima, img_url) 
VALUES ('$titulo', '$descricao', '$texto', '', '$escolaridade', '$img_url')";

$data = [];

try {
    $result = $conn->query($query);

    session_unset();
    session_destroy();
    
    $data["success"] = true;
    $data["message"] = "Usuário cadastrado com sucesso.";


} catch (Exception $err) {
    $data["success"] = true;

}

echo json_encode($data);


?>