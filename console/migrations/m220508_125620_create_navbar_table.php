<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%navbar}}`.
 */
class m220508_125620_create_navbar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%navbar}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string()->notNull(),
            'tel_namber' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%navbar}}');
    }
}
