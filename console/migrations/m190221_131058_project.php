<?php

use yii\db\Migration;

/**
 * Class m190221_131058_project
 */
class m190221_131058_project extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('project', [
        'id' => $this->primaryKey(),
        'title' => $this->string(255)->notNull(),
        'description' => $this->text()->notNull(),
        'active' => $this->boolean()->notNull()->defaultValue(0),
        'creator_id' => $this->integer()->notNull(),
        'updater_id' => $this->integer(),
        'created_at' => $this->integer()->notNull(),
        'updated_at' => $this->integer()
      ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

      $this->addForeignKey(
        'fx_project_user_creator',
        'project',
        ['creator_id'],
        'user',
        ['id']
      );

      $this->addForeignKey(
        'fx_project_user_updater',
        'project',
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
        'fx_project_user_creator',
        'project'
      );

      $this->dropForeignKey(
        'fx_project_user_updater',
        'project'
      );

      $this->dropTable('project');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190221_131058_project cannot be reverted.\n";

        return false;
    }
    */
}
