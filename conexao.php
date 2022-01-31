<?php
    $server = "localhost";
    $user = "id18002367_userssquadif";
    $pass = "/\M>]9=*u]A?Kt{|";
    $bd = "id18002367_squadif";
    
    $conn = mysqli_connect($server, $user, $pass, $bd);
        if($conn = mysqli_connect($server, $user, $pass, $bd)){
echo "";
        }else
            echo "";
    
    function mensagem($texto, $tipo){
     echo "<div class='alert alert-$tipo' role='alert'>
        $texto
           </div>";
    } 

    function mostra_data($data){
        $d = explode('-', $data);
        $escreve = $d[2] ."/".$d[1]."/".$d[0];
        return $escreve;
    }
?>  