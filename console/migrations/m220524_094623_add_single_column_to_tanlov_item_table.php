<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%tanlov_item}}`.
 */
class m220524_094623_add_single_column_to_tanlov_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tanlov_item}}', 'single', $this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tanlov_item}}', 'single');
    }
}
