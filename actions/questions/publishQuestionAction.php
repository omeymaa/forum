<?php
require('actions/database.php');

// valider le formulaire
if(isset($_POST['validate'])) {

    // verifier si les champs ne sont pas vides
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])) {
        
        // les donnees de la question, nl2br pour autoriser les sauts de ligne
        $question_title = htmlspecialchars($_POST['title']);
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('d/m/Y');
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];

        // inserer la question sur le site
        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO questions(titre, description, contenu, id_auteur, pseudo_auteur, date_publication) VALUES(?,?,?,?,?,?)');
        $insertQuestionOnWebsite->execute(
            array(
                $question_title, 
                $question_description, 
                $question_content, 
                $question_id_author, 
                $question_pseudo_author, 
                $question_date
            )
        );
       
        $successMsg = 'Votre question à bien été publiée sur le site.';




    } else {
        $errorMsg = 'Veuillez remplir tous les champs';
    }


}

?>