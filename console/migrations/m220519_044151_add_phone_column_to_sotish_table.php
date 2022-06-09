<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%sotish}}`.
 */
class m220519_044151_add_phone_column_to_sotish_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%sotish}}', 'phone', $this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%sotish}}', 'phone');
    }
}
