<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>GareLiber register page</title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" href="logo.ico">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
</head>

<body>
    <script>
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById("password");
      var toggleButton = document.getElementById("toggleButton");
      
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleButton.textContent = "Сховати пароль";
      } else {
        passwordInput.type = "password";
        toggleButton.textContent = "Показати пароль";
      }
    }
  </script>

        <button style="margin-left:200px; margin-top:235px;"  id="toggleButton" onclick="togglePasswordVisibility()">Показати пароль</button>
	<form style="margin-top:-235px;" method="POST" action="">
		<label for="gmailinput" id="gmailid">введіть ваш e-mail:</label>
        <p><input type="email" id="gmailinput" placeholder="you@example.com" name="gmailinput" required></p>
        <br>
        <label for="username" id="usernamepole">Ім'я користувача:</label>
       <p> <input type="text" id="username" placeholder="Введіть ваше ім'я" name="username" required></p>
        <br>
        <label for="password">Пароль:</label>
        <p><input type="password" placeholder="Введіть пароль" id="password" name="password" required></p>
        <br>
        <button type="submit" name="register"  id="register">Зареєструватися</button>
       </form>
    




<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gmail = $_POST['gmailinput'];

    // Проверка, существует ли файл с данными пользователей
    $userDataFile = 'users.txt';
    if (!file_exists($userDataFile)) {
        fopen($userDataFile, 'w'); // Создаем файл, если он не существует
    }

    // Проверка, существует ли пользователь с таким именем
    $users = file($userDataFile, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        $userData = explode(',', $user);
        if ($userData[0] === $username) {
            echo "<h3  id='noname' align='center'>Користувач з таким ім'ям вже існує!</h3>
            <style>
#noname{
 position:fixed; 
 color: red;
  margin:-166px 200px;
   white-space:nowrap;
        }
@media screen and (max-width: 541px) {
    #noname {
        font-size: 15px;
        white-space: nowrap;
    }
}
@media screen and (max-width: 478px){
    #noname {
        white-space:normal;
    }
}
</style>
            
            
            
            <script>
    setTimeout(function(){
        var message = document.getElementById('noname');
        if (message) {
            message.style.display = 'none';
        }
    }, 3000);
</script>";
            
            exit();
        }
        else if ($userData[2] === $gmail){
echo "<h3 id='noemail' align='center'>користувач з таким імейлом вже існує!</h3> 
<style>
#noemail{
 position:fixed; 
 color: red;
  margin:-258px 200px;
   white-space:nowrap;
        }
@media screen and (max-width: 541px) {
    #noemail {
        font-size: 15px;
        white-space: nowrap;
    }
}
@media screen and (max-width: 478px){
    #noemail {
        white-space:normal;
    }
}
</style>";
echo "

<script>

    setTimeout(function(){
        var textElement = document.getElementById('noemail');
        if (textElement) {
            textElement.style.display = 'none';
        }
    }, 3000);

</script>";


            
            exit();
        }
    }

    // Добавление нового пользователя в файл
    $userLine = $username . ',' . $password . ',' . $gmail .  PHP_EOL;
    file_put_contents($userDataFile, $userLine, FILE_APPEND);
    ob_clean();
    $to = $gmail; // Адрес получателя
    $subject = 'GareLiber registration'; // Тема письма
    $message = 'Ви вдало зареєструвалися'; // Текст письма
    $headers = 'From: switkosta@gmail.com' . "\r\n" .
    'Reply-To: switkosta@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message);
    $url = '/successregister.html';
    header('Location: ' . $url);
    exit();
   
    
}
?>


</body>