<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%select}}`.
 */
class m220513_045247_create_select_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%select}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%select}}');
    }
}
