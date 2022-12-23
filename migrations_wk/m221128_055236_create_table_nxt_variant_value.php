<?php

use yii\db\Migration;

class m221128_055236_create_table_nxt_variant_value extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%variant_value}}',
            [
                'variant_id' => $this->integer()->notNull(),
                'value_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%variant_value}}', ['variant_id', 'value_id']);

        $this->createIndex('fk-nxt_variant_value-value_id', '{{%variant_value}}', ['value_id']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%variant_value}}');
    }
}
