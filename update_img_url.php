<?php
    include("login_required.php");
    include("dbconnect.php");

    $id = $_SESSION['userdata']['id'];

    if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
            $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
            $nome = $_FILES[ 'arquivo' ][ 'name' ];
    
            $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
            $extensao = strtolower ( $extensao );
            if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                $novoNome = $id . '.' . $extensao;
                $destino = 'uploads/' . $novoNome;
         
                move_uploaded_file( $arquivo_tmp, $destino);
            }
        }
        
        $img_url = "./$destino";
        $_SESSION['userdata']['imagem_url'] = $img_url;

        $query = "UPDATE usuarios SET imagem_url = '$img_url' WHERE id = $id";

        //Executa update
        $executa_update = mysqli_query($conn, $query);
        if($executa_update){
             echo "<script>
             alert('Usuário atualizado com sucesso');
             window.location.href = 'cadastro_teste.html';
             </script>";
   
        }else{
             echo "<script>
             alert('Erro ao atualizar usuário');
             window.location.href = 'cadastro_teste.html';
             </script>";
        }
?>