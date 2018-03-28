<?php

use yii\db\Migration;

/**
 * Handles the creation of table `titles`.
 */
class m180312_074339_create_titles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('titles', [
            'id' => $this->primaryKey(),
            'section' => $this->string(50),
			'text' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('titles');
    }
}
