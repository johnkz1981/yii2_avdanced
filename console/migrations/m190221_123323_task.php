<?php

use yii\db\Migration;

/**
 * Class m190221_123323_task
 */
class m190221_123323_task extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

    $this->createTable('task', [
      'id' => $this->primaryKey(),
      'title' => $this->string(255)->notNull(),
      'description' => $this->text()->notNull(),
      'project_id' => $this->integer(),
      'executor_id' => $this->integer(),
      'started_at' => $this->integer(),
      'completed_at' => $this->integer(),
      'creator_id' => $this->integer()->notNull(),
      'updater_id' => $this->integer(),
      'created_at' => $this->integer()->notNull(),
      'updated_at' => $this->integer()
    ], $tableOptions);

    $this->addForeignKey(
      'fx_task_user_executor',
      'task',
      ['executor_id'],
      'user',
      ['id']
    );

    $this->addForeignKey(
      'fx_task_user_creator',
      'task',
      ['creator_id'],
      'user',
      ['id']
    );

    $this->addForeignKey(
      'fx_task_user_updater',
      'task',
      ['updater_id'],
      'user',
      ['id']
    );
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropForeignKey(
      'fx_task_user_executor',
      'task'
    );

    $this->dropForeignKey(
      'fx_task_user_creator',
      'task'
    );

    $this->dropForeignKey(
      'fx_task_user_updater',
      'task'
    );

    $this->dropTable('task');
  }

  /*
  // Use up()/down() to run migration code without a transaction.
  public function up()
  {

  }

  public function down()
  {
      echo "m190221_123323_task cannot be reverted.\n";

      return false;
  }
  */
}
