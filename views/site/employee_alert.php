<div class="site-employee-alert">

    <?php
    if (Yii::$app->session->hasFlash('success')) {
        echo '<br>Name: ' . $model->name;
        echo '<br>Position: ' . $model->position;
        echo '<br>Email: ' . $model->email;
        echo '<br>Info: ' . $model->info;
    } else {
        echo '</div>';
    }
    ?>

</div>