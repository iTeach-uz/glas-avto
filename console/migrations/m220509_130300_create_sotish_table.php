<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sotish}}`.
 */
class m220509_130300_create_sotish_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sotish}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sotish}}');
    }
}
