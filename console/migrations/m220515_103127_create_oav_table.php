<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%oav}}`.
 */
class m220515_103127_create_oav_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%oav}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
            'date' => $this->date(),
            'view_count' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%oav}}');
    }
}
