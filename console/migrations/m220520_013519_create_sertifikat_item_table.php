<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sertifikat_item}}`.
 */
class m220520_013519_create_sertifikat_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sertifikat_item}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
            'category_id' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(1),
        ]);

        
        
        $this->addForeignKey('sertifikat ni sertifikat_item ga', 'sertifikat_item', 'category_id', 'sertifikat', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sertifikat_item}}');
    }
}
