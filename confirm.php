<?php session_start(); ?>
<?php
if(count($_POST)>0){
    if(!isset($_SESSION['captcha_keystring']) || !($_SESSION['captcha_keystring'] === $_POST['captcha'])){ ?>
        <form action='/index.php' method='post' name='frm'>
        <?php
        foreach ($_POST as $a => $b) {
            echo "<input type='hidden' name='".htmlentities($a)."' value='".htmlentities($b)."'>";
        }
        ?>
            <input type="text" name="error-message" value="Перевірте правильність введення капчі">
        </form>
        <script>
            document.frm.submit();
        </script>
    <?php }
}
unset($_SESSION['captcha_keystring']);
?>