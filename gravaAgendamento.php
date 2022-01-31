<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css"/>
    <script src="https://code.jquery.com/jquery-1.8.2.js"></script>
    
    <title>Cadastro</title>
  <body>
      <div class='container'>
   
            <?php
            include "conexao.php";
            session_start();
            $nomeAluno = $_SESSION['nome_user'];
            $esporte = $_POST['interest'];
            $qtd_pessoas = $_POST['qtd_pessoas'];
            $nomeP = $_POST['nomeP'];
            $materiais = $_POST['materiais'];
            $prof = $_POST['prof'];
            $data = $_POST['data']; 
            $horario = $_POST['horario'];

 
              
        $sql = "INSERT INTO `agendamento`(`esporte`,`qtd_pessoas`,`nomeP`,`materiais`,`prof`,`data`,`hora`,`nomeAluno`,`statusVoluntario`) 
                  
        VALUES ('$esporte','$qtd_pessoas','$nomeP','$materiais','$prof','$data', '$horario','$nomeAluno',0)";

    
      if(mysqli_query($conn, $sql)){
       echo "<div class='alert alert-success'>";
        echo "<h4 class='alert-heading'>Agendamento cadastrado com sucesso!</h4>";
        echo "<p>Muito obrigado por ter utilizado o SquadIF.</p>";
         
      echo "</div>";
        
      }else{
        echo "<div class='alert alert-danger'>";
        echo "<h4 class='alert-heading'>Problemas com agendamento!</h4>";
        echo "<p>Muito obrigado por ter utilizado o SquadIF.</p>";
        echo "</div>";
        //echo "<p>Erro: ".mysqli_error($conn)."</p>";
        //echo "$sql";
        //TRY CATCH - mysqli_errno($con); 
		//exit();
      }
    

            ?>
            <a href="Ini.php" class="btn btn-primary">Voltar</a>
         
      </div>
    

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>