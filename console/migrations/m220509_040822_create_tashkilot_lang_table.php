<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tashkilot_lang}}`.
 */
class m220509_040822_create_tashkilot_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tashkilot_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);

        
        $this->addForeignKey('tashkilot ni tashkilot_lang ga', 'tashkilot_lang', 'owner_id', 'tashkilot', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tashkilot_lang}}');
    }
}
