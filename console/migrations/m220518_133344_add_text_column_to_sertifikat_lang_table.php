<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%sertifikat_lang}}`.
 */
class m220518_133344_add_text_column_to_sertifikat_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%sertifikat_lang}}', 'text', $this->text()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%sertifikat_lang}}', 'text');
    }
}
