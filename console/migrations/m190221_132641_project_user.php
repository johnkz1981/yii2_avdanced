<?php

use yii\db\Migration;

/**
 * Class m190221_132641_project_user
 */
class m190221_132641_project_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('project_user', [
        'id' => $this->primaryKey(),
        'project_id' => $this->integer()->notNull(),
        'user_id' => $this->integer()->notNull(),
        'role' => "enum('manager', 'developer', 'tester')"
      ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

      $this->addForeignKey(
        'fx_project-user_user',
        'project_user',
        ['user_id'],
        'user',
        ['id']
      );

      $this->addForeignKey(
        'fx_project-user_project',
        'project_user',
        ['project_id'],
        'project',
        ['id']
      );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropForeignKey(
        'fx_project-user_user',
        'project_user'
      );

      $this->dropForeignKey(
        'fx_project-user_project',
        'project_user'
      );

      $this->dropTable('project_user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190221_132641_project_user cannot be reverted.\n";

        return false;
    }
    */
}
