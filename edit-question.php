<?php
require('actions/users/securityAction.php');
require('actions/questions/getInfosOfEditedQuestionAction.php');
require('actions/questions/editQuestionAction.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php require('includes/head.php'); ?>

<body>
    <?php require('includes/navbar.php'); ?>

    <div class="container py-5">

        <?php
        if (isset($errorMsg)) {
            echo '<p>' . $errorMsg . '</p>';
        }

        if (isset($question_content)) { ?>
            <h1>Modifier la question</h1>

            <form class="py-3" method="POST">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
                    <input type="text" class="form-control" name="title" value="<?=$question_title;?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <textarea type="text" class="form-control" name="description"><?=$question_description;?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
                    <textarea type="text" class="form-control" name="content"><?=$question_content;?></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>

            </form>
        <?php } ?>


    </div>
</body>

</html>