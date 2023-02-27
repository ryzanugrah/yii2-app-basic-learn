<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Comment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-comment">
    <h1>Comment</h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'comment') ?>

    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
</div>