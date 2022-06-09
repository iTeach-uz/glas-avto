<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%videogalareya}}`.
 */
class m220509_132452_create_videogalareya_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%videogalareya}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%videogalareya}}');
    }
}
