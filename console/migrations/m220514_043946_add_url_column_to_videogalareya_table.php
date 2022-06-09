<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%videogalareya}}`.
 */
class m220514_043946_add_url_column_to_videogalareya_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%videogalareya}}', 'url', $this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%videogalareya}}', 'url');
    }
}
