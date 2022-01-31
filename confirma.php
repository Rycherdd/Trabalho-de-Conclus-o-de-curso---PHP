<?php
include "conexao.php";
$valida = $_GET['id'];


$sql = "SELECT * FROM agendamento";
$zero = 0;
$um = 1;

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
       
       
       $sql = "UPDATE agendamento SET statusVoluntario = 1 WHERE id_agendamento = $idd";
        mysqli_query($conn,$sql);
    }
}while($linha = mysqli_fetch_assoc($resultado));
header("Location:https://squadif.000webhostapp.com/voluntario.php");

}


?>