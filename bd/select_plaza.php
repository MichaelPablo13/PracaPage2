<?php
include ("conexaoBD.php"); //faz a conexão ao banco de dados

    $_sql = "SELECT * FROM markers";
    $_res = $_conecta->query($_sql);
    
    if($_res === FALSE){
        echo "Erro na consulta do banco.".$_conecta->error."<br/>";
    } else {
       /* echo "Banco lido com sucesso <br/>";

        $_nr = $_res->num_rows;
        echo "A consulta retornou ".(int) $_nr . " registros <br/>";*/
    }

    $plazas = array();

    while($_address = $_res->fetch_assoc()){
        
        array_push($plazas, $_address);
    
    }


    $_conecta->close();
?>
