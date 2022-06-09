<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shoxa}}`.
 */
class m220509_065403_create_shoxa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shoxa}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shoxa}}');
    }
}
