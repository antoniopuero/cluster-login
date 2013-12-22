<?php include('./config.php'); ?>
<?php session_start(); ?>
<?php extract($_POST) ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Обчислювальний кластер Київського національного університету ім. Т.Шевченка &raquo; Як стати
        користувачем</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="content-language" content="ru"/>
    <meta name="language" content="uk"/>
    <meta name="robots" content="all"/>
    <meta name="rating" content="general"/>
    <meta name="distribution" content="global"/>
    <meta name="revisit-after" content="10 days"/>
    <meta name="document-state" content="dynamic"/>

    <meta name="keywords"
          content="Як стати користувачем, кластерні технології, паралельні обчислення, розподілені системи, сервери, програмування, Обчислювальний, кластер, Київського, національного, університету, імені, Тараса, Шевченка, миттєві, обчислення, наукові, прикладні, задачі, linux, unix"/>
    <meta http-equiv="keywords"
          content="Як стати користувачем, кластерні технології, паралельні обчислення, розподілені системи, сервери, програмування, Обчислювальний, кластер, Київського, національного, університету, імені, Тараса, Шевченка, миттєві, обчислення, наукові, прикладні, задачі, linux, unix"/>
    <meta name="description"
          content="Обчислювальний кластер Київського національного університету імені Тараса Шевченка. Миттєві обчислення для наукових і прикладних задач. Як стати користувачем"/>

    <link href="style.css" rel="stylesheet"/>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

</head>
<body style="font-family:Arial,Verdana,Tahoma;width: 100%; min-height: 100%;">

<table border="0" cellspacing="0" cellpadding="0"
       style="width:750px; border-left:1px solid #CCCCCC; border-right:1px solid #CCCCCC; background-color:#F3F3F3; margin: auto;">


