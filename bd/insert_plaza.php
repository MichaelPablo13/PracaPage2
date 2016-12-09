<?php
include("conexaoBD.php");
    
    //Initialize the variables
    /*$name = '';
    $address = '';

    $latitude = 0.0;
    $longitude = 0.0;*/
    

    if (!$_conecta) {
        echo 'Não foi possível a conexão com o banco: ' . mysqli_error($_conecta);
    }

    //test if the value is null
    /*if (isset($_POST['plaza_name']))
    {
        $plaza_name = $_POST['plaza_name'];
        echo $name;
        echo "That's the plaza name $plaza_name";
    } else {
        $plaza_name = null;
        echo "no user name supplied";
    }*/


    //Insere registros no banco de dados
    $plaza_name = $_GET['plaza_name'];
    $plaza_address = $_GET['plaza_address'];
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];

    if($latitude == NULL){
        echo "Error";
        
    } else {
        $sql = "INSERT INTO markers (plaza_name, plaza_address, latitude, longitude) VALUES ('$plaza_name', '$plaza_address', '$latitude', '$longitude');";
        $_res = $_conecta->query($sql);
    }

    
    if($_res === FALSE){
        echo "Erro na inclusão dos registros..." . $_conecta->error . "<br/>";
    } else {
        echo $_conecta->affected_rows . " Registros incluidos com sucesso<br/>";
    }
    
    $_conecta->close();
    /*header(location .'index.php');
    exit;*/

?>
