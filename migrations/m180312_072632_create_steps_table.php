<?php

use yii\db\Migration;

/**
 * Handles the creation of table `steps`.
 */
class m180312_072632_create_steps_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('steps', [
            'id' => $this->primaryKey(),
            'title_item' => $this->string(30),
            'description' => $this->text(),
            'image' => $this->string(50),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('steps');
    }
}
