<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "worker_availability".
 *
 * @property int $id
 * @property int $worker_id
 * @property int $type_id
 * @property int $day_start
 * @property int $day_end
 * @property string $content
 * @property string|null $image
 * @property int $created
 */
class WorkerAvailability extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'worker_availability';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['worker_id', 'type_id', 'day_start', 'day_end', 'content', 'created'], 'required'],
            [['worker_id', 'type_id', 'day_start', 'day_end', 'created'], 'integer'],
            [['content'], 'string'],
            [['image'], 'string', 'max' => 255],
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
            'type_id' => 'Type ID',
            'day_start' => 'Day Start',
            'day_end' => 'Day End',
            'content' => 'Content',
            'image' => 'Image',
            'created' => 'Created',
        ];
    }
}
