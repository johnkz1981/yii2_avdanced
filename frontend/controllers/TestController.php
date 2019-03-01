<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
class TestController extends Controller
{
  public function actionIndex()
  {
    return $this->renderContent('frontend');
  }
}