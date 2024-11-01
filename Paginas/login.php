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
        header("Location: index.php?page=dashboard");
    } else{
        echo "Falha ao realizar login";
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
        <input type="email" name="email" id="">
        <input type="password" name="senha" id="">
        <button type="submit">logar</button>
    </form>
    
</body>
</html>