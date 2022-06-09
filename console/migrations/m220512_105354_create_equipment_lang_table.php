<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%equipment_lang}}`.
 */
class m220512_105354_create_equipment_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%equipment_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);
        
        $this->addForeignKey('equipment ni equipment_lang ga', 'equipment_lang', 'owner_id', 'equipment_lang', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%equipment_lang}}');
    }
}
