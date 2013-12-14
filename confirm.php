<?php session_start(); ?>
<?php include("./config.php"); ?>
<?php include($helpers . "user_already_exists.php"); ?>
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
    <?php } elseif (user_exists($_POST['login'])) { ?>

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
    $today = date("m_d_y+H_i");
    echo $today;
    $newfile = fopen($pre_query_folder.$today.'.json', 'a');
    fwrite($newfile, json_encode($_POST));
}

unset($_SESSION['captcha_keystring']);
?>