<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?php Pjax::begin(); ?>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'id',
      'username',
      //'auth_key',
      //'password_hash',
      //'password_reset_token',
      'email:email',
      //'access_token',
      'avatar',
      [
        'attribute' => 'status',
        'filter' => \common\models\User::STATUSES_LABELS,
        'content' => function (\common\models\User $user) {

          return \common\models\User::STATUSES_LABELS[$user->status];
        }
      ],
      [
        'attribute' => 'created_at',
        'content' => function (\common\models\User $user) {

          return date('d-M-Y', $user->created_at);
        }
      ],
      [
        'attribute' => 'updated_at',
        'content' => function (\common\models\User $user) {

          return date('d-M-Y', $user->created_at);
        }
      ],

      ['class' => 'yii\grid\ActionColumn'],
    ],
  ]); ?>

  <?php Pjax::end(); ?>

</div>
