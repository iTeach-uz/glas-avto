<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tanlov}}`.
 */
class m220513_051817_create_tanlov_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tanlov}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string()->notNull(),
            'date' => $this->date(),
            'status' => $this->integer()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tanlov}}');
    }
}
