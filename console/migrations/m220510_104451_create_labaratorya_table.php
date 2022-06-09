<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%labaratorya}}`.
 */
class m220510_104451_create_labaratorya_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%labaratorya}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%labaratorya}}');
    }
}
