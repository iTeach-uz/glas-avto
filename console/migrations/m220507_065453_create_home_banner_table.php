<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%home_banner}}`.
 */
class m220507_065453_create_home_banner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%home_banner}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%home_banner}}');
    }
}
