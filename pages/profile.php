<?php include "../auth/login_required.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <p>Olá,
        <?php session_start(); echo $_SESSION['userdata']['nome'];?>
    </p>

    <img src="../<?php echo $_SESSION['userdata']['imagem_url'] ?>" alt="foto">
    <a href="./img_upload.php">
        <button>Início</button>
    </a>
    <br>

    <div>
        <?php 
        echo 'Nome:' . $_SESSION['userdata']['nome'] . '<br>';
        echo 'Email:' . $_SESSION['userdata']['email'] . '<br>';
        echo 'Genero:' . $_SESSION['userdata']['genero'] . '<br>';
        echo 'Data de Nascimento:' . $_SESSION['userdata']['nascimento'] . '<br>';
        echo 'Escolaridade:' . $_SESSION['userdata']['escolaridade'] . '<br>';
        echo 'CEP:' . $_SESSION['userdata']['cep'] . '<br>';
        echo 'Bairro:' . $_SESSION['userdata']['bairro'] . '<br>';
        echo 'Município:' . $_SESSION['userdata']['municipio'] . '<br>';
        echo 'Escola:' . $_SESSION['userdata']['escola'] . '<br>';
        echo 'Estado:' . $_SESSION['userdata']['uf'] . '<br>';    
    ?>
    </div>

    <p>Mudar Informações</p>

    <form>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome"><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <label for="genero">Gênero:</label>
        <select id="genero" name="genero">
            <option value=""></option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="O">Outro</option>
        </select><br><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf"><br><br>

        <label for="nascimento">Data de Nascimento:</label>
        <input type="date" id="nascimento" name="nascimento" value=""><br><br>

        <label for="escolaridade">Escolaridade:</label>
        <select id="escolaridade" name="escolaridade">
            <option value=""></option>
            <option value="f1">Fundamental 1</option>
            <option value="f2">Fundamental 2</option>
            <option value="em">Médio</option>
        </select><br><br>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep"><br><br>

        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro"><br><br>

        <label for="municipio">Município:</label>
        <input type="text" id="municipio" name="municipio"><br><br>

        <label for="escola">Escola:</label>
        <input type="text" id="escola" name="escola"><br><br>

        <label for="uf">Estado (UF):</label>
        <select id="uf" name="uf">
            <option value=""></option>
            <option value="AC">AC</option>
            <option value="AL">AL</option>
            <option value="AP">AP</option>
            <option value="AM">AM</option>
            <option value="BA">BA</option>
            <option value="CE">CE</option>
            <option value="DF">DF</option>
            <option value="ES">ES</option>
            <option value="GO">GO</option>
            <option value="MA">MA</option>
            <option value="MT">MT</option>
            <option value="MS">MS</option>
            <option value="MG">MG</option>
            <option value="PA">PA</option>
            <option value="PB">PB</option>
            <option value="PR">PR</option>
            <option value="PE">PE</option>
            <option value="PI">PI</option>
            <option value="RJ">RJ</option>
            <option value="RN">RN</option>
            <option value="RS">RS</option>
            <option value="RO">RO</option>
            <option value="RR">RR</option>
            <option value="SC">SC</option>
            <option value="SP">SP</option>
            <option value="SE">SE</option>
            <option value="TO">TO</option>

        </select>

        <br>
        <br>

        <input type="submit" value="Alterar Dados">
    </form>

    <br>
    <button id="logout">Logout</button>
    <br>
    <br>
    <a href="..">
        <button>Início</button>
    </a>

    <script>
    $(document).ready(() => {
        $("form").submit((event) => {
            var formData = {
                nome: $("#nome").val(),
                senha: $("#senha").val(),
                email: $("#email").val(),
                genero: $("#genero").val(),
                cpf: $("#cpf").val(),
                nascimento: $("#nascimento").val(),
                escolaridade: $("#escolaridade").val(),
                cep: $("#cep").val(),
                bairro: $("#bairro").val(),
                municipio: $("#municipio").val(),
                escola: $("#escola").val(),
                uf: $("#uf").val(),
            };

            if (!formData.nome && !formData.senha && !formData.email && !formData.genero &&
                !formData.cpf && !formData.nascimento && !formData.escolaridade && !formData.cep &&
                !formData.bairro && !formData.municipio && !formData.escola && !formData.uf) {
                event.preventDefault();
                return;
            }


            $.ajax({
                type: "POST",
                url: "../process/update_user.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(({
                success,
                message
            }) => {
                alert(message);

                if (success) {
                    window.location.href = "./profile.php";
                }
            });

            event.preventDefault();
        })

        $("button#logout").click((event) => {

            var sure = confirm("Tem certeza que deseja sair?");

            if (sure) {
                $.ajax({
                    type: "GET",
                    url: "../process/logout.php",
                    encode: true,
                })

                alert("Logout efetuado com sucesso!");
                window.location.href = "..";
            }

            event.preventDefault();
        });
    });
    </script>

</body>

</html>