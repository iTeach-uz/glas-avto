<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%sotish}}`.
 */
class m220519_044305_add_email_column_to_sotish_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%sotish}}', 'email', $this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%sotish}}', 'email');
    }
}
