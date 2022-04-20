<?php
require_once('funcao.php');

if(isset($_POST['calcSal'])){
        echo "Total de horas trabalhadas: ".$horasTrab."<br>x<br>Salário por hora: ".$salHora."<br>x<br>30";
        $funcionario1->calcularSalario();
    }
