<!DOCTYPE html>
<head> <link rel='icon' href='logo.ico'> </head>

<?php
echo '<title>Список користувачів</title>';
$userDataFile = 'users.txt';

// Проверка, существует ли файл с данными пользователей
if (file_exists($userDataFile)) {
    $users = file($userDataFile, FILE_IGNORE_NEW_LINES);
    
    if (!empty($users)) {
        echo "<h1>Список зареєстрованих користувачів:</h1>";
        echo "<ul>";
        foreach ($users as $user) {
            $userData = explode(',', $user);
            $username = $userData[0];
            echo "<li><h3>$username</h3></li>";
        }
        echo "</ul>";
    } else {
        echo "<  h1 align='center'>Немає зареєстрованих користувачів</h1>";
        echo  "<h2 align='center'><p id='hrefik'><a href='https://gareliber.talk4fun.net'>Повернутися до головної сторінки</a></p></h2>";
    }
} else {
    echo "<h1 align='center'>файла з даними не існує</h1>";
    echo "<h2 align='center'><p><a  href='https://gareliber.talk4fun.net'>Повернутися до головної сторінки</a></p></h2>";
}
?>
