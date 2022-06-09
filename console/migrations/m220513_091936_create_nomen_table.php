<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nomen}}`.
 */
class m220513_091936_create_nomen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nomen}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
            'model' => $this->string(255)->notNull(),
            'number' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nomen}}');
    }
}
