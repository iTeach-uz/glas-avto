<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%oav_lang}}`.
 */
class m220515_103205_create_oav_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%oav_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
        ]);

        
        $this->addForeignKey('oav ni oav_lang ga', 'oav_lang', 'owner_id', 'oav', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%oav_lang}}');
    }
}
