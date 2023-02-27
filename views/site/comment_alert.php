<div class="site-comment-alert">

    <?php

    if (Yii::$app->session->hasFlash('success')) {
        echo '<br>Name: ' . $model->name;
        echo '<br>Comment: ' . $model->comment;
    } else {
        echo '</div>';
    }
    ?>

</div>