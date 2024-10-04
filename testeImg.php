<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
</head>
<body>

<form action="update_img_url.php" method="post" enctype="multipart/form-data">
    <h1>Upload de Imagem</h1>
    <label for="arquivo">Escolha uma imagem:</label>
    <input type="file" id="arquivo" name="arquivo" accept="image/*">
    <br><br>
    <input type="submit" value="Carregar Imagem">
</form>

</body>
</html>
