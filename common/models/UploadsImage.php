<?php

namespace common\models;

use yii\base\Model;
use yii\web\HttpException;

class UploadsImage extends Model
{
    /**
     * Upload model
     *
     * @property object $getModel // Any model
     * @property object $uploadedFile //UploadedFile::getInstance($model, 'attr')
     * @property string $pathName // Image Path Directory
     * @return string Name of Uploaded File
     */


    public static function uploadImage($getModel, $uploadedFile, $pathName)
    {

        $model = $getModel;
        if (!$model) {
            throw new HttpException(500, 'Object is not found!');
        }

        if ($uploadedFile && $uploadedFile->tempName) {
            $model->imageFile = $uploadedFile;
            if ($model->validate(['file'])) {
                $dir = \Yii::getAlias("@frontend/web/uploads/$pathName/");
                if (!file_exists($dir)) {     //check if dir already exists
                    mkdir($dir, 0777, true);  //make dir, give permissions
                }
                $name = time();
                $fileName = $pathName . '_' . date('d.m.Y.H.i.s',$name) . '.' . $model->imageFile->extension;
                $model->imageFile->saveAs($dir . $fileName);
                $model->imageFile = $fileName;
                return $fileName;
            }
        } else {
            throw new HttpException(500, 'Can not find uploaded file');
        }

    }
}