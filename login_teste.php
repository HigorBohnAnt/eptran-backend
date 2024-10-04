<!DOCTYPE html>  
<html lang="pt-BR">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Login</title>  
</head>  
<body>  
    <h2>Login</h2>  
    <form action="process_login.php" method="POST">  
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

    <div> 
    <br>
    <a href="cadastro_teste.html">
    <button>Cadastro</button>
    </a>   
    </div>  
</body>