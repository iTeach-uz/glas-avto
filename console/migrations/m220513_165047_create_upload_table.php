<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%upload}}`.
 */
class m220513_165047_create_upload_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%upload}}', [
            'id' => $this->primaryKey(),
            'file' => $this->string(255)->notNull(),
            'status' => $this->integer()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%upload}}');
    }
}
