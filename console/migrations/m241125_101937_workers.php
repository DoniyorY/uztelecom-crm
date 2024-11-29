<?php

use yii\db\Migration;

/**
 * Class m241125_101937_workers
 */
class m241125_101937_workers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('workers', [
            'id' => $this->primaryKey(),
            'department_id' => $this->integer()->notNull(),
            'company_id'=>$this->integer()->notNull(),
            'fullname_ru'=>$this->string()->null(),
            'fullname_uz'=>$this->string()->notNull(),
            'phone'=>$this->string()->notNull(),
            'birthday'=>$this->date()->notNull(),
            'passport_series'=>$this->string()->notNull(),
            'passport_pinfl'=>$this->string()->notNull(),
            'passport_address'=>$this->string()->notNull(),
            'passport_end_date'=>$this->date()->notNull(),
            'address_ru'=>$this->string()->null(),
            'address_uz'=>$this->string()->notNull(),
            'image'=>$this->string()->null(),
            'created'=>$this->integer()->notNull(),
            'updated'=>$this->integer()->notNull(),
            'status'=>$this->integer()->notNull(),
            'worker_status_id'=>$this->integer()->notNull(),
            'stavka_id'=>$this->integer()->notNull(),
            'position_id'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241125_101937_workers cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241125_101937_workers cannot be reverted.\n";

        return false;
    }
    */
}
