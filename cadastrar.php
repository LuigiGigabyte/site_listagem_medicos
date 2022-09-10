<?php
include_once('config.php');
require_once('style.php');
$texto = "";
$select_esp = "SELECT * FROM especialidade";
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     $texto = verificarCampos();
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="multiselect.css" rel="stylesheet">
    <title>Cadastrar Dados</title>
</head>

<body>
    <div class="container bg-dark">
        
        <form method="post" action="incluir.php" class="row g-3">
            <div class="col-md-6">
                <input type="text" placeholder="Nome" name="nome" value="" class="form-control" required>

            </div>
            <div class="col-md-3">
                <input type="text" placeholder="CRM" name="crm" value="" class="form-control" required>
            </div>
            <div class="col-md-3">
                <input type="text" placeholder="Telefone" name="telefone" value="" class="form-control" required>
            </div>
            <div class="col-md-9">
                <select id="colors" class="form-select" name="especialidade[]" required multiple>
                    <?php
                    $conEsp = $conexao->query($select_esp);
                    while ($lista_esp = mysqli_fetch_assoc($conEsp)) {
                        echo "<option value ='" . $lista_esp['id'] . "'>" . $lista_esp['especialidade'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3 text-white h3">Pressione CTRL para selecionar mais de uma especialidade</div>
            <div class="col-md-1">
                <input value="Cadastrar" name="button" type="submit" class="btn btn-info">
            </div>



        </form>

    </div>
    <div class="container col-2">
        <a href="index.php">
            <button class="btn btn-info">
                Voltar para página inicial
            </button>
        </a>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<script type="text/javascript">
    // $(document).ready(function() {
    //     $('#colors').multiselect();
    // });
</script>

</html>