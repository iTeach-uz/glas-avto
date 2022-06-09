<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sifat}}`.
 */
class m220509_124320_create_sifat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sifat}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sifat}}');
    }
}
