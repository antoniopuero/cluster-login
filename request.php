<?php
extract($_GET);
include('./config.php');
$filename = $login . "+" . $date . ".json";
$path_pre_query = $pre_query_folder . $filename;
$path_query = $query_folder . $filename;
if (file_exists($path_pre_query)) {
    rename($path_pre_query, $path_query);
    ?>
    <html>
    <head>
        <link rel="stylesheet" src="./style.css">
        <title>Підтверджено</title>
    </head>
    <body>
    Дякуємо за підтвердження реєстрації. Чекайте на лист адміністратора з подальшими інструкціями.
    </body>
    </html>
<?php } else if (file_exists($path_query)) { ?>
    <html>
    <head>
        <link rel="stylesheet" src="./style.css">
        <title>Підтверджено</title>
    </head>
    <body>
    Ваш профіль вже підтверджено. Чекайте, будь-ласка, на лист від адміністратора.
    </body>
    </html>
<?php } else {

} ?>