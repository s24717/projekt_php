<?php
session_start();
session_unset();//usuwa wszystkie zmienne globalne by zapomniec o uzytkowniku i moc sie zalogowac znowu
header('Location: index.php');
?>