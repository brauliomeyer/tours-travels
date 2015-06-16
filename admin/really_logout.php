<?php
ob_start();
session_start();
session_destroy();
ob_flush();
header("Location:index.php");
?>
