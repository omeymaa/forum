<?php
// verifier si l'utilisateur est authentifié au niveau du site
session_start();
if(!isset($_SESSION['auth'])) {
    header('location: ../../login.php');
}
require('../database.php');

// verifier si l'id est rentré en paramètre dans l'URL
if(isset($_GET['id']) AND !empty(['id'])) {
    
    // l'id de la question en paramètre
    $idOfTheQuestion = $_GET['id'];

    // verifier si la question existe
    $checkIfQuestionExists = $bdd->prepare('SELECT id_auteur FROM questions WHERE id =?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    if($checkIfQuestionExists->rowCount() > 0) {

        // recuperer les infos de la question
        $usersInfos = $checkIfQuestionExists->fetch();
        if($usersInfos['id_auteur'] == $_SESSION['id']) {
            
            // supprimer la question en fonction de son id rentré en paramètre
            $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id =?');
            $deleteThisQuestion->execute(array($idOfTheQuestion));

            header('location: ../../my-questions.php');
        } else {
            echo 'Vous n\'avez pas le droit de supprimer cette question.';
        }

    } else {
        echo 'Aucune question n\'a été trouvée.';
    }

} else {
    echo 'Aucune question n\'a été trouvée.';
}

?>