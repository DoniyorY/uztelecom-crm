<?php

use yii\db\Migration;

/**
 * Class m241125_102128_worker_files
 */
class m241125_102128_worker_files extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('worker_files', [
            'id' => $this->primaryKey(),
            'worker_id' => $this->integer()->notNull(),
            'name_ru' => $this->string()->null(),
            'name_uz' => $this->string()->notNull(),
            'image' => $this->string()->notNull(),
            'created' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241125_102128_worker_files cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241125_102128_worker_files cannot be reverted.\n";

        return false;
    }
    */
}
