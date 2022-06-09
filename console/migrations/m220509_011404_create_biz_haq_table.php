<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%biz_haq}}`.
 */
class m220509_011404_create_biz_haq_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%biz_haq}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%biz_haq}}');
    }
}
