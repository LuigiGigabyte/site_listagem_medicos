<?php
include_once('config.php');
require_once('style.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Listagem Médicos</title>
</head>

<body>
    
    <div class="box-search">
    <a href="cadastrar.php">
        <button type="button" class="btn btn-info">Cadastrar médico</button>
    </a>    
        <input type="search" class="form-control w-25" placeholder="Pesquisar nome do médico" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary search-button">
            <svg id="search-icon" class="search-icon" viewBox="0 0 24 24">
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                <path d="M0 0h24v24H0z" fill="none" />
            </svg>
        </button>
    </div>
    <div class="">
        <table class="table table-dark table-striped-columns">
            <thead>
                <tr>
                    <th scope="col" class="table-info">Nome</th>
                    <th scope="col" class="table-info">CRM</th>
                    <th scope="col" class="table-info">Telefone</th>
                    <th scope="col" class="table-info">Especialidade</th>
                    <th scope="col" colspan="2" class="table-info" style="text-align:center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($medico = mysqli_fetch_assoc($result)) {

                    $select_esp = "SELECT especialidade.especialidade FROM medico as m INNER JOIN med_esp ON med_esp.id_med =
                    m.id INNER JOIN especialidade ON especialidade.id = med_esp.id_esp WHERE m.id =  {$medico['id']}";
                    $result2 = $conexao->query($select_esp);

                    echo "<tr>";
                    echo "<td class='table-dark'>" . $medico['nome'] . "</td>";
                    echo "<td class='table-dark'>" . $medico['crm'] . "</td>";
                    echo "<td class='table-dark'>" . $medico['telefone'] . "</td>";
                    echo "<td class='table-dark'>";
                    $string = "";
                    while ($especialidade = mysqli_fetch_assoc($result2)) {
                        $string = $string . $especialidade['especialidade'] . ", ";
                    }
                    echo substr($string, 0, -2);
                    echo "<td class='table-dark'  style='text-align:center'>
                        <a href='alterar.php?id=$medico[id]'>
                            <input class='btn btn-primary' type='button' value='Alterar'> 
                        </a> 
                    </td>";
                    echo "<td class='table-dark' style='text-align:center'>
                        <a href='delete.php?id=$medico[id]'>
                            <input class='btn btn-primary' type='button' value='Excluir'>
                        </a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event){
        if(event.key === "Enter"){
            searchData();
        }
    });
    
    function searchData() {
        window.location = 'index.php?search=' + search.value;
    }
</script>

</html>