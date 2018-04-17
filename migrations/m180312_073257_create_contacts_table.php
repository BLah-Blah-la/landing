<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contacts`.
 */
class m180312_073257_create_contacts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('contacts', [
            'id' => $this->primaryKey(),
            'image_item' => $this->string(255),
            'dynamic_string' => $this->string(255),
			'preview' => $this->string(255),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('contacts');
    }
}
