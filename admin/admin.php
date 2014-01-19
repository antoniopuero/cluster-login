<?php
session_start();
if (isset($_SESSION['last_time']) && (time() - $_SESSION['last_time'] > 1800)) {
	session_destroy();
}

if (isset($_SESSION['login'])) {
	include('./config.php');
	?>

	<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<link rel="stylesheet" href="./css/bootstrap-responsive.min.css">
	</head>
	<style>
		.user-additional-info .info-cell {
			border-right: 1px solid #ddd;
		}
		.user-additional-info h4 {
			font-size: 12px;
		}
		.user-additional-info .info-cell:last-child {
			border-right: none;
		}
		.login {
			font-weight: bold;
			font-style: italic;
		}
		.user-additional-info input {
			width: 95%;
		}
	</style>
	<body>
	<div class="navbar navbar-static-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<ul class="nav">
					<li>
						<a class="brand" href="">Admin panel</a>
					</li>
				</ul>
				<div class="nav pull-right">
					<ul class="nav">
						<li>
							<a href="./session_destroy.php">Exit</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="container" class="container-fluid">
	</div>
	<script src="./js/jquery-1.7.1.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/templates.js"></script>
	<script src="./js/main.js"></script>
	</body>
	</html>

<?php } else { ?>
	<html style="width: 100%">
    <head>
        <title>Не дійсні дані</title>
    </head>
    <body style="width: 600px; margin: 50px auto; font-size: 16px;">
		Ви не підтвердили профіль адміністратора. Будь-ласка, поверніться на початкову сторінку адмінки і повторіть спробу.
        <a href="./index.php">повернутись та підтвердити</a>
    </body>
    </html>
<?php }

?>