<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shoxa_lang}}`.
 */
class m220509_065432_create_shoxa_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shoxa_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);

        $this->addForeignKey('shoxa ni shoxa_lang ga', 'shoxa_lang', 'owner_id', 'shoxa', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shoxa_lang}}');
    }
}
