<?php
require('actions/questions/myQuestionsAction.php');
require('actions/users/securityAction.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php require('includes/head.php'); ?>

<body>
    <?php
    require('includes/navbar.php');

    while ($question = $getAllMyQuestions->fetch()) {
    ?>
        <div class="container py-3">
            <div class="card">
                <div class="card-header">
                    <?= $question['titre']; ?>
                </div>
                <div class="card-body">
                    <p class="card-text"><?= $question['description']; ?>.</p>
                    <a href="#" class="btn btn-primary">Voir la question</a>
                    <a href="#" class="btn btn-outline-primary">Modifier la question</a>
                </div>
            </div>
        </div>
    <?php
    }

    ?>



</body>

</html>