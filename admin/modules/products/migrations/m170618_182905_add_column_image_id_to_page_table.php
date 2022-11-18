<?php

use yii\db\Migration;

class m170618_182905_add_column_image_id_to_page_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('nxt_page', 'image_id', 'integer');

        $this->createIndex('idx-page-image_id','nxt_page', 'image_id');

        $this->addForeignKey('fk-page-image_id', 'nxt_page', 'image_id', 'image', 'id', 'SET NULL');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-page-image_id', 'nxt_page');

        $this->dropIndex('idx-page-image_id', 'nxt_page');

        $this->dropColumn('nxt_page', 'image_id');
    }
}
