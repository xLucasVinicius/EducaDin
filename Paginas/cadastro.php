<?php
include('config.php');
if(isset($_POST['email'])) {
$arquivo = $_FILES['file'];
    if($arquivo['error'])
        die("Falha ao enviar arquivo");
    if ($arquivo['size'] > 2097152)
        die("Arquivo muito grande! Max: 2mb");


    $pasta = "../foto-perfil/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if($extensao != 'jpg' && $extensao != 'png')
        die("Tipo de arquivo não aceito");

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $num_cel = $_POST['telefone'];
    $data_nasc = $_POST['data-nasc'];
    $estado = $_POST['estado'];

        if($deu_certo){
            $mysqli->query("INSERT INTO usuarios (path , nome, sobrenome, email, senha, num_tel, data_nasc, estado) VALUES ('$path','$nome', '$sobrenome', '$email', '$senha', '$num_cel', '$data_nasc', '$estado')");
            echo "<script>alert('Cadastrado com sucesso')</script>";
            echo "<script>location.href='login.php'</script>";

        } else {
            echo "<h1>Falha ao enviar arquivo de midia</h1>";
        }
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap');


    * {
        font-family: sans-serif;
    }

    body {
        background-color: #1F1F1F;
    }

    form {
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
        margin: auto;
        width: 700px;
        height: 100%;
        justify-content: center;
        align-items: center;
    }

    form > h1 {
        font-size: 3rem;
        font-family: 'orbitron';
        margin-bottom: 100px;
        color: #F5A900;
    }

    label {
        color: #F5A900;
        margin-top: 20px;
    }

    input, #estado {
        background-color: transparent;
        color: white;
        padding: 15px;
        border: 1.5px solid white;
        border-radius: 4px;
    }

    input:focus {
        color: white;
        outline: none;
    }

    input::placeholder {
        color: white;
    }

    .img-perfil {
        display: flex;
        justify-content: center;
    }

    .input-img-perfil {
        position: relative;
    }

    .img-perfil img{
        width: 150px;
        border-radius: 50%;
    }

    input[type="file"] {
        display: none;
    }

    .file-label {
        justify-content: center;
        align-items: center;
        display: flex;
        position: absolute;
        bottom: 0;
        right: 5px;
        background-color: white;
        color: black;
        width: 35px;
        height: 35px;
        border-radius: 50%;
    }

    .file-label i {
        font-size: 20px;
    }
    
    .input-name, .input-outras-infos {
        display: flex;
        width: 100%;
        justify-content: space-between;
    }

    .input-login {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    #nome, #sobrenome, #data-nasc, #estado {
        width: 300px;
    }

    #data-nasc {
        color: white;
    }

    #estado {
        color: white;
    }

    select option {
        color: black;
        background-color: transparent;
    }

    span > label{
        display: block;

    }

    .btn-form {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        width: 100%;
    }

    #btn-input1 {
        text-align: end;
    }

    #btn-input1, #btn-input2 {
        width: 300px;
    }

    #btn-salvar {
        background-color: #F5A900;
        color: white;
        border: none;
        padding: 7px;
        width: 100px;
        font-size: 1rem;
    }
    button {
        
        background-color: white;
        color: #F5A900;
        padding: 7px;
        width: 100px;
        border: #F5A900;
        border-radius: 4px;
        font-size: 1rem;
    }

</style>

<form action="" method="post" enctype="multipart/form-data">
    <h1>Cadastro</h1>
    <div class="input-img-perfil">
        <div class="img-perfil">
            <img src="../foto-perfil/default.png" alt="">
        </div>
        <label for="file" class="file-label">
        <i class="bi bi-pencil"></i>
        </label>
        <input type="file" name="file" id="file">
    </div>
    
    <div class="input-name">
        <span>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>
        </span>

        <span>
            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="sobrenome" placeholder="Digite seu sobrenome" required>
        </span>
    </div>
    <div class="input-login">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="exemplo@gmail.com" required>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" placeholder="digite sua senha" required>

        <label for="telefone">Número</label>
        <input type="tel" name="telefone" id="telefone" placeholder="11 99999-9999" required>
    </div>
    <div class="input-outras-infos">
        <span>
            <label for="data-nasc">Data de Nascimento</label>
            <input type="date" name="data-nasc" id="data-nasc">
        </span>

        <span>
            <label for="estado">Estado</label>
            <select name="estado" id="estado">
                <option value="Acre">Acre</option>
                <option value="Alagoas">Alagoas</option>
                <option value="Amapá">Amapá</option>
                <option value="Amazonas">Amazonas</option>
                <option value="Bahia">Bahia</option>
                <option value="Ceará">Ceará</option>
                <option value="Distrito Federal">Distrito Federal</option>
                <option value="Espírito Santo">Espírito Santo</option>
                <option value="Goiás">Goiás</option>
                <option value="Maranhão">Maranhão</option>
                <option value="Mato Grosso">Mato Grosso</option>
                <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                <option value="Minas Gerais">Minas Gerais</option>
                <option value="Pará">Pará</option>
                <option value="Paraíba">Paraíba</option>
                <option value="Paraná">Paraná</option>
                <option value="Pernambuco">Pernambuco</option>
                <option value="Piauí">Piauí</option>
                <option value="Rio de Janeiro">Rio de Janeiro</option>
                <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                <option value="Rondônia">Rondônia</option>
                <option value="Roraima">Roraima</option>
                <option value="Santa Catarina">Santa Catarina</option>
                <option value="São Paulo">São Paulo</option>
                <option value="Sergipe">Sergipe</option>
                <option value="Tocantins">Tocantins</option>
            </select>
        </span>
    </div>
    <div class="btn-form">
        <span id="btn-input1"><button>Cancelar</button></span>
        <span id="btn-input2"><input id="btn-salvar" type="submit" value="Salvar"></span>
    </div>



</form>