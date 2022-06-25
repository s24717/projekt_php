<?php
    session_start();
    $_SESSION['zapytanie'] = "jedzenie";
    header('Location: StronaPoZalogowaniu.php');
?>