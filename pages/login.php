<?php include "../auth/logout_required.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h2>Login</h2>
    <form action="../process/login.php" method="POST">
        <div>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        <div>
            <button type="submit">Entrar</button>
        </div>
    </form>

    <br>
    <br>

    <a href="./register.php">
        <button>Cadastro</button>
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
                email: $("#email").val(),
                senha: $("#senha").val(),
            };

            $.ajax({
                type: "POST",
                url: "../process/login.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(({
                success,
                message
            }) => {
                alert(message);
                if (success) {
                    window.location.href = "..";
                }
            });

            event.preventDefault();
        });
    });
    </script>
</body>

</html>