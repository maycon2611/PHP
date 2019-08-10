<?php 
    include "../Class/Contato.php";
    $contato = new Contato();

    if(isset($_GET['email']) && !empty($_GET['email'])) {
        $email = $_GET['email'];

        $contato->excluir($email);
    } 
    
    header("Location: ../index.php");
?>