<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nomen_lang}}`.
 */
class m220513_094323_create_nomen_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nomen_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
        ]);
        
        $this->addForeignKey('nomen ni nomen_lang ga', 'nomen_lang', 'owner_id', 'nomen', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nomen_lang}}');
    }
}
