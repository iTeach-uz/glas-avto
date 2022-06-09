<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%yoshlar_lang}}`.
 */
class m220511_101857_create_yoshlar_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%yoshlar_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->string(255)->notNull(),
        ]);
        
        $this->addForeignKey('yoshlar ni yoshlar_lang ga', 'yoshlar_lang', 'owner_id', 'yoshlar', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%yoshlar_lang}}');
    }
}
