<?php session_start(); ?>
<?php include("./config.php"); ?>
<?php include($helpers . "user_already_exists.php"); ?>
<?php include($helpers . "read_directory.php"); ?>
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
    <?php } elseif (user_exists($_POST['login'], $pre_query_folder)) { ?>

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
    }
    mail('antonio.puero@gmail.com', 'subject', 'body',
        "From: Cluster team\r\n"
        ."Reply-To: cluster@cluster.ua\r\n"
        ."X-Mailer: PHP/" . phpversion());
    $today = date("m_d_y+H_i");
    $newfile = fopen($pre_query_folder.$_POST['login'].'+'.$today.'.json', 'a');
    fwrite($newfile, iconv('UTF-8', 'Windows-1251', json_encode($_POST)));
    fclose($newfile);
    print_r(files_in_directory($pre_query_folder));
}

unset($_SESSION['captcha_keystring']);
?>