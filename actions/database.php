<?php
try {
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', 'root');
}catch(Exception $e) {
    die('Une erreur est survenue :'. $e->getMessage());
}



?>