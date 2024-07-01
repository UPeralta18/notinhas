<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notinhas!</title>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <button id="save" class="save">Salvar!</button>
    <div id="editor-container">
        <?php
        $uri = explode("/", $_SERVER['REQUEST_URI']);

        foreach ($uri as $parts) {
            if ($parts != '' && $parts != 'notinhas') {
                $fileNameArray[] = $parts;
            }
        }
        $fileName = $_SERVER['DOCUMENT_ROOT'] . "/notinhas/files/" . implode('-', $fileNameArray) . ".txt";

        if (file_exists($fileName)) {
            $content = file_get_contents($fileName);
            echo $content;
        } else {
            fopen($fileName, 'w');
        }

        ?>
    </div>
    <input type="hidden" value="<?= $fileName ?>" id="filename" name="filename" />

    <footer>
        <script src="scripts/main.js"></script>
        <link href="styles/normalize.css" rel="stylesheet">
        <link href="styles/main.css" rel="stylesheet">
    </footer>
</body>

</html>