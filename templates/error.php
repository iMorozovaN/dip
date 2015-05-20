<!DOCTYPE html>
<html lang="ru-RU" class="pp-page">
    <head>
        <title>Create User</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <style>
            .error {
                width: 100%; 
                text-align: center; 
                border: 1px solid red; 
                background-color: rgba(255,0,0,0.3); 
                color: black;
                text-shadow: 1px 1px 1px red;
            }
        </style>
    </head>
    <body>
    <div class="error">
        <h2><?= $msg ?>(<?= $code ?>)</h2>
    </div>
    </body>
</html>
