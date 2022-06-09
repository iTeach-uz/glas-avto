<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%muvofiq_lang}}`.
 */
class m220510_130240_create_muvofiq_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%muvofiq_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);

        
        $this->addForeignKey('muvofiq ni muvofiq_lang ga', 'muvofiq_lang', 'owner_id', 'muvofiq', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%muvofiq_lang}}');
    }
}
