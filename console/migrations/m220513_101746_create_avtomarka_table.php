<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%avtomarka}}`.
 */
class m220513_101746_create_avtomarka_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%avtomarka}}', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%avtomarka}}');
    }
}
