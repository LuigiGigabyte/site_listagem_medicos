<?php

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'medicos';
    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    if(!empty ($_GET['search'])){
        $data = $_GET['search'];

        $sqlMed = "SELECT * FROM medico WHERE nome LIKE '%$data%'";
    }
    else{
        $sqlMed = "SELECT * FROM medico";
    }
    $result = $conexao->query($sqlMed);

    function verificarCampos()
    {
        if (empty($_POST['nome'])) {
            return "Um nome é necessário";
        } else if (empty($_POST['crm'])) {
            return "Um CRM é necessário";
        } else if (empty($_POST['telefone'])) {
            return "um telefone é necessário";
        } else if (testarEspecialidade() < 2) {
            return "mais de uma especialidade necessária";
        }
        return "";
        
    }
    function testarEspecialidade()
    {
        if (empty($_POST['especialidade'])) {
            return 0;
        } else {
            $especialidades = $_POST['especialidade'];
            $i = 0;
            foreach ($especialidades as $especialidade) {
                $i += 1;
            }
            return $i;
        }
    }