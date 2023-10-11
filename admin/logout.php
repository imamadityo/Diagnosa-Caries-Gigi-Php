<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	session_destroy();
	echo "<META HTTP-EQUIV='Refresh' Content='0; URL=index.php?alert=2'>";
?>
