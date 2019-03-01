<?php

namespace frontend\modules\api\controllers;

use frontend\modules\api\models\Task;
use yii\rest\ActiveController;

/**
 * Default controller for the `api` module
 */
class TaskController extends ActiveController
{
    public $modelClass = Task::class;

}