<tr>
<td>&nbsp;</td>
<td>

    <table border="0" cellspacing="2" cellpadding="3" width="100%"
           style="width:100%; height:100%; background-color:#FEFEFE; border:1px solid #AFAFAF;">
        <tr>
            <td style="text-align:left; background-color:#FFFFFF; vertical-align:top; padding:10px 5px 10px 5px;">
                <div class="con_header">Як стати користувачем</div>
                <?php if (isset($message)) { ?>
                <div class="error-message"><?php echo $message ?></div>
                <?php } ?>
                <br/>

                <div class="con_text">

                    <script language="JavaScript" type="text/javascript">

                        function CheckFields() {
                            if (document.formSendMessage.login.value.length <= 0) {
                                window.alert("Ви не ввели логін. Це погано.");
                                document.formSendMessage.login.focus();
                                return(false);
                            }
                            if (document.formSendMessage.lastname.value.length <= 0) {
                                window.alert("Ваше прізвище?");
                                document.formSendMessage.lastname.focus();
                                return(false);
                            }
                            if (document.formSendMessage.firstname.value.length <= 0) {
                                window.alert("Ви забули ввести ваше ім/'я.");
                                document.formSendMessage.firstname.focus();
                                return(false);
                            }
                            if (document.formSendMessage.middlename.value.length <= 0) {
                                window.alert('Будь ласка, заповніть поле "По-батькові".');
                                document.formSendMessage.middlename.focus();
                                return(false);
                            }
                            if (document.formSendMessage.organization.value.length <= 0) {
                                window.alert("Ви забули вказати організацію.");
                                document.formSendMessage.organization.focus();
                                return(false);
                            }
                            if (document.formSendMessage.department.value.length <= 0) {
                                window.alert("Будь ласка, заповніть поле лабораторії.");
                                document.formSendMessage.department.focus();
                                return(false);
                            }
                            if (document.formSendMessage.post.value.length <= 0) {
                                window.alert("Будь ласка, вкажіть свою посаду.");
                                document.formSendMessage.post.focus();
                                return(false);
                            }
                            if (document.formSendMessage.phone.value.length <= 0) {
                                window.alert("Будь ласка, вкажіть свій телефонний номер.");
                                document.formSendMessage.phone.focus();
                                return(false);
                            }
                            txt = document.formSendMessage.email.value;
                            dog = txt.indexOf("@");
                            if (dog == -1) {
                                window.alert("В адресі електронної пошти немає символа \"@\".");
                                document.formSendMessage.email.focus();
                                return(false);
                            }
                            if (txt.indexOf(".") == -1) {
                                window.alert("В адресі електронної пошти немає символа \".\".");
                                document.formSendMessage.email.focus();
                                return(false);
                            }
                            if ((dog < 1) || (dog > txt.length - 5)) {
                                window.alert("Некоректна адреса електронної пошти?");
                                document.formSendMessage.email.focus();
                                return(false);
                            }
                            if ((txt.charAt(dog - 1) == ".") || (txt.charAt(dog + 1) == ".")) {
                                window.alert("Некоректна адреса електронної пошти?");
                                document.formSendMessage.email.focus();
                                return(false);
                            }
                            if (document.formSendMessage.class.value.length <= 0) {
                                window.alert("Ви не вказали клас задач.");
                                document.formSendMessage.class.focus();
                                return(false);
                            }
                            if (document.formSendMessage.resource.value.length <= 0) {
                                window.alert("Ви не вказали необхідні ресурси.");
                                document.formSendMessage.resource.focus();
                                return(false);
                            }
                        }

                    </script>
                    <p>Щоб отримати доступ до кластера, ви повинні заповнити дану форму.</p>
                    <small><p>Будь ласка, вказуйте повну та коректну інформацію. Також намагайтеся вибирати
                            унікальний логін.</p>

                        <p>Якщо обраний логін виявиться зайнятим, система реєстрації автоматично додасть до
                            нього кілька цифр. Тому радимо не обирати як логін короткі імена. З міркувань
                            безпеки ми не надаємо інформацію про зайняті логіни, але ви завжди можете <a
                                href="http://cluster.univ.kiev.ua/ukr/contacts">особисто звернутися</a> в
                            лабораторію паралельних обчислень на ІОЦ КНУ і зареєструватися там.</p>

                        <p>Реєстраційні дані обов'язково перевіряються адміністраторами.</p>
                    </small>
                    <form method="post"
                          action="<?php echo $path_to_confirm ?>"
                          name="formSendMessage">
                        <table style="font-size: 10pt;" border="0"
                               cellpadding="2" cellspacing="0">
                            <tbody>
                            <?php if (isset($login_message)) { ?>
                                <tr class="error-message"><td colspan="2"><?php echo $login_message ?></td></tr>
                            <?php } ?>
                            <tr>
                            <tr>
                                <td style="font-weight: bold;">Логін</td>
                                <td><input  id="login-string" name="login" size="60"
                                           maxlength="255" value="<?php echo $login ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <small>Будь ласка, уникайте сумнівних символів в полі логіну.
                                        Допускаються латинські літери будь-якого регістру, цифри&nbsp;(не&nbsp;на&nbsp;початку&nbsp;логіну)
                                        та знак підкреслення.
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Прізвище</td>
                                <td><input name="lastname" size="60"
                                           maxlength="255" value="<?php echo $lastname ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Ім'я</td>
                                <td><input name="firstname" size="60"
                                           maxlength="255" value="<?php echo $firstname ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">По-батькові</td>
                                <td><input name="middlename" size="60"
                                           maxlength="255" value="<?php echo $middlename ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Організація</td>
                                <td><input name="organization" size="60"
                                           maxlength="255" value="<?php echo $organization ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Відділ/лабораторія&nbsp;</td>
                                <td><input name="department" size="60"
                                           maxlength="255" value="<?php echo $department ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Посада</td>
                                <td><input name="post" size="60"
                                           maxlength="255" value="<?php echo $post ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Телефонний номер</td>
                                <td><input name="phone" size="60"
                                           maxlength="255" value="<?php echo $phone ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Електропошта</td>
                                <td><input name="email" size="60"
                                           maxlength="255" value="<?php echo $email ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Клас задач</td>
                                <td><input name="class" size="60"
                                           maxlength="255" value="<?php echo $class ?>" type="text"></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Необхідні ресурси</td>
                                <td><input name="resource" size="60"
                                           maxlength="255" value="<?php echo $resource ?>" type="text"></td>
                            </tr>
                            <?php if (isset($captcha_message)) { ?>
                                <tr class="error-message"><td colspan="2"><?php echo $captcha_message ?></td></tr>
                            <?php } ?>
                            <tr>
                                <td><img id="captcha"
                                        src="<?php echo $path_to_captcha ?>?<?php echo session_name() ?>=<?php echo session_id() ?>">
                                </td>
                                <td>
                                    <button id="refresh-captcha">Оновити</button><br>
                                    <input id="captcha-string" name="captcha" size="60"
                                           maxlength="20" value="" type="text"></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Підписатися на оновлення</td>
                                <td><input name="subscribe" value="<?php echo $subscrbe ?>"
                                           checked="<?php echo $subscirbe ?>" type="checkbox"></td>
                            </tr>

                            <tr>
                                <td colspan="2" align="right">
                                    <button class="submitbutton"
                                        type="submit">Відправити</button></td>
                            </tr>
                            </tbody>
                        </table>
                        <input name="hidden_lang" value="ukr" type="hidden">
                    </form>
                </div>
            </td>
        </tr>
    </table>

</td>
<td>&nbsp;</td>
</tr>


</table>
<script type="text/javascript">
    (function ($, window) {
        var img = $('#captcha');
        $('#refresh-captcha').click(function (e) {
            e.preventDefault();
            var src = "<?php echo $path_to_captcha ?>?<?php echo session_name() ?>=";
            img.attr('src', src + (new Date).getTime());
        });
        <?php if (isset($login_message)) { ?>
            $('#login-string').trigger('focus');
        <?php } ?>
        <?php if (isset($captcha_message)) { ?>
            $('#captcha-string').trigger('focus');
        <?php } ?>
    })(jQuery, window);
</script>
</body>
</html>
