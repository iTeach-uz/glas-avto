<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nomen_img}}`.
 */
class m220523_125049_create_nomen_img_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nomen_img}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
            'status' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nomen_img}}');
    }
}
