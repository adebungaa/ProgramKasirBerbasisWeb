<?php 

session_start();
unset($_SESSION['idkasir']);
unset($_SESSION['userkasir']);
unset($_SESSION['passkasir']);
unset($_SESSION['namakasir']);
unset($_SESSION['levelkasir']);
unset($_SESSION['fotokasir']);
header("location: ../")


?>