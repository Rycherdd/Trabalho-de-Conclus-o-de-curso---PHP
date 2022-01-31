<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="tes.css">  
    <title>Agendamento</title>
  </head>
<style>
    
</style>
<body>
  <?php 
  $valida = $_GET['id'];


  session_start();
include "conexao.php";
if(isset($_SESSION['id_token'])){
  $idToken = $_SESSION['id_token'];
}else{
  $idToken = "";
}
$cont=0;
$horaIni=array();
$horaFim=array();
$nomeAluno = array();
$val = array();
$hora = array();


$sql = "SELECT * FROM agendamento";


$resultado = mysqli_query($conn, $sql) or die ("Erro em tela");

$linha = mysqli_fetch_assoc($resultado);
$total = mysqli_num_rows($resultado);


if($total > 0){
  
    do{
     
      $id[$cont] = $linha['id_agendamento'];
      if($valida == $id[$cont]){
        $prof[$cont] = $linha['prof'];
        $nomeAluno[$cont] = $linha['nomeAluno'];
        $data[$cont] = $linha['data'];
        $hora[$cont] = $linha['hora'];
        $esporte[$cont] = $linha['esporte'];
        $qtd_pessoas[$cont] = $linha['qtd_pessoas'];
        $nomeP[$cont] = $linha['nomeP'];
        $materiais[$cont] = $linha['materiais'];
     
    switch($hora[$cont]){
      case 1:
        $horaIni[$cont] = "8h";
        $horaFim[$cont] = "9h";
        break;
        case 2:
          $horaIni[$cont] = "9h";
          $horaFim[$cont] = "10h";
          break;
          case 3:
            $horaIni[$cont] = "10h";
            $horaFim[$cont] = "11h";
            break;
            case 4:
              $horaIni[$cont] = "11h";
              $horaFim[$cont] = "12h";
              break;
              case 5:
                $horaIni[$cont] = "12h";
                $horaFim[$cont] = "13h";
                break;
                case 6:
                  $horaIni[$cont] = "13h";
                  $horaFim[$cont] = "14h";
                  break;
                  case 7:
                    $horaIni[$cont] = "14h";
                    $horaFim[$cont] = "15h";
                    break;
                    case 8:
                      $horaIni[$cont] = "15h";
                      $horaFim[$cont] = "16h";
                      break;
                      case 9:
                        $horaIni[$cont] = "16h";
                        $horaFim[$cont] = "17h";
                        break;
                        case 10:
                          $horaIni[$cont] = "17h";
                          $horaFim[$cont] = "18h";
                          break;
                          case 11:
                            $horaIni[$cont] = "18h";
                            $horaFim[$cont] = "19h";
                            break;
                          
    }
   $cont++;
  }
  
        //echo "<br>DATA DENTRO DO IF TOTAL - ".$dataa."<br>";
    
   // echo $_SESSION['values'];
}while($linha = mysqli_fetch_assoc($resultado));
      

}





  ?>
    

      <div class='container'>
    
    <div class='row'>
        
      <div class='col'>
        <div id="img">
          
          
           <footer id="cab">
            <div class="media" class="border-left-0">
              <img class="mr-4" id="ft" src="alu.png" alt="Imagem de exemplo genérica" width=150 height=150>
            
           <div class="media-body">
               

        
                <div id="cad">
                <div id="lista">
                  
                  <div id="config">
                  <center><h1>Agendamento no SquadIF</h1></center>
                  <center><h3>Campos preenchidos</h3></center>
                </div>
                </footer>
          </div>
    
                
                <hr><br>
               


    <?php                
      
          
          echo "<div class='mb-3'>";
            echo "<fieldset>";
            for($x=0;$x<$cont;$x++){
              echo "<legend>Esporte escolhido</legend>";
              echo "<div>";
                echo "<label>$esporte[$x]</label>";
              echo "</div>";
            echo "</fieldset>";
          echo "</div>";
          echo "<legend>Quantidade de pessoas</legend>";
          
          echo "<div class='mb-3'>";
          echo "<label>$qtd_pessoas[$x]</label>";
        echo "</div>";
         
        echo "<legend>Nome das pessoas</legend>";
        echo "<div class='mb-3'>";
        echo "<label>$nomeP[$x]</label>";
      echo "</div>";

      echo "<legend>Materiais necessários</legend>";
      echo "<div class='mb-3'>";
      echo "<label>$materiais[$x]</label>";
    echo "</div>";
  echo "<hr>";

         echo "<legend>Servidor responsável</legend>";
      echo "<div class='mb-3'>";
      echo "<label>$prof[$x]</label>";
    echo "</div>";

    echo "<legend>Data</legend>";
    echo "<div class='mb-3'>";
    echo "<label>$data[$x]</label>";
    echo "</div>";
    
    echo "<legend>Horário</legend>";
    echo "<div class='mb-3'>";
    echo "<label>$horaIni[$x] - $horaFim[$x]</label>";
    echo "</div>";
}
?>


<a class="btn btn-primary" type="button" value="Voltar" href="https://squadif.000webhostapp.com/Ini.php">Voltar</a>
          <br>
        </div>
      </div>
    </div>
</div>
</div>

</div>


      

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </body>
</html>