<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tashkilot}}`.
 */
class m220509_040514_create_tashkilot_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tashkilot}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tashkilot}}');
    }
}
