<?php

namespace backend\controllers;

use common\models\Project;
use common\models\Task;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

class TestController extends Controller
{
  public function actionIndex()
  {
    // return $this->renderContent('backend');

    _end(Task::findOne(2)->getRelation(Task::RELATION_PROJECT)->asArray()->one());
  }
}