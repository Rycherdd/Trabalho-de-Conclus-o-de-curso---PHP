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
    }
    #bloco{
        margin-top: 10%;
    }
    
    body{
        background-color: white;
  
    }
    #bloco{
        margin-top: 10%;
    }
    </style>
  </head>

<body>
  
<?php
session_start();
include "conexao.php";
$id = $_SESSION['id_token'];
?>
    <div id="bloco">
<center><img class="shadow-lg p-3 mb-5 bg-white rounded" src="download.png" alt="Logo IFRS"></center>
</div>
<div id="box">
<a href="voluntario.php" type="button" class="btn btn-outline-success">Solicitações para supervisão</a>
<a href= "descricao_voluntario.php" type="button" class="btn btn-outline-success">Visualizar histórico de agendamentos<a>
<a <?php echo "href='https://demo-openidc.canoas.ifrs.edu.br/session/end?id_token_hint=$id;&post_logout_redirect_uri=https://squadif.000webhostapp.com/oidc/logout.php'";?> class="btn btn-outline-success" type="submit">LOGOUT</a>
</div>



<script src="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="personalizado.js"></script>
 
  
  </body>
</html>
