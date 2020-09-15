<?php
session_start();
unset($_SESSION["loged_in"]);
header("location:home.php");

?>