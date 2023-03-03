<?php
require('actions/database.php');

// validation du formulaire
if (isset($_POST['validate'])) {

    // vérifier si l'utilisateur a bien vérifié tous les champs
    if (!empty($_POST['pseudo']) and !empty($_POST['password'])) {

        // données de l'utilisateur
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);

        // verifier si l'utilisateur existe (et que le pseudo est correct)
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if ($checkIfUserExists->rowCount() > 0) {

            // recuperer les donnees de l'utilisateur
            $usersInfos = $checkIfUserExists->fetch();

            // verifier si le mot de passe est correct
            if (password_verify($user_password, $usersInfos['mdp'])) {
                
                // authentifier l'utilisateur sur le site et recuperer ses donnes dans des variables globales
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];
                $_SESSION['firstname'] = $usersInfos['prenom'];
                $_SESSION['lastname'] = $usersInfos['nom'];

                // rediriger l'utilisateur vers la page d'accueil
                header('location: index.php');

            } else {
                $errorMsg = 'Votre pseudo ou mot de passe est incorrect';
            }

        } else {
            $errorMsg = 'Votre pseudo ou mot de passe est incorrect';
        }
    } else {
        $errorMsg = 'Veuillez remplir tous les champs';
    }
}
