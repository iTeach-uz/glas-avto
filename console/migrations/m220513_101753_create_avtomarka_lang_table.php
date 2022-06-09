<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%avtomarka_lang}}`.
 */
class m220513_101753_create_avtomarka_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%avtomarka_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
        ]);
        
        $this->addForeignKey('avtomarka ni avtomarka_lang ga', 'avtomarka_lang', 'owner_id', 'avtomarka', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%avtomarka_lang}}');
    }
}
