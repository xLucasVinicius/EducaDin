<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducaDin</title>
    <!-- favicon -->
     <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    <!-- css navbar -->
     <link rel="stylesheet" href="../Style/padrao.css">
    <!-- css geral -->
    <link rel="stylesheet" href="../Style/index.css">

    <script src="../Js/script.js" async></script>

    <!-- Bootstrap-Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <section>  <!-- section menu superior -->
        <div class="nav-topo">
            <img src="../imagens/imagem-perfil.png" alt="">
            <h1>Nome Usuario</h1>
        </div>
    </section> <!-- section menu superior -->
    
    <section>  <!-- section menu lateral -->
        <div class="nav-lateral">
            <div class="logo-box">
                <img src="../imagens/logo.png" alt="logo EducaDin">
                <i class="bi bi-arrow-bar-left"></i>
            </div>
            <ul>
                <li class="">
                    <a href="?page=dashboard" class="link-navbar">
                        <i class="bi bi-house-door"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="?page=lancamentos" class="link-navbar">
                        <i class="bi bi-graph-up-arrow"></i>
                        Lançamentos
                    </a>
                </li>
                <li>
                    <a href="?page=desempenho" class="link-navbar">
                        <i class="bi bi-house-door"></i>
                        Desempenho
                    </a>
                </li>
                <li>
                    <a href="?page=minigames" class="link-navbar">
                        <i class="bi bi-house-door"></i>
                        Mini Games
                    </a>
                </li>
                <li>
                    <a href="?page=planos" class="link-navbar">
                        <i class="bi bi-house-door"></i>
                        Planos
                    </a>
                </li>
                <li>
                    <a href="?page=investimentos" class="link-navbar">
                        <i class="bi bi-house-door"></i>
                        Investimentos
                    </a>
                </li>
                <li>
                    <a href="?page=estudos" class="link-navbar">
                        <i class="bi bi-house-door"></i>
                        Estude Finanças
                    </a>
                </li>
                <li>
                    <a href="#" class="link-navbar">
                        <i class="bi bi-house-door"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="link-navbar">
                        <i class="bi bi-house-door"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="link-navbar">
                        <i class="bi bi-house-door"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="link-navbar">
                        <i class="bi bi-house-door"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="link-navbar">
                        <i class="bi bi-house-door"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="link-navbar">
                        <i class="bi bi-house-door"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="link-navbar">
                        <i class="bi bi-house-door"></i>
                        Home
                    </a>
                </li>
            </ul>
            <div class="config-user">
                <ul>
                    <li>
                        <a href="?page=contato" class="link-navbar">
                            <i class="bi bi-question-circle"></i>
                            Suporte
                        </a>
                    </li>
                    <li>
                        <a href="?page=alterar" class="link-navbar">
                            <i class="bi bi-person-circle"></i>
                            Configurações
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section> <!-- section menu lateral --> 

    <section class="conteudo">  <!-- section conteúdo -->
        <?php
        ob_start();
            include("config.php");
            switch(@$_REQUEST["page"]){
                case "dashboard":
                    include("dashboard.php");
                break;
                case "lancamentos":
                    include("lancamentos.php");
                break;
                case "desempenho":
                    include("desempenho.php");
                break;
                case "minigames":
                    include("mingames.php");
                break;
                case "planos":
                    include("planos.php");
                break;
                case "investimentos":
                    include("investimentos.php");
                break;
                case "estudos":
                    include("estudos.php");
                break;
                case "contato":
                    include("contato.php");
                break;
                case "alterar":
                    include("alterar.php");
                break;
                case "login":
                    include("login.php");
                break;
                default:
                include("cadastro.php");       
            }
        ?>
    </section> <!-- section conteúdo -->
</body>
</html>