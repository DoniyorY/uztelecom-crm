<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "worker_status".
 *
 * @property int $id
 * @property string|null $name_ru
 * @property string $name_uz
 * @property int $value
 */
class WorkerStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'worker_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {



        return [
            ['value', 'integer'],
            ['value', 'required'],
            [['name_uz'], 'required'],
            [['name_ru', 'name_uz'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Name Ru',
            'name_uz' => 'Name Uz',
        ];
    }
}
