<?php

namespace frontend\modules\api\models;

class Task extends \common\models\Task
{
  public function fields()
  {
    return [
      'id' => 'id',
      'title' => 'title',
      'description_short' => function ($model) {

        return mb_substr($model->description, 0, 50);
      }
    ];
  }

  public function extraFields()
  {
    return [self::RELATION_PROJECT];
  }

}