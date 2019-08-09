<?php
    //CRUD = CREATE READ UPDATE DELETE
    //C => capacidade de criar novos registros em determinada tabela
    //R => capacidade de ler um ou mais registros de determinada tabela
    //U => capacidade de atualizar/update um ou mais registros
    //D => capacidade de deletar um ou mais registros

    require 'Contato.php';

    $contato = new Contato();

    //$contato->addContato('testando@gmail.com', 'Teste');
    //$contato->addContato('fulano@gmail.com');

    //$nome = $contato->getNome('testando@gmail.com');
    //echo "Nome => ".$nome;

    // $lista = $contato->getAll();
    // echo "<pre>";
    // print_r($lista);

    //$contato->editar('Fulano', 'fulano@gmail.com');

    $excluir = $contato->excluir('fulano@gmail.com');

    if($excluir == true) {
        echo "Contato excluido!";
    } else {
        echo "Contato nao encontrado!";
    }
?>