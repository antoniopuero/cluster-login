<?php
if(count($_POST)>0){
    if(isset($_SESSION['captcha_keystring']) && $_SESSION['captcha_keystring'] === $_POST['captcha']){
        echo "Correct";
    }else{
        echo "Wrong";
    }
}
unset($_SESSION['captcha_keystring']);
?>