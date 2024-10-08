<?php include "../auth/adm_required.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Relatórios</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        th,
        td {
            margin: 0;
            padding: 8px;
            border: 1px solid black;
            text-align: left;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }
        
        form {
            margin-bottom: 20px;
        }

        button {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Relatórios</h1>

    <form>
        <label for="genero">Gênero
            <select id="genero" name="genero">
                <option value="">Qualquer</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="O">Outro</option>
            </select>
        </label>
        
        <label for="escolaridade">Escolaridade
            <select id="escolaridade" name="escolaridade">
                <option value="">Qualquer</option>
                <option value="f1">Fundamental 1</option>
                <option value="f2">Fundamental 2</option>
                <option value="em">Ensino Médio</option>
            </select>
        </label>
        
        <label for="uf">UF
            <select id="uf" name="uf">
                <option value="">Qualquer</option>
                <option value="sc">SC</option>
                <option value="rs">RS</option>
                <option value="pr">PR</option>
            </select>
        </label>
        
        <label for="municipio">Município
            <select id="municipio" name="municipio">
                <option value="">Qualquer</option>
                <option value="Joinville">Joinville</option>
                <option value="Curitiba">Curitiba</option>
                <option value="Porto Alegre">Porto Alegre</option>
            </select>
        </label>
        
        <label for="bairro">Bairro
            <select id="bairro" name="bairro">
                <option value="">Qualquer</option>
                <option value="Glória">Glória</option>
                <option value="Aventureiro">Aventureiro</option>
                <option value="Bucarein">Bucarein</option>
            </select>
        </label>
        
        <label for="escola">Escola
            <select id="escola" name="escola">
                <option value="">Qualquer</option>
                <option value="SESI">SESI</option>
                <option value="Outra">Outra</option>
            </select>
        </label>
        
        <label for="periodoInicial">Período Inicial
            <input type="date" id="periodoInicial" name="periodoInicial" value="<?php echo date('Y-m-d'); ?>" />
        </label>
        
        <label for="periodoFinal">Período Final
            <input type="date" id="periodoFinal" name="periodoFinal" value="<?php echo date('Y-m-d'); ?>" />
        </label>
        
        <label for="content">Mostrar
            <select name="content" id="content">
                <option value="U.genero">Gênero</option>
                <option value="U.escolaridade">Escolaridade</option>
                <option value="U.uf">UF</option>
                <option value="U.municipio">Município</option>
                <option value="U.bairro">Bairro</option>
                <option value="U.escola">Escola</option>
                <option value="A.rota_acessada">Conteúdo</option>
            </select>
        </label>
        
        <label>
            <input type="submit" value="Enviar">
        </label>
    </form>

    <table>
        <thead>
            <tr>
                <th id="label">Bairro</th>
                <th id="count">Nº de Usuários</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <br>
    <a href="..">
        <button>Início</button>
    </a>

    <script>
    </script>
</body>
</html>
<script>
    $(document).ready(() => {
        $("form").submit((event) => {
            var formData = {
                genero: $("#genero").val(),
                escolaridade: $("#escolaridade").val(),
                uf: $("#uf").val(),
                municipio: $("#municipio").val(),
                bairro: $("#bairro").val(),
                escola: $("#escola").val(),
                periodoInicial: $("#periodoInicial").val(),
                periodoFinal: $("#periodoFinal").val(),
                content: $("#content").val(),
            };

            $("table tbody").html(`
            <tr>
                <th>${$('#content').find(":selected").text()}</th>
                <th>Nº de Usuários</th>
            </tr>`);

            $.ajax({
                type: "POST",
                url: "../process/get_report.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(({
                success,
                message,
                users
            }) => {
                if (success) {
                    if (users.length < 1) {
                        $("table tbody").html(`
                    <tr>
                        <td>Nenhum usuário encontrado</td>
                    </tr>`);
                    } else {
                        users.forEach((row) => {
                            $("table tbody").append(`
                    <tr>
                        <td>${row.label}</td>
                        <td>${row.count}</td>
                    </tr>`);
                        });
                    }

                    return;
                }

                $("table tbody").html(`
                    <tr>
                        <td>Erro ao buscar usuários, tente novamente.</td>
                    </tr>`);
            });

            event.preventDefault();
        });

        $("form option").click(() => {
            $("form").submit();
        })

        $("form").submit();
    });
    </script>
</body>

</html>