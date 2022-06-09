<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%biz_haq_lang}}`.
 */
class m220509_011414_create_biz_haq_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%biz_haq_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'top_title' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);

        
        $this->addForeignKey('biz_haq ni biz_haq_lang ga', 'biz_haq_lang', 'owner_id', 'biz_haq', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%biz_haq_lang}}');
    }
}
