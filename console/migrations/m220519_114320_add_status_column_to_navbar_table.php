<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%navbar}}`.
 */
class m220519_114320_add_status_column_to_navbar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%navbar}}', 'status', $this->integer()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%navbar}}', 'status');
    }
}
