<?php
include ("conexaoBD.php"); //faz a conexão ao banco de dados

$_sql = "SELECT * FROM markers";
    $_res = $_conecta->query($_sql); // Query in Markers
    if($_res === FALSE){
        echo "Erro na consulta do banco.".$_conecta->error."<br/>";
    } else{

        /*echo "Banco lido com sucesso <br/>";

        $_nr = $_res->num_rows;
        echo "A consulta retornou ".(int) $_nr . " registros <br/>";*/
    }

    $plaza_name = array();

    while($address = $_res->fetch_assoc()){

        array_push($plaza_name, $address);
    }
$_conecta->close();
?>
