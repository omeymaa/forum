<?php
session_start();
require('actions/questions/showQuestionContentAction.php');
require('actions/questions/postAnswerAction.php');
require('actions/questions/showAllAnswersOfQuestionAction.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php require('includes/head.php'); ?>

<body>
    <?php require('includes/navbar.php'); ?>

    <div class="container py-5">

        <?php
        if (isset($errorMsg)) {
            echo $errorMsg;
        }
        if (isset($question_publication_date)) {
        ?>
            <section class="show-content">
                <h3><?= $question_title; ?></h3>
                <hr>
                <p><?= $question_content; ?></p>
                <hr>
                <small><?= '<a href="profile.php?id='.$question_id_author. '">' . $question_pseudo_author . '</a> ' . $question_publication_date; ?></small>
            </section>

            <section class="show-answers py-5">
                <form action="" method="POST" class="form-group">
                    <div class="mb-3">
                        <label for="" class="form-label">Réponse :</label>
                        <textarea name="answer" class="form-control"></textarea>
                        <button class="btn btn-success mt-2" type="submit" name="validate">Répondre</button>
                    </div>
                </form>

                <?php 
                    while($answer = $getAllAnswersOfThisQuestion->fetch()){
                        ?>
                        <div class="card mb-3">
                            <div class="card-header">
                             <a href="profile.php?id=<?= $answer['id_auteur']; ?>"><?= $answer['pseudo_auteur']; ?></a>
                            </div>
                            <div class="card-body">
                                <?= $answer['contenu']; ?>
                            </div>
                        </div>
                        <?php
                    }
                ?>

            </section>


        <?php
        }
        ?>
    </div>

</body>

</html>