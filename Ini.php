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




$nomeAluno;
$cont = 0;
$contEsp = 0;
$contInd = 0;
$id = $_SESSION['id_token'];

$check = ["", "", "", "", ""]; 
$select = ["","","","","",""];
$array_esportes = ["Volei", "Futebol","Handebol", "Basquete", "Demais Atividades"];
$array_professores=["nome.sobrenome1","nome.sobrenome2","nome.sobrenome3","nome.sobrenome4","nome.sobrenome5","nome.sobrenome6"];
if (isset($_SESSION['livre'])) {
  $livre = $_SESSION['livre'];
  $qtd_pessoas = $_SESSION['qtd_pessoas'];
  $nomeP = $_SESSION['nomeP'];
  $materiais = $_SESSION['materiais'];
  $esporte = $_SESSION['esporte'];
  $prof = $_SESSION['prof'];
  $data = $_SESSION['data'];
  $nomeAluno = $_SESSION['nome_user'];
  $chaveSelecionada = array_search($esporte, $array_esportes);
  $check[$chaveSelecionada] = 'checked';

$chaveSel = array_search($prof, $array_professores);
$select[$chaveSel] = 'select';

  /*switch($esporte){
      case 'Volei':
        $check[0] = 'checked';
        break;
        case 'Futebol':
          $check[1] = 'checked';
          break;
          case 'Handebol':
            $check[2] = 'checked';
            break;
            case 'Basquete':
              $check[3] = 'checked';
              break;
              case 'Demais Atividades':
                $check[4] = 'checked';
                break;
                default:
                $check[0] = 'checked';
  }
  */
  
}else{
  $livre = [];
  $qtd_pessoas = "";
  $nomeP = "";
  $materiais = "";
  $esporte = "";
  $prof = "";
  $check[0] = 'checked';
  $data = "";
}


$sql = "SELECT * FROM agendamento";


$resultado = mysqli_query($conn, $sql) or die ("Erro em tela");

