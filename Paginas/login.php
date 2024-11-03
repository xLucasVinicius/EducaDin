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
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <h1>Login</h1>
        <input type="email" name="email" id="email">
        <input type="password" name="senha" id="email" required>
        <button type="submit">logar</button>
        <a href="cadastro.php">Realizar cadastro</a>
    </form>
    
</body>
</html>