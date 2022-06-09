<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%afzal_lang}}`.
 */
class m220508_043044_create_afzal_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%afzal_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNUll(),
            'title' => $this->string(255)->notNull(),
        ]);

        
        $this->addForeignKey('afzal ni afzal_lang ga', 'afzal_lang', 'owner_id', 'afzal', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%afzal_lang}}');
    }
}
