<?php 


if ( /* se tiver sessão ativa */ ) {
    //toda pagina do home
} else {
    print "<script>location.href='?page=login';</script>";
}
?>