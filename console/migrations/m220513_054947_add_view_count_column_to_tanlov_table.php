<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%tanlov}}`.
 */
class m220513_054947_add_view_count_column_to_tanlov_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tanlov}}', 'view_count', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tanlov}}', 'view_count');
    }
}
