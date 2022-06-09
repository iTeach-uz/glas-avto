<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%works_lang}}`.
 */
class m220514_001448_create_works_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%works_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title1' => $this->string(255)->notNull(),
            'content1' => $this->string(255)->notNull(),
            'title2' => $this->string(255)->notNull(),
            'content2' => $this->string(255)->notNull(),
            'title3' => $this->string(255)->notNull(),
            'content3' => $this->string(255)->notNull(),
        ]);
        
        $this->addForeignKey('works ni works_lang ga', 'works_lang', 'owner_id', 'works', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%works_lang}}');
    }
}
