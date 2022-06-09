<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%map}}`.
 */
class m220520_042506_create_map_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%map}}', [
            'id' => $this->primaryKey(),
            'map' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%map}}');
    }
}
