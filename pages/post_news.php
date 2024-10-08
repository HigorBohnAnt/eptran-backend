<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro de Notícias</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        label {
            display: block;
            margin-bottom: 10px;
        }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button {
            margin-top: 10px;
            padding: 10px 15px;
        }
    </style>
</head>

<body>
    <h1>Cadastrar Nova Notícia</h1>

    <form id="newsForm" action="../process/post_news.php" method="post" enctype="multipart/form-data">
        <label for="titulo">Título:
            <input type="text" id="titulo" name="titulo" required />
        </label>

        <label for="descricao">Descrição:
            <textarea id="descricao" name="descricao" required></textarea>
        </label>

        <label for="texto">Texto Completo:
            <textarea id="texto" name="texto" required></textarea>
        </label>

        <label for="escolaridade">Escolaridade Mínima:
            <select id="escolaridade" name="escolaridade" required>
                <option value="">Selecione</option>
                <option value="f1">Fundamental 1</option>
                <option value="f2">Fundamental 2</option>
                <option value="em">Ensino Médio</option>
            </select>
        </label>

        <label for="arquivo">Imagem:
            <input type="file" id="arquivo" name="arquivo" accept=".jpg, .jpeg, .gif, .png" required />
        </label>

        <button type="submit">Cadastrar Notícia</button>
    </form>

    <div id="message"></div>
</body>
</html>

