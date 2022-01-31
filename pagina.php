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
                    <a class="navbar-brand" href="index.php">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="#">Em espera de aprovação<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">indeferimentos</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Seus agendamentos
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Agendamento 1</a>
                            <a class="dropdown-item" href="#">Aagendamento 2</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Demais agendamentos</a>
                          </div>
                        </li>
                      </ul>
                      <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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
               


                    
        <form action="cadastro_script.php" method="POST"> <br>
          
          <div class="mb-3">
            <fieldset>
              <legend>Escolha o esporte</legend>
              <div>
                <input type="radio" id="volei" name="interest" value="volei" checked>
                <label for="volei">Vôlei</label>
              </div>
              <div>
                <input type="radio" id="fut" name="interest" value="fut">
                <label for="fut">Futebol</label>
              </div>
              <div>
                <input type="radio" id="hand" name="interest" value="hand">
                <label for="hand">Handebol</label>
              </div>
              <div>
                <input type="radio" id="bask" name="interest" value="bask">
                <label for="bask">Basquete</label>
              </div>
              
              <div>
                <input type="radio" id="dms_atv" name="interest" value="dms_atv">
                <label for="bask">Demais atividades</label>
              </div>
              
            </fieldset>
          </div>
          <div class="mb-3">
            <label for="qtd_pessoas" class="form-label">Quantidade de pessoas</label>
            <input type="number" class="form-control" name="qtd_pessoas" required>
          </div>

          <div class="mb-3">
            <label for="nomeP" class="form-label">Digite o nome das pessoas</label>
            <textarea class="form-control" name="nomeP"  style="height: 100px;"></textarea>
          </div>

          <div class="mb-3">
            <label for="materiais" class="form-label">Materiais necesários</label>
            <textarea class="form-control" name="materiais"  style="height: 100px;"></textarea>
          </div>
  <br>

          <div class="mb-3">
          <label for="prof">Selecione o servidor responsável pelo horário</label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" style="width: 200px;">
              <option value="romir">Romir</option>
              <option value="leila">Leila</option>
              <option value="glaucia">Glaucia</option>
              <option value="marcelo">Marcelo</option>
              <option value="matheus">Matheus</option>
              <option value="igor">Igor</option>
              <option value="sandra">Sandra</option>
              <option value="sandro">Sandro</option>
              <option value="bruno">Bruno</option>
            </select>
          </div>
          <hr>
          <br>
          <div class="mb-3">
            <center><h3>Informe a data que deseja agendar o horário: </h3></center>
          </div>
          <br>


          <div class="month">
            <ul>
              <li class="prev">&#10094;</li>
              <li class="next">&#10095;</li>
              <li>August<br><span style="font-size:18px">2021</span></li>
            </ul>
          </div>
          
          <ul class="weekdays">
            <li>Mo</li>
            <li>Tu</li>
            <li>We</li>
            <li>Th</li>
            <li>Fr</li>
            <li>Sa</li>
            <li>Su</li>
          </ul>
          
          <ul class="days">
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
            <li>5</li>
            <li>6</li>
            <li>7</li>
            <li>8</li>
            <li>9</li>
            <li><span class="active">10</span></li>
            <li>11</li>
            <li>12</li>
            <li>13</li>
            <li>14</li>
            <li>15</li>
            <li>16</li>
            <li>17</li>
            <li>18</li>
            <li>19</li>
            <li>20</li>
            <li>21</li>
            <li>22</li>
            <li>23</li>
            <li>24</li>
            <li>25</li>
            <li>26</li>
            <li>27</li>
            <li>28</li>
            <li>29</li>
            <li>30</li>
          </ul>
<br>

<div class="mb-3">
  <input type="submit" class="btn btn-success">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </body>
</html>