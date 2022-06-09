<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%consumers}}`.
 */
class m220514_014331_create_consumers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%consumers}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%consumers}}');
    }
}
