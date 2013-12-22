<?php session_start(); ?>
<?php include("./config.php"); ?>
<?php include($helpers . "user_already_exists.php"); ?>
<?php include($helpers . "read_directory.php"); ?>
<?php include($helpers . "delete_logic_path.php"); ?>
<?php
if (count($_POST) > 0) {
    if (!isset($_SESSION['captcha_keystring']) || !($_SESSION['captcha_keystring'] === $_POST['captcha'])) {
        ?>
        <form action='/index.php' method='post' name='frm'>
            <?php
            foreach ($_POST as $a => $b) {
                echo "<input type='hidden' name='" . htmlentities($a) . "' value='" . htmlentities($b) . "'>";
            }
            ?>
            <input type="hidden" name="captcha_message" value="Перевірте правильність введення капчі">
        </form>
        <script>
            document.frm.submit();
        </script>
    <?php } elseif (user_exists($_POST['login'], $pre_query_folder, $query_folder)) { ?>

        <form action='/index.php' method='post' name='frm'>
            <?php
            foreach ($_POST as $a => $b) {
                echo "<input type='hidden' name='" . htmlentities($a) . "' value='" . htmlentities($b) . "'>";
            }
            ?>
            <input type="hidden" name="login_message" value="Юзер з таким логіном уже існує">
        </form>
        <script>
            document.frm.submit();
        </script>

    <?php
    } else {
        date_default_timezone_set("Europe/Kiev");
        $today = date("m_d_y+H_i");
        $newfile = fopen($pre_query_folder . $_POST['login'] . '+' . $today . '.json', 'a');
        fwrite($newfile, iconv('UTF-8', 'Windows-1251', json_encode($_POST)));
        fclose($newfile);

        $path_to_request = delete_logic_path($path_to_request);
        $link = $base_address . $path_to_request . "?login=" . $_POST["login"] . "&date=" . $today;
        mail('antonio.puero@gmail.com', 'subject', $link,
            "From: Cluster team\r\n"
            . "Reply-To: cluster@cluster.ua\r\n"
            . "X-Mailer: PHP/" . phpversion());
        ?>
        <html>
        <head>
            <link rel="stylesheet" src="./style.css">
            <title>Підтвердження</title>
        </head>
        <body>
        На вашу почту надіслано повідомлення з додатковою інформацією
        та лінком для підтвердження реєстрації.
        </body>
        </html>

    <?php
    }
}
unset($_SESSION['captcha_keystring']);
?>