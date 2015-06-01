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
            
            .form {
                
                margin: 0 auto;
                width: 250px;
                border: 1px solid black;
                text-align: center;
                padding 5px;
            }
        </style>
        <link href="/favicon.jpg" rel="shortcut icon"  type="image/jpg" />
    </head>
    <body>
        <div>
        <form method="post">
            <div class="form">
                <p><input type="text" name="login" value="" /></p>
                <p><input type="password" name="password" value="" maxlength="10" /></p>
                <p><button type="submit">Войти</button></p>
                <?php if(!empty($login) || !empty($pass)):?>
                <div class="error">
                    <p>Такого пользователя нет</p>
                </div>
                <?php endif ?>
            </div>
        </form>
        </div>
    </body>
</html>