<?php 
session_start();
if(isset($_POST['email'])){
    include('config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $sql_exec = $mysqli->query($sql_code) or die($mysql->error);

    $usuario = $sql_exec->fetch_assoc();
    if(password_verify($senha, $usuario['senha'])) {
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['sobrenome'] = $usuario['sobrenome'];
        $_SESSION['file'] = $usuario['path'];
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['telefone'] = $usuario['num_tel'];
        $_SESSION['data_nasc'] = $usuario['data_nasc'];
        $_SESSION['estado'] = $usuario['estado'];
        header('location: index.php');
    } else{
        echo "<h1>Falha ao realizar login</h1>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Style/login.css">
</head>
<body>

    <div class="content">
        <form action="" method="post">
            <h1>Educa<span id="titulo">Din</span></h1>
            <label for="email">Endereço de Email</label>
            <input class="input" type="email" name="email" id="email" placeholder="exemplo@mail.com">
            
                <label for="senha">Senha</label>
            
            <input class="input" type="password" name="senha" id="senha" required placeholder="********">
            <span id="remember-box">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember" id="remember-label">Manter conectado</label>
            </span>
            <input type="submit" value="Login">
            <a href="#">Esqueci a senha</a>
        </form>
        <div class="login-google">
            <span class="linha1"></span>
            <span class="linha2"></span>
            <p>Acessar com</p>
            <!-- Aqui vem botao de login com o google -->
             <button>login com o google</button>
        </div>
        
        <a href="cadastro.php">Realizar cadastro</a>
    </div>
</body>
</html>