<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fotogalareya}}`.
 */
class m220509_020911_create_fotogalareya_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%fotogalareya}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
            'status' => $this->integer()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%fotogalareya}}');
    }
}
