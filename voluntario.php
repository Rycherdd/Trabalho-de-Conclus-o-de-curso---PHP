<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="otr.css">  

    <title>Voluntário</title>
  </head>
<body>
<?php
include "conexao.php";
session_start();

$nomepro = $_SESSION['nome_user'];
if(isset($_SESSION['id_token'])){
  $idToken = $_SESSION['id_token'];
}else{
  $idToken = "";
}
$cont=0;
$contEsp = 0;
$contInd = 0;
$contDef = 0;
$status;
$x =
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
      $val[$cont] = $linha['statusVoluntario'];
      $prof = $linha['prof'];
      //echo "$val[$cont]";
      $status = $linha['statusVoluntario'];
      if($prof == $nomepro){
        if($status == 0){
          $idAgendamentoEsp[$contEsp] = $linha['id_agendamento'];
          $contEsp++;
        }
          if($status == 7){
            $idAgendamentoInd[$contInd] = $linha['id_agendamento'];
            $contInd++;      
          }
            if($status == 1){
              $idAgendamentoDef[$contDef] = $linha['id_agendamento'];
              $contDef++;
            }
      }
      if($val[$cont] == 0){
      if($prof == $nomepro){
        $nomeAluno[$cont] = $linha['nomeAluno'];
        $id[$cont] = $linha['id_agendamento'];
        $data[$cont] = $linha['data'];
        $hora = $linha['hora'];
    switch($hora){
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
  }
  
}while($linha = mysqli_fetch_assoc($resultado));
      

}


?>
<div class='container'>
    
    <div class='row'>
        
      <div class='col'>
        <div id="img">
          
          
           <footer id="cab">
            <div class="media" class="border-left-0">
              <img class="mr-4" id="ft" src="prof.png" alt="Imagem de exemplo genérica" width=150 height=150>
            
           <div class="media-body">
               
           <div id="cad">
                <div id="lista">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <b><a class="navbar-brand">Olá, <?php echo $nomepro; echo " -"?></a></b>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Para aprovar                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                          <?php
                          for($x=0;$x<$contEsp;$x++){
                            echo "<a class='dropdown-item' href='descricaoVoluntarioI.php?id=$idAgendamentoEsp[$x]'>$idAgendamentoEsp[$x]</a>";
                          }
                            ?>
                         
                            <div class="dropdown-divider"></div>
          
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Agendamentos indeferidos
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                          <?php
                          for($x=0;$x<$contInd;$x++){
                            echo "<a class='dropdown-item' href='descricaoVoluntarioI.php?id=$idAgendamentoInd[$x]'>$idAgendamentoInd[$x]</a>";
                          }
                            ?>
                         
                            <div class="dropdown-divider"></div>
          
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Agendamentos deferidos
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                          <?php
                          for($x=0;$x<$contDef;$x++){
                            echo "<a class='dropdown-item' href='descricaoVoluntarioI.php?id=$idAgendamentoDef[$x]'>$idAgendamentoDef[$x]</a>";
                          }
                            ?>
                         
                            <div class="dropdown-divider"></div>
          
                          </div>
                        </li>
                      </ul>
                      <form>
                         <a <?php echo "href='https://demo-openidc.canoas.ifrs.edu.br/session/end?id_token_hint=$idToken;&post_logout_redirect_uri=https://squadif.000webhostapp.com/oidc/logout.php'";?> class="btn btn-outline-danger my-2 my-sm-0" type="submit">LOGOUT</a>
                          <a href="direcionamentoVoluntario.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">VOLTAR</a> 
                        </form> 
                    </div>
                  </nav>
                  <div id="config">
                  <center><h1>Agendamento no SquadIF</h1></center>
                  <center><h3>Confirme seus horáros para supervisão</h3></center>
                </div>
                </footer>
          </div>
    
                
                <hr><br>
                <center><h3>Lista de solicitações</h3></center>
        <center><div id='bloco'>
          
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Data</th>
      <th scope="col">Horario</th>
      <th scope="col">Status</th>

    </tr>
  </thead>
  
  <?php
  $pid;
  echo "<tbody>";
 
               
                 echo "<forms action='confirma.php' method='POST'>";
                 for($x=0;$x<$cont;$x++){
                  echo "<tr>";
                
                  $pid = $id[$x]; 
                  echo "<th scope='row' href=''><a style='color: black;' href='descVol.php?id=$pid'>$nomeAluno[$x]</a></th>";
                    echo "<th scope='row'>$data[$x]</th>";
                    echo "<th scope='row'>$horaIni[$x] - $horaFim[$x]</th>";
                    
                    
                    echo "<td width=150px>";                   
                    echo "<a href='https://squadif.000webhostapp.com/confirma.php?id=$pid' class='btn btn-success btn-sm' data-bs-toggle='modal'>Confirmar</a>";
                    echo "<a href='https://squadif.000webhostapp.com/nega.php?id=$pid' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma'>Negar</a>";
                    echo "</td>";
                   echo "</forms>";
                 }
                
                    echo "</tr>";
              
  echo "</tbody>";
  
  ?>
 
</table>
</center></div><br>
           </div>
        
        </div>

      </div>
</div>
<script>


</script>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>