<?php include "../auth/login_required.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <button id="logout">Logout</button>

    <br>
    <br>

    <a href="..">
        <button>Início</button>
    </a>
    <script>
    $(document).ready(() => {
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