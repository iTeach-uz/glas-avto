<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%company}}`.
 */
class m220514_130225_create_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
            'number1' => $this->string(255)->notNull(),
            'number2' => $this->string(255)->notNull(),
            'number3' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%company}}');
    }
}
