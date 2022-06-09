<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%oynalar_lang}}`.
 */
class m220512_041230_create_oynalar_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%oynalar_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);
        
        $this->addForeignKey('oynalar ni oynalar_lang ga', 'oynalar_lang', 'owner_id', 'oynalar', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%oynalar_lang}}');
    }
}
