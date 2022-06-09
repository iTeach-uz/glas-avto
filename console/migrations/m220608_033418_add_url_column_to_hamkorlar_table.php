<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%hamkorlar}}`.
 */
class m220608_033418_add_url_column_to_hamkorlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%hamkorlar}}', 'url', $this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%hamkorlar}}', 'url');
    }
}
