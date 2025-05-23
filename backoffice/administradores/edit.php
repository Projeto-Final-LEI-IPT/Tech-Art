<?php
require "../verifica.php";
require "../config/basedados.php";
require "bloqueador.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "update administradores set " .
        "nome = ?, email = ? " .
        "where  id  = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssi', $nome, $email, $id);
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    if (mysqli_stmt_execute($stmt)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . $sql . mysqli_error($conn);
    }
} else {

    $sql = "select nome, email from administradores " .
        "where id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    $id = $_GET["id"];

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $nome = $row["nome"];
    $email = $row["email"];
}


?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</link>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<style>
    .container {
        max-width: 550px;
    }

    .has-error label,
    .has-error input,
    .has-error textarea {
        color: red;
        border-color: red;
    }

    .list-unstyled li {
        font-size: 13px;
        padding: 4px 0 0;
        color: red;
    }
</style>

<div class="container-xl mt-5">
    <div class="card">
        <h5 class="card-header text-center">Editar Administrador</h5>
        <div class="card-body">
            <form role="form" data-toggle="validator" action="edit.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value=<?php echo $id; ?>>
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" minlength="1" required maxlength="255" required name="nome" class="form-control" data-error="Introduza um nome válido" id="inputName" placeholder="Nome" value="<?php echo $nome; ?>">
                    <!-- Error -->
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" minlength="1" required maxlength="100" required class="form-control" id="inputEmail" placeholder="Email" name="email" value="<?php echo $email; ?>">
                    <!-- Error -->
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Gravar</button>
                </div>

                <div class="form-group">
                    <button type="button" onclick="window.location.href = 'index.php'" class="btn btn-danger btn-block">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
mysqli_close($conn);
?>