<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mahalliy}}`.
 */
class m220509_115330_create_mahalliy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mahalliy}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mahalliy}}');
    }
}
