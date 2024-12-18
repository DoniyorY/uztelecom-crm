<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "worker_files".
 *
 * @property int $id
 * @property int $worker_id
 * @property string|null $name_ru
 * @property string $name_uz
 * @property string $image
 * @property int $created
 * @property int $status
 */
class WorkerFiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'worker_files';
    }

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['worker_id', 'name_uz', 'image', 'created', 'status'], 'required'],
            [['worker_id', 'created', 'status'], 'integer'],
            [['name_ru', 'name_uz', 'image'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => 'jpg, pdf, png', 'skipOnEmpty' => true],
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
            'name_ru' => 'Название на русском',
            'name_uz' => 'Название на узбекском',
            'image' => 'Документ',
            'created' => 'Дата создания',
            'status' => 'Статус',
        ];
    }
}
