<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="out.css">  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css"/>
    <script src="https://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="https://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
    <title>Agendamento</title>
    
    
  </head>

<body>


<?php
session_start();
include "conexao.php";
$valida = $_GET['id'];
$obs = "";

$sql = "SELECT * FROM agendamento";


$resultado = mysqli_query($conn, $sql) or die ("Erro em tela");

$linha = mysqli_fetch_assoc($resultado);
$total = mysqli_num_rows($resultado);

if($total > 0){
  
    
    do{
       
        //
        $idd = $linha['id_agendamento'];
        //echo "<br> $idd";
        //echo "<br>$valida";
    if($idd == $valida){
        echo "teste";
       
      
       $sql = "UPDATE agendamento SET statusVoluntario = 7 WHERE id_agendamento = $idd";
        mysqli_query($conn,$sql);
    }
}while($linha = mysqli_fetch_assoc($resultado));
header("Location:https://squadif.000webhostapp.com/voluntario.php");

}


?>
