<?php 
include 'db_connection.php';

session_start();

if (!isset($_SESSION['userdata']['id'])) {
    die('User not logged in.');
}

$rota_acessada = $_SERVER['REQUEST_URI'];
$usuario_id = $_SESSION['userdata']['id'];

try {
    $query = "INSERT INTO atividades (rota_acessada, usuario_id) VALUES ('$rota_acessada', '$usuario_id')";

    $executa_insert = mysqli_query($conn, $query);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>