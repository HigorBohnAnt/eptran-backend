<?php include "../auth/logout_required.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Registro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h1>Formulário de Registro</h1>
    <form>
        <label for="nome" required>Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="senha" required>Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="email" required>Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="genero" required>Gênero:</label>
        <select id="genero" name="genero">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="O">Outro</option>
        </select><br><br>

        <label for="cpf" required>CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br><br>

        <label for="nascimento" required>Data de Nascimento:</label>
        <input type="date" id="nascimento" name="nascimento" required><br><br>

        <label for="escolaridade">Escolaridade:</label>
        <select id="escolaridade" name="escolaridade">
            <option value="f1">Fundamental 1</option>
            <option value="f2">Fundamental 2</option>
            <option value="em">Médio</option>
            <option value="">Ensino básico concluído</option>
        </select><br><br>

        <label for="cep" required>CEP:</label>
        <input type="text" id="cep" name="cep" required><br><br>

        <label for="bairro" required>Bairro:</label>
        <input type="text" id="bairro" name="bairro" required><br><br>

        <label for="municipio" required>Município:</label>
        <input type="text" id="municipio" name="municipio" required><br><br>

        <label for="escola">Escola:</label>
        <input type="text" id="escola" name="escola"><br><br>

        <label for="uf" required>Estado (UF):</label>
        <select id="uf" name="uf" required>
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
        </select><br><br>

        <input type="submit" value="Registrar">
    </form>

    <br>
    <br>

    <a href="./login.php">
        <button>Login</button>
    </a>

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


            $.ajax({
                type: "POST",
                url: "../process/register.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(({
                success,
                message
            }) => {
                alert(message);

                if (success) {
                    window.location.href = "./login.php";
                }
            });

            event.preventDefault();
        })
    });
    </script>

</body>

</html>