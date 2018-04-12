<?php

use yii\db\Migration;

/**
 * Handles the creation of table `advantages`.
 */
class m180312_072056_create_advantages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('advantages', [
            'id' => $this->primaryKey(),
            'logo' => $this->string(255),
			'preview' => $this->string(255),
            'description' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('advantages');
    }
}
