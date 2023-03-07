<?php
session_start();
require('actions/questions/showAllQuestionsAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php require('includes/head.php'); ?>

<body>
    <?php require('includes/navbar.php'); ?>

    <div class="container">
        <form method="GET">

            <div class="form-group row  py-5">
                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </div>
            </div>
        </form>

        <?php
        while ($question = $getAllQuestions->fetch()) {
        ?>
<<<<<<< HEAD
            <div class="py-2">
                <div class="card">
                    <div class="card-header"><?= $question['titre']; ?></div>
                    <div class="card-body"><?= $question['description']; ?></div>
                    <div class="card-footer">Publié par <?= $question['pseudo_auteur']; ?>, le <?= $question['date_publication']; ?></div>
                </div>
=======
            <div class="card py-2">
                <div class="card-header"><?= $question['titre']; ?></div>
                <div class="card-body"><?= $question['description']; ?></div>
                <div class="card-footer">Publié par <?= $question['pseudo_auteur']; ?>, le <?= $question['date_publication']; ?></div>
>>>>>>> recherche-questions
            </div>
        <?php
        }
        ?>

    </div>


</body>

</html>