<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_user".
 *
 * @property int $id
 * @property int $project_id
 * @property int $user_id
 * @property string $role
 *
 * @property Project $project
 * @property User $user
 */
class ProjectUser extends \yii\db\ActiveRecord
{
  const ROLE_DEVELOPER = 'developer';
  const ROLE_MANAGER = 'manager';
  const ROLE_TESTER = 'tester';
  const ROLES = [
    self::ROLE_DEVELOPER => 'developer',
    self::ROLE_MANAGER => 'manager',
    self::ROLE_TESTER => 'tester',
  ];

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'project_user';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['project_id', 'user_id'], 'required'],
      [['project_id', 'user_id'], 'integer'],
      [['role'], 'string'],
      [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
      [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'project_id' => 'Project ID',
      'user_id' => 'User ID',
      'role' => 'Role',
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getProject()
  {
    return $this->hasOne(Project::className(), ['id' => 'project_id']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getUser()
  {
    return $this->hasOne(User::className(), ['id' => 'user_id']);
  }

  /**
   * {@inheritdoc}
   * @return ProjectUserQuery the active query used by this AR class.
   */
  public static function find()
  {
    return new ProjectUserQuery(get_called_class());
  }
}
