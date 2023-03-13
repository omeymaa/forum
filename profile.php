<?php
session_start();
require('actions/users/showOneUsersProfileAction.php');

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

        if (isset($getHisQuestions)) {
        ?>
            <div class="card">
                <div class="card-body">
                    <h4>@<?= $user_pseudo; ?></h4>
                    <p><?= $user_firstname . ' ' . $user_lastname; ?></p>
                </div>
            </div>
        <?php

        while($question = $getHisQuestions->fetch()){
            ?>
            <div class="card mt-2">
                <div class="card-header">
                    <a href="question.php?id=<?= $question['id']; ?>">
                        <?= $question['titre']; ?>
                    </a>
                </div>
                <div class="card-body"><?= $question['description']; ?></div>
                <div class="card-footer">Publié le <?= $question['date_publication']; ?></div>
            </div>
            <?php
        }
        }

        ?>

    </div>
</body>

</html>