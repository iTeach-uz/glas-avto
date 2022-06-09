<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hamkorlar}}`.
 */
class m220508_181002_create_hamkorlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hamkorlar}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
            'status' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%hamkorlar}}');
    }
}
