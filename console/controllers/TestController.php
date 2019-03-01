<?php
namespace console\controllers;

use yii\console\Controller;
use yii\console\ExitCode;

class TestController extends Controller
{
  public function actionIndex()
  {
    $this->stdout('console' . PHP_EOL);
    return ExitCode::OK;
  }
}