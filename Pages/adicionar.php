<?php 
    require '../Class/Contato.php';
    $contato = new Contato();

    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
        $nome = $_POST['nome'];

        $contato->addContato($email, $nome);

        header('Location: ../index.php');
    }
?>

<!doctype html>
<html>
    <head>
    <title>Adicionar Usuário</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    </head>
    <body>
        
        <div class="container">
            <div class="h1">Adicionar novo usuário</div>
            <hr>

            <form method="POST">
                <div class="form-group">
                    <input type="text" name="nome" placeholder="Nome" class="form-control col-5"><br>
                    <input type="email" name="email" placeholder="E-mail" class="form-control col-5"><br>
                    <input type="submit" name="Adicionar" class="form-control col-2 btn-success"><br>
                </div>
            </form>
        </div> 

        <script type="text/javascript" src="../assets/js/jquery.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>