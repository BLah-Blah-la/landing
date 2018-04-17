<?php

use yii\db\Migration;

/**
 * Handles the creation of table `logo`.
 */
class m180312_072023_create_logo_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('logo', [
            'id' => $this->primaryKey(),
            'logo_image' => $this->string(255),
			'preview' => $this->string(255),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('logo');
    }
}
