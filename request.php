<?php
extract($_GET);
include('./config.php');
$date = str_replace(" ", "+", $date);
$filename = $login . "+" . $date . ".json";
$path_pre_query = $pre_query_folder . $filename;
$path_query = $query_folder . $filename;
if (file_exists($path_pre_query)) {
    rename($path_pre_query, $path_query);
    ?>
    <html style="width: 100%">
    <head>
        <title>Підтверджено</title>
    </head>
    <body style="width: 600px; margin: 50px auto; font-size: 16px;">
    Дякуємо за підтвердження реєстрації. Чекайте на лист адміністратора з подальшими інструкціями.
    </body>
    </html>
<?php } else if (file_exists($path_query)) { ?>
	<html style="width: 100%">
    <head>
        <title>Підтверджено</title>
    </head>
    <body style="width: 600px; margin: 50px auto; font-size: 16px;">
    Ваш профіль вже підтверджено. Чекайте, будь-ласка, на лист від адміністратора.
    </body>
    </html>
<?php } else { ?>
	<html style="width: 100%">
    <head>
        <title>Не підтверджено</title>
    </head>
    <body style="width: 600px; margin: 50px auto; font-size: 16px;">
    Ваш лінк не є робочим. Пройдіть операцію реєстрації заново, або зверніться до адміністратора.
    </body>
    </html>
<?php } ?>