<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rahbaryat}}`.
 */
class m220509_101752_create_rahbaryat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rahbaryat}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
            'fullname' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'status' => $this->integer()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rahbaryat}}');
    }
}
