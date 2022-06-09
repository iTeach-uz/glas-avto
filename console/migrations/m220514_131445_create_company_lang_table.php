<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%company_lang}}`.
 */
class m220514_131445_create_company_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%company_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'block_title1' => $this->string(255)->notNull(),
            'block_title2' => $this->string(255)->notNull(),
            'block_title3' => $this->string(255)->notNull(),
        ]);

        
        $this->addForeignKey('company ni company_lang ga', 'company_lang', 'owner_id', 'company', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%company_lang}}');
    }
}
