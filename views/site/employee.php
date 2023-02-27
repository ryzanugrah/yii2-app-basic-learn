<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;

$this->title = 'Employee';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-employee">
    <h1>Employee</h1>

    <?php
    $form = ActiveForm::begin([
        'method' => 'post',
    ])
    ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'position')->dropDownList($model->employeeData(), ['class' => 'form-control', 'prompt' => '- Select Position -']) ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'info') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end() ?>
</div>