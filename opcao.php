<?PHP
session_start();
require_once 'funcao.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Menu da empresa</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='' rel='stylesheet'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <style>body {
        background-image: url('images/bg-01.jpg');
        }

.list-group {
    width: 400px !important
}

.list-group-item {
    margin-top: 10px;
    border-radius: none;
    background: url('images/bg-01.jpg');
    cursor: pointer;
    transition: all 0.3s ease-in-out
}

.list-group-item:hover {
    transform: scaleX(1.1)
}

.check {
    opacity: 0;
    transition: all 0.6s ease-in-out
}

.list-group-item:hover .check {
    opacity: 1
}

.about span {
    font-size: 12px;
    margin-right: 10px
}

input[type=checkbox] {
    position: relative;
    cursor: pointer
}

input[type=checkbox]:before {
    content: "";
    display: block;
    position: absolute;
    width: 20px;
    height: 20px;
    top: 0px;
    left: 0;
    border: 1px solid #10a3f9;
    border-radius: 3px;
    background-color: purple
}

.formCad{
  text-align: center;
  margin-left: 400px;
  margin-right: 400px;
  color: white;
}

.titulo{
    background-color: white;
    color: #428df5;
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

input[type=checkbox]:checked:after {
    content: "";
    display: block;
    width: 7px;
    height: 12px;
    border: solid #007bff;
    border-width: 0 2px 2px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    position: absolute;
    top: 2px;
    left: 6px
}


input[type="checkbox"]:checked+.check {
    opacity: 1
}</style>
    </head>
    <body oncontextmenu='return false' class='snippet-body'>
    <div class="titulo">
        <h3>Gerenciamento de funcionários</h3>
    </div>
    <br><br>
        <div class="formCad">
        <form action="" method="post">
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example1">Nome do funcionário:</label>
                <input type="text" id="nome" class="form-control" name="nome"/>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example1">Cidade do funcionário:</label>
                <input type="text" id="cidade" class="form-control" name="cidade"/>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example1">Salário por hora do funcionário:</label>
                <input type="number" id="salHora" class="form-control" name="salHora"/>
            </div>
            <div class="form-outline mb-4">            
                <label class="form-label" for="form6Example1">Horas trabalhadas pelo funcionário:</label>
                <input type="number" id="horasTrab" class="form-control" name="horasTrab"/>
            </div>
            <div class="form-outline mb-4">            
                <label class="form-label" for="form6Example1">Aumento:</label>
                <input type="number" id="aumento" class="form-control" name="aumento"/>
            </div>
            <div>
                <div>
                    <select method="post" name="funcao" id="funcao" class="btn btn-primary btn-block list-group-item d-flex align-content-center">
                    <option value="1" name="calcSal" id="calcSal">Calcular Salário</option>
                    <option value="2" name="aumento" id="aumento">Dar aumento</option>
                    <option value="3" name="mostrarDados" id="mostrarDados">Mostrar os dados</option>
                    <option value="4" name="sair" id="sair">Sair</option>
                    </select><br/>
                </div>    
            </div>
            <button type="submit" class="btn btn-primary btn-block list-group-item d-flex justify-content-between align-content-center" name="btnCadastrar" id="btnCadastrar" >Cadastrar</button>
            <button type="submit" class="btn btn-primary btn-block list-group-item d-flex justify-content-between align-content-center" name="sair" id="sair" >Sair</button>
                
        </form>
    </div>
    
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src=''></script>
    <script type='text/Javascript'></script>
    </body>
</html>
<?php
$funcionario1 = new Funcionario();
if(isset($_POST['btnCadastrar'])){
    $funcionario1->setNome($_POST['nome']);
    $funcionario1->setCidade($_POST['cidade']);
    $funcionario1->setSalHora($_POST['salHora']);
    $funcionario1->setHorasTrab($_POST['horasTrab']);
    $funcionario1->setSalarioFinal(($funcionario1->getHorasTrab()*$funcionario1->getSalHora())* 30); 
    // $funcionario1->$aumento($_POST['aumento']);
    switch($_POST['funcao']){
    
    case 1:
        echo $funcionario1->getSalarioFinal();
        break;
    case 2:
        echo $funcionario1->getSalarioFinal() + $_POST['aumento'];
        break;
    case 3:
        $funcionario1->mostrarDados();
        break;
    }
}

elseif(isset($_POST['sair'])){
    header('location: index.php');
}
?>