<?php print_r($_REQUEST); ?>
<?php session_start(); ?>
<?php
if(count($_POST)>0){
    if(isset($_SESSION['captcha_keystring']) && $_SESSION['captcha_keystring'] === $_POST['captcha']){
        echo "Correct";
    } else { ?>
        <form action='Page_C.php' method='post' name='frm'>
        <?php
        foreach ($_POST as $a => $b) {
            echo "<input type='hidden' name='".htmlentities($a)."' value='".htmlentities($b)."'>";
        }
        ?>
        </form>
        <script>
            document.frm.submit();
        </script>

    <?php }
}
unset($_SESSION['captcha_keystring']);
?>