<?php
require('actions/database.php');

// validation du formulaire
if(isset($_POST['validate'])){

    // vérifier si l'utilisateur a bien vérifié tous les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['firstname']) AND !empty($_POST['lastname'])  AND !empty($_POST['password'])){
        
        // données de l'utilisateur
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        // verifier si l'utilisateur existe déà sur le site
        $checkIfUserExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount() == 0){

            // inserer l'utilisateur dans bdd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users (pseudo, nom, prenom, mdp) VALUES(?,?,?,?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_firstname, $user_lastname, $user_password));

            // recuperer les informations de l'utilisateur
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo =?');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));

            $usersInfos = $getInfosOfThisUserReq->fetch();

            // authentifier l'utilisateur sur le site et recuperer ses donnes dans des variables globales
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
            $_SESSION['lastname'] = $usersInfos['nom'];

            // rediriger l'utilisateur vers la page d'accueil
            header("Location: index.php");


        }else {
            $errorMsg = 'L\'utilisateur existe déjà sur le site';
        }


    } else {
        $errorMsg = 'Veuillez remplir tous les champs';
    }
}

?>