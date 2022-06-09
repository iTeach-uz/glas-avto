<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rahbaryat_lang}}`.
 */
class m220509_101758_create_rahbaryat_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rahbaryat_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'job' => $this->string(255)->notNull(),
        ]);

        
        $this->addForeignKey('rahbaryat ni rahbaryat_lang ga', 'rahbaryat_lang', 'owner_id', 'rahbaryat', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rahbaryat_lang}}');
    }
}
