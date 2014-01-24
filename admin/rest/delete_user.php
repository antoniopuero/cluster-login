<?php
/**
 * Created by JetBrains PhpStorm.
 * User: a.savchenko
 * Date: 12/31/13
 * Time: 1:47 PM
 * To change this template use File | Settings | File Templates.
 */

include("../config.php");
$filename = $query_folder . "/" . $_POST['filename'];
$decoded = json_decode(file_get_contents($filename), true);
$message_body = "
	    <h3>Dear " . $decoded['firstname'] . " " . $decoded['lastname'] . ",</h3>
	     <div>Your registration information was declined.</div>";
	mail($decoded['mail'], 'Cluster account failed', $message_body,
	"From: Cluster team\r\n"
	. "Reply-To: cluster@cluster.ua\r\n"
	. "Content-type: text/html\r\n"
	. "X-Mailer: PHP/" . phpversion());
?>
unlink($filename);
echo "OK";