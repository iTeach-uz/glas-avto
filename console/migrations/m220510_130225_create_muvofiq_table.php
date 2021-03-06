<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%muvofiq}}`.
 */
class m220510_130225_create_muvofiq_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%muvofiq}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%muvofiq}}');
    }
}
