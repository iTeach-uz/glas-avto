<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%equipment}}`.
 */
class m220512_105341_create_equipment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%equipment}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%equipment}}');
    }
}
