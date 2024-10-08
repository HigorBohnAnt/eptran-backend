<?php include "../auth/adm_required.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Registro de Administrador</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h1>Registrar Administrador</h1>
    <form>
        <label for="email" required>Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Registrar">
    </form>

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
            };


            $.ajax({
                type: "POST",
                url: "../process/adm_register.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(({
                message
            }) => {
                alert(message);
            })

            event.preventDefault();
        })
    });
    </script>

</body>

</html>