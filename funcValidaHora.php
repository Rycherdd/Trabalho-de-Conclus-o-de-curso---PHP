<?php
include "conexao.php";
session_start();
$data = $_POST['data'];
$qtd_pessoas = $_POST['qtd_pessoas'];
$nomeP = $_POST['nomeP'];
$esporte = $_POST['interest'];
$materiais = $_POST['materiais'];
$prof = $_POST['prof'];
//echo "DATA VIA POST - ".$data."<br>";
$_SESSION['qtd_pessoas'] = $qtd_pessoas;
$_SESSION['nomeP'] = $nomeP;
$_SESSION['materiais'] = $materiais;
$_SESSION['prof'] = $prof;
$_SESSION['esporte'] = $esporte;
$_SESSION['data'] = $data;
$_SESSION['livre'] = array();

echo "$prof";
$x = 0;
$y = 0;
$n= 0;
$z = 0;
$vet = array();
$vetComp = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
$vetDisp = array();
$vetDisp = 0;

    $sql = "SELECT * FROM agendamento";


    $resultado = mysqli_query($conn, $sql) or die ("Erro em tela");
    
    $linha = mysqli_fetch_assoc($resultado);
    $total = mysqli_num_rows($resultado);
   
    if($total > 0){
      
        
        do{
            $nomeAluno = $linha['nomeAluno'];
            $dataa = $linha['data'];
            //echo "<br>DATA DENTRO DO IF TOTAL - ".$dataa."<br>";
        if($data == $dataa){
          
            $hora = $linha['hora'];
            //echo "<br> HORA - ".$hora;
            if($hora >= 1){
            $vet[$x] = $hora;
           
            //echo "<br>$dataa -";
           $x++;
        }
        }
        
       // echo $_SESSION['values'];

    }while($linha = mysqli_fetch_assoc($resultado));
    
}



    if($x>=1){
        for($y = 0;$y < $x;$y++){
           // echo "<br>$vet[$y]";
                for($z = 0; $z<11;$z++){
                    if($vet[$y] == $vetComp[$z]){
                    $vetComp[$z] = 0;
                    $z=11;
                    }
                }
        }
    }else{
        echo $x;
        //echo "todos horarios livres";
    }

 for($n = 0; $n<11;$n++){
     if($vetComp[$n] != 0){
     //echo "<br>Horarios disponiveis - ".$vetComp[$n];
     $_SESSION['livre'][] = $vetComp[$n];
    
     }
}

    //$_SESSION['livre'] = $vetComp;

    //print_r($_SESSION['livre']);
 
header("Location:Ini.php");


    // COR NO VOLUNTARIO - NOTIFICAÇÃO 
    // ESTILIZAÇÃO DO CSS
?>