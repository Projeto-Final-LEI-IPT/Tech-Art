<?php
require "../verifica.php";
require "../config/basedados.php";
require "bloqueador.php";

$id = '';
$titulo = '';
$conteudo = '';
$imagem = '';
$visivel = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $conteudo = $_POST["conteudo"];
    $titulo = $_POST["titulo"];
    $visivel = isset($_POST["visivel"]) ? 1 : 0;

    //Se foi selecionada uma nova imagem, guardar na pasta dos assets
    if ($_FILES["imagem"]["size"] != 0) {
        $uploadImg = "../assets/oportunidades/";
        if (!is_dir($uploadImg)) {
            mkdir($uploadImg, 0777, true);
        }
        $fileName =  uniqid() . '_' . $_FILES["imagem"]["name"];

        move_uploaded_file($_FILES["imagem"]["tmp_name"], $uploadImg . $fileName);

        $sql = "UPDATE oportunidades SET titulo = ?, conteudo = ?, imagem = ?, visivel = ? WHERE id  = ?";
        $stmt = mysqli_prepare($conn, $sql);
        $imagem = $fileName;
        mysqli_stmt_bind_param($stmt, 'sssii', $titulo, $conteudo, $imagem, $visivel, $id);
    } else {
        $sql = "UPDATE oportunidades SET titulo = ?, conteudo = ?, visivel = ? WHERE id  = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ssii', $titulo, $conteudo, $visivel, $id);
    }

    if (mysqli_stmt_execute($stmt)) {
        $filesDir = "../assets/oportunidades/ficheiros_$id/";
        if (!is_dir($filesDir)) {
            mkdir($filesDir, 0777, true);
        }
        $folderFiles = scandir($filesDir);
        $folderFiles = array_diff($folderFiles, array('.', '..'));
        if(isset($_POST['selectedFiles']))
            $selectedFiles = $_POST['selectedFiles'];
        else{
            $selectedFiles = [];
        }
        // Apaga ficheiros da pasta não selecionados
        foreach ($folderFiles as $file) {
            if (!in_array($file, $selectedFiles)) {
                unlink($filesDir . '/' . $file);
            }
        }

        // Upload and move the inserted files to the folder
        if (isset($_FILES['ficheiros']) && !empty($_FILES['ficheiros']['name'][0])) {
            $fileCount = count($_FILES['ficheiros']['name']);

            for ($i = 0; $i < $fileCount; $i++) {
                $tmpFilePath = $_FILES['ficheiros']['tmp_name'][$i];
                $newFilePath = $filesDir . '/' . $_FILES['ficheiros']['name'][$i];

                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $selectedFiles[] = $_FILES['ficheiros']['name'][$i];
                    header('Location: index.php');
                } else {
                    echo    "<script>
                        alert('Um erro ocurreu a inserir os ficheiros " . $_FILES["ficheiros"]["error"][$i] . "');
                        window.location.href = 'edit.php?id=" . $id . "';
                        </script>";
                }
            }
        } else {
            header('Location: index.php');
        }
    } else {
        echo "Error: " . $sql . mysqli_error($conn);
    }
} else {


    if (isset($_GET["id"])) {

        //Se o request não for um post, selecionar os dados da base de dados para mostrar 
        $sql = "SELECT titulo, conteudo, imagem,visivel FROM oportunidades WHERE id = ?";
        $id = $_GET["id"];
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $titulo = $row["titulo"];
        $conteudo = $row["conteudo"];
        $imagem = $row["imagem"];
        $visivel = $row["visivel"] ? "checked" : "";
        $filesDir = "../assets/oportunidades/ficheiros_$id/";
        $files = [];
        if (is_dir($filesDir)) {
            $files = scandir($filesDir);
            $files = array_diff($files, array('.', '..'));
        }
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
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('#preview').attr('src', "../assets/oportunidades/" + '<?= $imagem ?>');
        }
    }

    function showFileName(input) {
        var fileListDiv = $('#fileList');
        fileListDiv.empty();

        var selectedFiles = input.files;
        if (selectedFiles.length > 0) {
            var fileNames = Array.from(selectedFiles).map(function(file) {
                return file.name;
            });


            fileNames.forEach(function(fileName) {
                var paragraph = '<li class="list-group-item">' + fileName + '<br>' + '</li>'
                fileListDiv.append(paragraph);
            });
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

    .ck-editor__editable {
        min-height: 200px;
    }
</style>

<div class="container-xl mt-5">
    <div class="card">
        <h5 class="card-header text-center">Editar Oportunidade</h5>
        <div class="card-body">
            <form role="form" data-toggle="validator" action="edit.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value=<?php echo $id; ?>>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="visivel" name="visivel" <?= $visivel ?>>
                        <label class="form-check-label" for="visivel">
                            Visível
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Título</label>
                    <input type="text" minlength="1" required maxlength="100" required name="titulo" class="form-control" data-error="Por favor adicione um título válido" id="inputTitle" placeholder="Título" value="<?php echo $titulo; ?>">
                    <!-- Error -->
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label>Conteúdo da oportunidade</label>
                    <textarea class="form-control" minlength="1" required cols="30" rows="5" data-error="Por favor adicione o conteudo da oportunidade" id="inputContent" name="conteudo"><?php echo $conteudo; ?></textarea>
                    <!-- Error -->
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label>Imagem</label>
                    <input accept="image/*" type="file" class="form-control" id="inputImage" name="imagem" onchange="previewImg(this);" value="<?php echo $imagem; ?>">
                    <!-- Error -->
                    <div class="help-block with-errors"></div>
                </div>
                <img id="preview" src="<?php echo "../assets/oportunidades/" . $imagem; ?>" width='100px' height='100px' class="mb-2" />

                <div class="form-group">
                    <label>Adicionar Ficheiros</label>

                    <input type="file" onchange="showFileName(this)" multiple class="form-control" id="ficheiros" name="ficheiros[]">
                    <!-- Error -->
                    <div class="help-block with-errors"></div>
                    <ul id="fileList" class="mb-3 list-group" style="font-size: 14px;"></ul>

                </div>

                Ficheiros atuais:
                <p style="font-size: 14px;" class="mb-1">Os ficheiros não selecionados serão eliminados permanentemente</p>
                <div id="conflictMessage" style="color: red; display:none; font-size: 14px;">AVISO - Existem ficheiros que vão ser substituidos pelos ficheiros adicionados</div> <!-- Conflict Message -->

                <div id="folderFilesList" class="mb-3 pl-4">
                    <?php
                    // Display the list of files in the folder with checkboxes
                    foreach ($files as $file) {
                        echo '
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="selectedFiles[]" value="' . $file . '" checked id="' . $file . '">
                                <label class="form-check-label" for="' . $file . '">
                                    <a href="' . $filesDir . '/' . $file . '" target="_blank">' . $file . '</a>
                                </label>
                            </div>
                            ';
                    }
                    ?>
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

<!--Criar o CKEditor 5-->
<script src="../ckeditor5/build/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#inputContent'), {
            licenseKey: '',
            simpleUpload: {
                uploadUrl: '../ckeditor5/upload_image.php'
            }
        })
        .then(editor => {
            window.editor = editor;
        })

    <?php require "../../tecnart/config/configurations.php"; ?>
    $("#ficheiros").on("change", function(e) {
        var totalSize = 0;
        var files = e.currentTarget.files;
        valid = true;
        var filesize = 0;
        for (let i = 0; i < files.length; i++) {
            filesize = ((files[i].size / 1024) / 1024);
            totalSize += filesize;

            if (filesize > <?= MAX_FILE_SIZE ?>) {
                valid = false;
                e.currentTarget.setCustomValidity('O tamanho do ficheiro "' + files[i].name + '" é maior que o máximo de <?= MAX_FILE_SIZE ?>MB');
            } else if (totalSize > <?= MAX_FILES_TOTAL ?>) {
                valid = false;
                e.currentTarget.setCustomValidity('Tamanho total de todos os ficheiros é maior  que o máximo de  <?= MAX_FILES_TOTAL ?>MB')
            }
        }
        if (valid) {
            e.currentTarget.setCustomValidity('');
        }
        var selectedFiles = Array.from(this.files);
        var checkboxes = document.querySelectorAll('input[name="selectedFiles[]"]');
        var conflictMessage = document.getElementById('conflictMessage');
        var hasConflicts = false;

        checkboxes.forEach(function(checkbox) {
            var checkboxValue = checkbox.value;
            var matchingFile = selectedFiles.find(function(file) {
                return file.name === checkboxValue;
            });

            if (matchingFile) {
                checkbox.nextElementSibling.querySelector('a').style.color = 'red';
                if (!checkbox.dataset.initialState) {
                    checkbox.dataset.initialState = checkbox.checked;
                }
                checkbox.disabled = true;
                checkbox.checked = false;
                hasConflicts = true;
            } else {
                checkbox.nextElementSibling.querySelector('a').style.color = '';
                if (checkbox.dataset.initialState !== undefined) {
                    checkbox.checked = checkbox.dataset.initialState === 'true';
                    delete checkbox.dataset.initialState;
                }
                checkbox.disabled = false;
            }
        });

        if (hasConflicts) {
            conflictMessage.style.display = 'block';
        } else {
            conflictMessage.style.display = 'none';
        }

    });
</script>

<?php
mysqli_close($conn);
?>