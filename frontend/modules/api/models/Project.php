<?php

namespace frontend\modules\api\models;

class Project extends \common\models\Project
{
  public function fields()
  {
    return [
      'id' => 'id',
      'title' => 'title',
      'description_short' => function ($model) {

        return mb_substr($model->description, 0, 50);
      },
      'active' => 'active'
    ];
  }

  public function extraFields()
  {
    return [self::RELATION_PROJECT_TASKS];
  }

}