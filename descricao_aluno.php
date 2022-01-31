<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="descAluno.css">  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css"/>
    <script src="https://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="https://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
    <title>Agendamento</title>
    
    <style>
    body{
        background-color: white;
        color: black;
    }
    #men{
        margin-left: 90%;
    }
 
</style>
    
  </head>
  <?php
session_start();
include "conexao.php";
$nomeAluno;
$cont = 0;
$contEsp = 0;
$contInd = 0;
$contDef = 0;
$id = $_SESSION['id_token'];

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
          if($status == 1 || $status == 2){
            $idAgendamentoDef[$contDef] = $linha['id_agendamento'];
            $contDef++;
          }
      }
      
    }while($linha = mysqli_fetch_assoc($resultado));
  }
  ?>
  <body>

  <form id="men">
                        <a <?php echo "href='https://demo-openidc.canoas.ifrs.edu.br/session/end?id_token_hint=$id;&post_logout_redirect_uri=https://squadif.000webhostapp.com/oidc/logout.php'";?> class="btn btn-outline-danger my-2 my-sm-0" type="submit">LOGOUT</a>
                            <a href="direcionamento.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">VOLTAR</a>   
                               <hr style="width: 95%;">
                        </form>
                     <br>
  <table class="table">



<thead style="color:black;">
  <tr>
    <th scope="col">ID Agendamento</th>
    <th scope="col">Status</th>
    <th scope="col">Detalhes</th>

  </tr>


  <?php
    for($x=0;$x<$contEsp;$x++){
        echo "<tr>";
        echo "<td> <a>$idAgendamentoEsp[$x]</a></td>";
        echo "<td>Em espera de analise</td>";
        echo "<td> <a href='descricao_info_A.php?id=$idAgendamentoEsp[$x]'>Clique aqui</a></td>";
    echo "</tr>";
  }

  for($x=0;$x<$contInd;$x++){
    echo "<tr>";
    echo "<td> <a>$idAgendamentoInd[$x]</a></td>";
    echo "<td>Agendamento indeferido</td>";
    echo "<td> <a href='descricao_info_A.php?id=$idAgendamentoInd[$x]'>Clique aqui</a></td>";
echo "</tr>";
  }

  for($x=0;$x<$contDef;$x++){
    echo "<tr>";
    echo "<td> <a>$idAgendamentoDef[$x]</a></td>";
    echo "<td>Agendamento defererido</td>";
    echo "<td> <a href='descricao_info_A.php?id=$idAgendamentoDef[$x]'>Clique aqui</a></td>";
echo "</tr>";
  }
  ?>
  </thead>








  
<script src="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="personalizado.js"></script>
 
  
  </body>
</html>
