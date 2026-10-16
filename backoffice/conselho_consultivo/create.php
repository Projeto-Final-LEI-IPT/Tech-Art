<?php
require "../verifica.php";
require "../config/basedados.php";
//Se o utilizador não é um administrado
if ($_SESSION["autenticado"] != "administrador") {
    //não tem permissão para criar um novo investigador
    header("Location: index.php");
    exit;
}
//$filesDir = "../assets/conselho_consultivo/";
$filesDir = "C:\\HostingSpaces\\juvenalpaulino\\techneart.ipt.pt_JNfbKjaR\\data\\techneart\\assets\\conselho_consultivo\\";
// Se o diretório não existir, cria a pasta
if (!file_exists($filesDir)) {
    mkdir($filesDir, 0777, true);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
         // Definir um nome único para a imagem
        $target_file = uniqid() . '_' . basename($_FILES["fotografia"]["name"]);

         // Mover a imagem para a pasta
        if (!move_uploaded_file($_FILES["fotografia"]["tmp_name"], $filesDir . $target_file)) {
            die("Erro ao mover o arquivo de imagem. Verifique as permissões da pasta.");
        }
        
        $sql = "INSERT INTO conselho_consultivo (nome, sobre, sobre_en, fotografia) " .
            "VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ssss', $nome, $sobre,$sobre_en,$fotografia);
        $nome = $_POST["nome"];
        $sobre = $_POST["sobre"];
        $sobre_en = $_POST["sobre_en"];
        $fotografia = $target_file; 


        if (mysqli_stmt_execute($stmt)) {
            header('Location: index.php');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
} 
?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</link>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<script type="text/javascript">
    function previewImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
                $('#preview').show();
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('#preview').attr('src', '');
            $('#preview').hide();
        }
    }
</script>
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

    textarea {
        min-height: 100px;
    }
</style>

<div class="container-xl mt-5">
    <div class="card">
        <h5 class="card-header text-center">Adicionar Elemento no Conselho Consultivo</h5>
        <div class="card-body">
            <form role="form" data-toggle="validator" action="create.php" method="post" enctype="multipart/form-data">


                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" minlength="1" required maxlength="100" name="nome" class="form-control" data-error="Por favor introduza um nome válido" id="inputName" placeholder="Nome">
                    <!-- Error -->
                    <div class="help-block with-errors"></div>
                </div>

    
                <div class="row removeExterno">
                    <div class="col halfCol removeExterno">
                        <div class="form-group">
                            <label>Sobre</label>
                            <textarea type="text" minlength="1" required data-error="Por favor introduza uma descrição sobre si" class="form-control" id="inputSobre" placeholder="Sobre" name="sobre"></textarea>
                            <!-- Error -->
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
  

                    <div class="col halfCol removeExterno">
                        <div class="form-group">
                            <label>Sobre (Inglês)</label>
                            <textarea type="text" minlength="1" required data-error="Por favor introduza uma descrição sobre si" class="form-control" id="inputSobre_en" placeholder="Sobre" name="sobre_en"></textarea>
                            <!-- Error -->
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="form-group">
                    <label>Fotografia</label>
                    <input type="file" accept="image/*" onchange="previewImg(this);" minlength="1" maxlength="100" required data-error="Por favor adicione uma fotografia válida" class="form-control" id="inputFotografia" placeholder="Fotografia" name="fotografia">
                    <!-- Error -->
                    <div class="help-block with-errors"></div>
                </div>
                <img id="preview" style="display: none;" width='100px' height='100px' class="mb-3" />

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