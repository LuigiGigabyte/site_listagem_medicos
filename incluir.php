<?php
include_once('config.php');
$nome = $_POST['nome'];
$crm = $_POST['crm'];
$telefone = $_POST['telefone'];
$especialidades = $_POST['especialidade'];
    if(verificarCampos() == ""){
        $sqlInsertMed = "INSERT INTO medico (nome,crm,telefone) VALUES ('$nome','$crm','$telefone')";
        $conexao->query($sqlInsertMed);
        $sqlSelect = "SELECT id FROM medico WHERE crm = '$crm'";
        $idMed = $conexao->query($sqlSelect);
        foreach (mysqli_fetch_assoc($idMed) as $id) {
            foreach ($especialidades as $especialidade) {

                $sqlInsert = "INSERT INTO med_esp (id_med,id_esp) VALUES ('$id',$especialidade)";
                $conexao->query($sqlInsert);
            }
        }
        header('Location:index.php');  
    }
    else{
        header('Location:cadastrar.php');  

    }
?>