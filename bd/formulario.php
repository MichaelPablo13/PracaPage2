<?php

    /*CONEXÃO DO BANCO DE DADOS  */
    include("conexaoBD.php");
    if (!$_conecta) {
        echo 'Não foi possível a conexão com o banco: ' . mysqli_error($_conecta);
    }

    $name = $_POST['name'];
    $email = $_POST['e_mail'];
    $cpf = $_POST['name'];
    $feedback = $_POST['feedback'];


    //Insere registros no banco de dados*/
    $_sql = "insert into formulario ( nome, email, cpf, feedback) values('$name', '$emal', '$cpf', '$feedback')";
    $_res = $_conecta->query($_sql);


    if($_res === FALSE){
        echo "Erro na inclusão dos registros..." . $_conecta->error . "<br/>";
    } else {
        echo $_conecta->affected_rows . " Registros incluidos com sucesso<br/>";
    }
    $_conecta->close();
    include("index.php")


?>