<?php
session_start();
	if(isset($_SESSION['uid'])){
		unset($_SESSION['uid']);
	}
	session_destroy();
	echo "<script>document.location='index.php'</script>";
?>