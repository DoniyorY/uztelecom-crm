<?php

use yii\db\Migration;

/**
 * Class m241125_101919_departaments
 */
class m241125_101919_departaments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('departments', [
            'id' => $this->primaryKey(),
            'company_id'=>$this->integer()->notNull(),
            'name_ru'=>$this->string()->null(),
            'name_uz'=>$this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241125_101919_departaments cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241125_101919_departaments cannot be reverted.\n";

        return false;
    }
    */
}
