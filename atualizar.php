<?php
include_once('config.php');
$nome = $_POST['nome'];
$crm = $_POST['crm'];
$telefone = $_POST['telefone'];
$especialidades = $_POST['especialidade'];
$id = $_GET['id'];
$sql = "SELECT *  FROM medico WHERE id=$id";
$result = $conexao->query($sql);


$UpdateMed = "UPDATE medico SET nome = '$nome', crm = '$crm', telefone = '$telefone' WHERE id=$id";
$conexao->query($UpdateMed);
$sqlDelete = "DELETE FROM med_esp WHERE id_med=$id";
$conexao->query($sqlDelete);
foreach ($especialidades as $especialidade) {
    if (verificarCampos() == "") {
        $sqlInsert = "INSERT INTO med_esp (id_med,id_esp) VALUES ('$id',$especialidade)";
        $conexao->query($sqlInsert);
        header('Location:index.php');
    } else {
        header('Location:alterar.php?id='. $id);
    }
}
