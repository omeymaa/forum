<?php
require('actions/database.php');

// validation du formulaire
if(isset($_POST['validate'])) {

    // verifier si tous les champs ont bien été remplis
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])) {
        
        //les donnees a faire passé dans la requete, nl2br pour autoriser les sauts de ligne
        $new_question_title = htmlspecialchars($_POST['title']);
        $new_question_description = nl2br(htmlspecialchars($_POST['description']));
        $new_question_content = nl2br(htmlspecialchars($_POST['content']));
        
        // modifier les informations de la question qui possede l'id rentré en parametre dans l'url
        $editQuestionOnWebsite = $bdd->prepare('UPDATE questions SET titre = ?, description = ?, contenu = ? WHERE id = ?');
        $editQuestionOnWebsite->execute(array($new_question_title, $new_question_description, $new_question_content, $idOfQuestion));

        // rediriger vers la page d'affichage des questions de l'utilisateur
        header('location: my-questions.php');

    } else {
        $errorMsg = 'Veuillez remplir tous les champs';
    }

    }

?>