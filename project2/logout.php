<?php
session_start();
unset($_SESSION['UserID']);
echo $_SESSION['UserID'];
header("Location: ".$_SERVER['HTTP_REFERER']);
?>