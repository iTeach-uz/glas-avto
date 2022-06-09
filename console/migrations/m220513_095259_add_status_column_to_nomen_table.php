<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%nomen}}`.
 */
class m220513_095259_add_status_column_to_nomen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%nomen}}', 'status', $this->integer()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%nomen}}', 'status');
    }
}
