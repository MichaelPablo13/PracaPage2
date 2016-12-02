<?php

    $_conecta = mysqli_connect('localhost:3306','root','root','plaza_for_hortolandia'); /* server, user, pass, db  */
        if (!$_conecta) {
            echo 'Não foi possível a conexão com o banco: ' . mysqli_error($_conecta);
        } else {
            /*echo 'Conexão ok<br/>';*/
        }


?>
