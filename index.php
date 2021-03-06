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
	<script type="text/javascript" src="./js/jquery-1.7.1.js"></script>
	<script type="text/javascript" src="./js/jquery.inputmask.bundle.min.js"></script>

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
						<br/>

						<div class="con_text">
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
							      name="formSendMessage"
							      onsubmit="return CheckFields();">
								<table style="font-size: 10pt;" border="0"
								       cellpadding="2" cellspacing="0">
									<tbody>
									<?php if (isset($login_message)) { ?>
										<tr class="error-message">
											<td colspan="2"><?php echo $login_message ?></td>
										</tr>
									<?php } ?>
									<tr>
									<tr>
										<td style="font-weight: bold;">Логін</td>
										<td><input id="login-string" name="login" size="60"
										           maxlength="255" value="<?php if (isset($login)) {
												echo base64_decode($login);
											} ?>" type="text"></td>
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
										           maxlength="255" value="<?php if (isset($lastname)) {
												echo base64_decode($lastname);
											} ?>" type="text"></td>
									</tr>
									<tr>
										<td style="font-weight: bold;">Ім'я</td>
										<td><input name="firstname" size="60"
										           maxlength="255" value="<?php if (isset($firstname)) {
												echo base64_decode($firstname);
											} ?>" type="text"></td>
									</tr>
									<tr>
										<td style="font-weight: bold;">По-батькові</td>
										<td><input name="middlename" size="60"
										           maxlength="255" value="<?php if (isset($middlename)) {
												echo base64_decode($middlename);
											} ?>" type="text"></td>
									</tr>
									<tr>
										<td style="font-weight: bold;">Організація</td>
										<td><input name="organization" size="60"
										           maxlength="255" value="<?php if (isset($organization)) {
												echo base64_decode($organization);
											} ?>" type="text"></td>
									</tr>
									<tr>
										<td style="font-weight: bold;">Відділ/лабораторія&nbsp;</td>
										<td><input name="department" size="60"
										           maxlength="255" value="<?php if (isset($department)) {
												echo base64_decode($department);
											} ?>" type="text"></td>
									</tr>
									<tr>
										<td style="font-weight: bold;">Посада</td>
										<td><input name="post" size="60"
										           maxlength="255" value="<?php if (isset($post)) {
												echo base64_decode($post);
											} ?>" type="text"></td>
									</tr>
									<tr>
										<td style="font-weight: bold;">Телефонний номер</td>
										<td><input name="phone" size="60"
										           maxlength="255" value="<?php if (isset($phone)) {
												echo base64_decode($phone);
											} ?>" type="text"></td>
									</tr>
									<?php if (isset($email_message)) { ?>
										<tr class="error-message">
											<td colspan="2"><?php echo $email_message ?></td>
										</tr>
									<?php } ?>
									<tr>
										<td style="font-weight: bold;">Електропошта</td>
										<td><input  id="email-string" name="mail" size="60"
										           maxlength="255" value="<?php if (isset($mail)) {
												echo base64_decode($mail);
											} ?>" type="text"></td>
									</tr>
									<tr>
										<td style="font-weight: bold;">Клас задач</td>
										<td><input name="class" size="60"
										           maxlength="255" value="<?php if (isset($class)) {
												echo base64_decode($class);
											} ?>" type="text"></td>
									</tr>
									<tr>
										<td style="font-weight: bold;">Необхідні ресурси</td>
										<td><input name="resource" size="60"
										           maxlength="255" value="<?php if (isset($resource)) {
												echo base64_decode($resource);
											} ?>" type="text"></td>
									</tr>
									<?php if (isset($captcha_message)) { ?>
										<tr class="error-message">
											<td colspan="2"><?php echo $captcha_message ?></td>
										</tr>
									<?php } ?>
									<tr>
										<td><img id="captcha"
										         src="<?php echo $path_to_captcha ?>?<?php echo session_name() ?>=<?php echo session_id() ?>">
										</td>
										<td>
											<button id="refresh-captcha">Оновити</button>
											<br>
											<input id="captcha-string" name="captcha" size="60"
											       maxlength="20" value="" type="text"></td>
									</tr>
									<tr>
										<td style="font-weight: bold;">Підписатися на оновлення</td>
										<td><input name="subscribe" value="true"
										           <?php if (isset($subscribe)) {
											           echo 'checked';
										           }?> type="checkbox"></td>
									</tr>

									<tr>
										<td colspan="2" align="right">
											<button class="submitbutton"
											        type="submit">Відправити
											</button>
										</td>
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
<script language="JavaScript" type="text/javascript">

	function CheckFields() {
		if (document.formSendMessage.login.value.length <= 0) {
			window.alert("Ви не ввели логін. Це погано.");
			document.formSendMessage.login.focus();
			return false;
		}
		if (document.formSendMessage.lastname.value.length <= 0) {
			window.alert("Ваше прізвище?");
			document.formSendMessage.lastname.focus();
			return false;
		}
		if (document.formSendMessage.firstname.value.length <= 0) {
			window.alert("Ви забули ввести ваше ім\'я.");
			document.formSendMessage.firstname.focus();
			return false;
		}
		if (document.formSendMessage.middlename.value.length <= 0) {
			window.alert('Будь ласка, заповніть поле "По-батькові".');
			document.formSendMessage.middlename.focus();
			return false;
		}
		if (document.formSendMessage.organization.value.length <= 0) {
			window.alert("Ви забули вказати організацію.");
			document.formSendMessage.organization.focus();
			return false;
		}
		if (document.formSendMessage.department.value.length <= 0) {
			window.alert("Будь ласка, заповніть поле лабораторії.");
			document.formSendMessage.department.focus();
			return false;
		}
		if (document.formSendMessage.post.value.length <= 0) {
			window.alert("Будь ласка, вкажіть свою посаду.");
			document.formSendMessage.post.focus();
			return false;
		}
		if (document.formSendMessage.phone.value.length < 10) {
			window.alert("Будь ласка, вкажіть правильний телефонний номер ( наприклад 0634445566).");
			document.formSendMessage.phone.focus();
			return false;
		}
		txt = document.formSendMessage.mail.value;
		if (!/^([\w\-\.]+)@((\[([0-9]{1,3}\.){3}[0-9]{1,3}\])|(([\w\-]+\.)+)([a-zA-Z]{2,4}))$/.test(txt)) {
			window.alert("Некоректна адреса електронної пошти?");
			document.formSendMessage.mail.focus();
			return false;
		}
		if (document.formSendMessage.class.value.length <= 0) {
			window.alert("Ви не вказали клас задач.");
			document.formSendMessage.class.focus();
			return false;
		}
		if (document.formSendMessage.resource.value.length <= 0) {
			window.alert("Ви не вказали необхідні ресурси.");
			document.formSendMessage.resource.focus();
			return false;
		}
	}

