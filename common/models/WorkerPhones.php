<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "worker_phones".
 *
 * @property int $id
 * @property int $worker_id
 * @property string $phone
 * @property int $created
 * @property int $status
 */
class WorkerPhones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'worker_phones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['worker_id', 'phone', 'created', 'status'], 'required'],
            [['worker_id', 'created', 'status'], 'integer'],
            [['phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'worker_id' => 'Worker ID',
            'phone' => 'Phone',
            'created' => 'Created',
            'status' => 'Status',
        ];
    }
}
