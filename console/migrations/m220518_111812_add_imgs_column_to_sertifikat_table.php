<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%sertifikat}}`.
 */
class m220518_111812_add_imgs_column_to_sertifikat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%sertifikat}}', 'imgs', $this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%sertifikat}}', 'imgs');
    }
}
