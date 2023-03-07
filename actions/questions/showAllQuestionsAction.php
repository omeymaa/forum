<?php
require('actions/database.php');

// recuperer les questions par défaut sans recherche
$getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

// verifier si une recherche a ete rentrée par l'utilisateur
if(isset($_GET['search']) AND !empty(['search'])) {

    // la recherche de l'utilisateur
    $usersSearch = $_GET['search'];
    // recuperer toutes les questions qui correspondent à a recherche en fonction du titre
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');


}
?>