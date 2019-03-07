<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

  <?php $form = \yii\bootstrap\ActiveForm::begin(
    [
      'layout' => 'horizontal',
      'fieldConfig' =>
        [
          'horizontalCssClasses' => ['label' => 'col-sm-2',]
        ]
    ]
  ); ?>

  <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

  <?= $form->field($model, 'active')->dropDownList(\common\models\Project::STATUS_LABELS) ?>

  <?php if (!$model->isNewRecord):

    $form->field($model, \common\models\Project::RELATION_PROJECT_USERS)->widget(\unclead\multipleinput\MultipleInput::class, [
      // https://github.com/unclead/yii2-multiple-input

      'id' => 'project-users-widget',
      'max' => 10,
      'min' => 0,
      'addButtonPosition' => \unclead\multipleinput\MultipleInput::POS_HEADER,

      /* 'columns' => [
        'name' => 'user_id',
        'type' => \unclead\multipleinput\MultipleInputColumn::TYPE_STATIC,
        'value' => function ($data) {

          return $data ? Html::a($data->user->username, ['user/view', 'id' => $data->user]) : '';
        }
      ],*/
      [
        'name' => 'project_id',
        'type' => 'hiddenInput',
        'defaultValue' => $model->id
      ],
      [
        'name' => 'user_id',
        'type' => 'dropDownList',
        'title' => 'User',
        'items' => \common\models\User::find()->select('username')->indexBy('id')->column()
      ],
      [
        'name' => 'role',
        'type' => 'dropDownList',
        'title' => 'Роль',
        'items' => \common\models\ProjectUser::ROLES
      ]
    ]);

  endif;
  ?>

  <div class="form-group">
    <div class="col-md-2 col-md-offset-2">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
  </div>

  <?php \yii\bootstrap\ActiveForm::end(); ?>

</div>
