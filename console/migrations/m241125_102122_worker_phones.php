<?php

use yii\db\Migration;

/**
 * Class m241125_102122_worker_phones
 */
class m241125_102122_worker_phones extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('worker_phones', [
            'id' => $this->primaryKey(),
            'worker_id' => $this->integer()->notNull(),
            'phone' => $this->string()->notNull(),
            'created'=>$this->integer()->notNull(),
            'status'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241125_102122_worker_phones cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241125_102122_worker_phones cannot be reverted.\n";

        return false;
    }
    */
}