$linha = mysqli_fetch_assoc($resultado);
$total = mysqli_num_rows($resultado);
$nomeAluno = $_SESSION['nome_user'];
if($total > 0){
  
    
    do{
      $nomeAa = $linha['nomeAluno'];
      $status = $linha['statusVoluntario'];
      if($nomeAluno == $nomeAa){
        $idAgendamento[$cont] = $linha['id_agendamento'];
        $cont++;
        if($status == 0){
          $idAgendamentoEsp[$contEsp] = $linha['id_agendamento'];
          $contEsp++;
        }
          if($status == 7 || $status == 8){
            $idAgendamentoInd[$contInd] = $linha['id_agendamento'];
            $contInd++;
          }
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
              <img class="mr-4" id="ft" src="alu.png" alt="Imagem de exemplo genérica" width=150 height=150>
            
           <div class="media-body">
               

        
                <div id="cad">
                <div id="lista">
                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <b><a class="navbar-brand">Olá, <?php echo $nomeAluno; echo " -"?></a></b>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Em espera de analise
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                          <?php
                          for($x=0;$x<$contEsp;$x++){
                            echo "<a class='dropdown-item' href='descricao_info.php?id=$idAgendamentoEsp[$x]'>$idAgendamentoEsp[$x]</a>";
                          }
                            ?>
                         
                            <div class="dropdown-divider"></div>
          
                          </div>
                        </li>

                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            indeferimento
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                          <?php
                          for($x=0;$x<$contInd;$x++){
                            echo "<a class='dropdown-item' href='descricao_info.php?id=$idAgendamentoInd[$x]'>$idAgendamentoInd[$x]</a>";
                          }
                            ?>
                         
                            <div class="dropdown-divider"></div>
          
                          </div>
                        </li>

                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Seus agendamentos
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                          <?php
                          for($x=0;$x<$cont;$x++){
                            echo "<a class='dropdown-item' href='descricao_info.php?id=$idAgendamento[$x]'>$idAgendamento[$x]</a>";
                          }
                            ?>
                         
                            <div class="dropdown-divider"></div>
          
                          </div>
                        </li>


                      </ul>
                      <form>
                        <a <?php echo "href='https://demo-openidc.canoas.ifrs.edu.br/session/end?id_token_hint=$id;&post_logout_redirect_uri=https://squadif.000webhostapp.com/oidc/logout.php'";?> class="btn btn-outline-danger my-2 my-sm-0" type="submit">LOGOUT</a>
                          <a href="direcionamento.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">VOLTAR</a>   
                      </form>
                    </div>
                  </nav>
                  <div id="config">
                  <center><h1>Agendamento no SquadIF</h1></center>
                  <center><h3>Preencha os campos, sujeitos a indeferimento</h3></center>
                </div>
                </footer>
          </div>
    
                
                <hr><br>
               


                    
        <form action="gravaAgendamento.php" method="POST"> <br>
          
          <div class="mb-3">
          <h3><label for="esporte">Escolha o esporte</label></h3>
            <fieldset>
              <?php
              
                  for($x = 0;$x<count($array_esportes);$x++){ 
                    echo "<div>";
                    echo "<input type='radio'
                     name='interest' value='$array_esportes[$x]' $check[$x]>";
                    echo "<label>$array_esportes[$x]</label>";
                  }
               
              ?>
            </fieldset>
          </div>
          <div class="mb-3">
            <label for="qtd_pessoas" class="form-label">Quantidade de pessoas</label>
            <input type="number" class="form-control" name="qtd_pessoas" value='<?php echo $qtd_pessoas;?>' required>
          </div>

          <div class="mb-3">
            <label for="nomeP" class="form-label">Digite o nome das pessoas</label>
            <textarea class="form-control" name="nomeP" style="height: 100px"><?php echo $nomeP;?></textarea>
          </div>

          <div class="mb-3">
            <label for="materiais" class="form-label">Materiais necesários</label>
            <textarea type="text" class="form-control" name="materiais"  style="height: 100px;" ><?php echo $materiais;?></textarea>
          </div>
  <br>

          <br>
          <div class="mb-3"> 
            <center><h3>Informe a data e o horário para o agendamento da quadra</h3></center>
          </div>
          <br>
          


 
          <div class="mb-3">
          <center><h3></h3></center>

           
                        
            <p>Data: <input name="data" id="data" type="date" value='<?php echo $data?>'> <input  class="btn btn-success" type="submit" formaction="funcValidaHora.php" value="Consulta horários disponives"></p>
            
            
            <table class="table">



  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Inicio</th>
      <th scope="col">Fim</th>
    </tr>
    </thead>
<?php
 

for($x = 0; $x<count($livre); $x++){
  $horaIni;
  $horaFim;
  $cod = $livre[$x];

    switch($cod){
      case 1:
        $horaIni = "8h";
        $horaFim = "9h";
        break;
        case 2:
          $horaIni = "9h";
          $horaFim = "10h";
          break;
          case 3:
            $horaIni = "10h";
            $horaFim = "11h";
            break;
            case 4:
              $horaIni = "11h";
              $horaFim = "12h";
              break;
              case 5:
                $horaIni = "12h";
                $horaFim = "13h";
                break;
                case 6:
                  $horaIni = "13h";
                  $horaFim = "14h";
                  break;
                  case 7:
                    $horaIni = "14h";
                    $horaFim = "15h";
                    break;
                    case 8:
                      $horaIni = "15h";
                      $horaFim = "16h";
                      break;
                      case 9:
                        $horaIni = "16h";
                        $horaFim = "17h";
                        break;
                        case 10:
                          $horaIni = "17h";
                          $horaFim = "18h";
                          break;
                          case 11:
                            $horaIni = "18h";
                            $horaFim = "19h";
                            break;
    }
  echo "<tr>";
    echo "<td><input type='radio' name='horario' value='$livre[$x]'></td>";
    
    echo "<td>$horaIni</td>";
    echo "<td>$horaFim</td>";
   echo "</tr>";
}
?>

</table>
<hr>
 <div class="mb-3">
          <label for="prof">Selecione o servidor responsável pelo horário</label>
    
             <select name='prof' class='form-select form-select-lg mb-3' aria-label='.form-select-lg example' style='width: 200px;'>";
               
               
              <option value="nome.sobrenome1" <?php echo $select[0];?>>Nome.sobrenome1</option>
              <option value="nome.sobrenome2" <?php echo $select[1];?>>Nome.sobrenome2</option>
              <option value="nome.sobrenome3" <?php echo $select[2];?>>Nome.sobrenome3</option> 
              <option value="nome.sobrenome4" <?php echo $select[3];?>>Nome.sobrenome4</option>
              <option value="nome.sobrenome5" <?php echo $select[4];?>>Nome.sobrenome5</option>
              <option value="nome.sobrenome6" <?php echo $select[5];?>>Nome.sobrenome6</option>
              
              </select>
              
          
          </div>
         
            <br>
          </div>
          
<div class="mb-3">
  <form action="gravaDados.php">
            <input type="hidden">
  </form>
  <input type="submit" class="btn btn-success" value="Envia">
</div>

</form>
          <br>
        </div>
      </div>
    </div>
</div>
</div>

</div>


      

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="personalizado.js"></script>
 
  
  </body>
</html>