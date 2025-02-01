<?php 
    session_start();
    unset($_SESSION['idstart']);
    unset($_SESSION['userstart']);
    unset($_SESSION['passstart']);
    unset($_SESSION['namastart']);
    unset($_SESSION['levelstart']);
    unset($_SESSION['fotostart']);
    header("location: ../");
