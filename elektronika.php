<?php
    session_start();
    $_SESSION['zapytanie'] = "elektronika";
    header('Location: StronaPoZalogowaniu.php');
?>