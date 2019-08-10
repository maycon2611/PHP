<?php
    require "../Class/Contato.php";
    $contato = new Contato();

    if(isset($_GET['email']) && !empty($_GET['email'])) {
        $email = $_GET['email'];
        
        $dados = $contato->getOne($email);

        if(isset($_POST['email'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];

            $contato->editar($nome, $email);
            header('Location: ../index.php');
        }
    
        } else {
            header("Location: ../index.php");
            exit;
        }
?>

<!doctype html>
<html>
    <head>
    <title>Editar Usuário</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    </head>
    <body>
        
        <div class="container">
            <div class="h1">Editar usuário</div>
            <hr>

            <form method="POST">
                <div class="form-group">
                    <input type="text" name="nome" class="form-control col-5" value="<?php echo $dados['nome']; ?>"><br>
                    <input type="email" name="email" class="form-control col-5" value="<?php echo $dados['email'] ?>" readonly><br>
                    <input type="submit" name="Salvar" class="form-control col-2 btn-success"><br>
                </div>
            </form>
        </div> 

        <script type="text/javascript" src="../assets/js/jquery.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>