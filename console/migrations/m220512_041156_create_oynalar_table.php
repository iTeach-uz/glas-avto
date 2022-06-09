<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%oynalar}}`.
 */
class m220512_041156_create_oynalar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%oynalar}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%oynalar}}');
    }
}
