<?php
    require 'Class/Contato.php';
    $contato = new Contato();
?>

<!doctype html>
<html>
    <header>
        <title>Crud com estilização</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    </header>
    <body>
        <div class="container">
            <div class = "h1">
                Contatos
            </div>
            
            <hr>
            
            <div class="container">
                <a class="btn btn-info" href="Pages/adicionar.php">Adicionar</a>
            </div>

            <table class="table table-sm rounded" style="width=500px; margin-top:10px; margin-left:10px;">
                <thead>
                    <tr class="row" style="border:1px solid black; text-align:center;">
                        <th class="col">ID</th>
                        <th class="col">Nome</th>
                        <th class="col">Email</th>
                        <th class="col">Ações</th>
                    </tr>  
                </thead>   
                    <?php
                    $lista = $contato->getAll();
                    
                    if($lista == array()) { ?>
                        <tr class="row"><td class="col"><td><tr>
                        <td style="text-align:center; color:red;" class="col" colspan="4"><h3>
                            <?php echo "Nenhum contato na lista"; ?> </h3></td>
                    <?php
                    }

                    foreach($lista as $item):
                    ?>
                    <tbody>
                        <tr class="row" style="border:1px solid #ccc; margin-top:3px; text-align:center;">
                            <td class="col"> <?php echo $item['id']; ?> </td>
                            <td class="col"> <?php echo $item['nome']; ?> </td>
                            <td class="col"> <?php echo $item['email']; ?> </td>
                            <td class="col">
                                <a href="Pages/editar.php?email=<?php echo $item['email']; ?>" 
                                    class="btn btn-success">Editar</a>

                                <a href="Pages/excluir.php?email=<?php echo $item['email']; ?>"
                                    class="btn btn-danger">Excluir</a>
                            </td>

                        </tr>
                    </tbody>
                    <?php endforeach; ?>
            </table>
        </div>

        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>