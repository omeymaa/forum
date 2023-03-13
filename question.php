<?php
require('actions/questions/showQuestionContentAction.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php require('includes/head.php'); ?>

<body>
    <?php require('includes/navbar.php'); ?>

    <div class="container py-5">
        <?= $question_title; ?>
    </div>

</body>
</html>