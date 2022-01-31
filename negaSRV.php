<?php
include "conexao.php";
$valida = $_GET['id'];


$sql = "SELECT * FROM agendamento";


$resultado = mysqli_query($conn, $sql) or die ("Erro em tela");

$linha = mysqli_fetch_assoc($resultado);
$total = mysqli_num_rows($resultado);

if($total > 0){
  
    
    do{
       
        //
        $idd = $linha['id_agendamento'];
        echo "<br> $idd";
        echo "<br>$valida";
    if($idd == $valida){
        echo "teste";
       
       
       $sql = "UPDATE agendamento SET statusVoluntario = 8 WHERE id_agendamento = $idd";
        mysqli_query($conn,$sql);
    }
}while($linha = mysqli_fetch_assoc($resultado));
header("Location:https://squadif.000webhostapp.com/supervisor.php");

}


?>