</script>
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
		<?php if (isset($email_message)) { ?>
		$('#email-string').trigger('focus');
		<?php } ?>



		$.extend($.inputmask.defaults.definitions, {
			"l": {
				"validator": "[a-zA-Z0-9_]",
				"cardinality": 1,
				"prevalidator": null
			},
			"f": {
				"validator": "[a-zA-Z0-9\(\)\._-]",
				"cardinality": 1,
				"prevalidator": null
			},
			"e": {
				"validator": "[a-zA-Z0-9_-@\\.]",
				"cardinality": 1,
				"prevalidator": null
			},
			"i": {
				"validator": "[a-zA-Zа-яА-Я0-9ІіЇї -]",
				"cardinality": 1,
				"prevalidator": null
			}
		});
		$('input[name=login]').inputmask({
			mask: 'l',
			autoUnmask: true,
			repeat: 25,
			greedy: false
		});
		$('input[name=lastname]').inputmask({
			mask: 'a',
			autoUnmask: true,
			repeat: 25,
			greedy: false
		});
		$('input[name=firstname]').inputmask({
			mask: 'a',
			autoUnmask: true,
			repeat: 25,
			greedy: false
		});
		$('input[name=middlename]').inputmask({
			mask: 'a',
			autoUnmask: true,
			repeat: 25,
			greedy: false
		});
		$('input[name=organization]').inputmask({
			mask: 'i',
			autoUnmask: true,
			repeat: 25,
			greedy: false
		});
		$('input[name=department]').inputmask({
			mask: 'i',
			autoUnmask: true,
			repeat: 25,
			greedy: false
		});
		$('input[name=post]').inputmask({
			mask: 'i',
			autoUnmask: true,
			repeat: 25,
			greedy: false
		});
		$('input[name=phone]').inputmask('Regex', { regex: "\\+?\\d{0,13}" });
		$('input[name=mail]').inputmask({
			mask: 'e',
			autoUnmask: true,
			repeat: 60,
			greedy: false
		});
		$('input[name=class]').inputmask({
			mask: 'i',
			autoUnmask: true,
			repeat: 60,
			greedy: false
		});
		$('input[name=resource]').inputmask({
			mask: 'i',
			autoUnmask: true,
			repeat: 60,
			greedy: false
		});

	})(jQuery, window);
</script>
</body>
</html>
