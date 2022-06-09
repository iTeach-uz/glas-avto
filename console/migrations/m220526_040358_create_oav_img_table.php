<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%oav_img}}`.
 */
class m220526_040358_create_oav_img_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%oav_img}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%oav_img}}');
    }
}
