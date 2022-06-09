<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m220508_121709_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
            'view_count' => $this->integer()->defaultValue(0),
            'date' => $this->date(),
            'status' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
