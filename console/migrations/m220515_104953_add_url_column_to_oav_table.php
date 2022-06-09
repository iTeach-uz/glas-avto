<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%oav}}`.
 */
class m220515_104953_add_url_column_to_oav_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%oav}}', 'url', $this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%oav}}', 'url');
    }
}
