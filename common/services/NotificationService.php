<?php

namespace common\services;

use yii\base\Component;

class NotificationService extends Component
{
  public function sendNewProjectRole($user, $project, $role)
  {
    $views = ['html' => 'assignRoleToProject-html', 'text' => 'assignRoleToProject-text'];
    $data = ['user' => $user, 'project' => $project, 'role' => $role];
    \Yii::$app->emailService->send($user->email, 'New role ' . $role, $views, $data);
  }
}