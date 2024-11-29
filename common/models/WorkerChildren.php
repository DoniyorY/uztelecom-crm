<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "worker_children".
 *
 * @property int $id
 * @property int $worker_id
 * @property string $fullname
 * @property int $birthday
 * @property int $created
 * @property int $status
 */
class WorkerChildren extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'worker_children';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['worker_id', 'fullname', 'birthday', 'created', 'status'], 'required'],
            [['worker_id', 'birthday', 'created', 'status'], 'integer'],
            [['fullname'], 'string', 'max' => 255],
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
            'fullname' => 'Fullname',
            'birthday' => 'Birthday',
            'created' => 'Created',
            'status' => 'Status',
        ];
    }
}
