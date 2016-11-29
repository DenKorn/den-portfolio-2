<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "common_info".
 *
 * @property integer $id
 * @property string $info_header
 * @property string $info_content
 */
class CommonInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'common_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['info_header'], 'required'],
            [['info_content'], 'string'],
            [['info_header'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'info_header' => 'Info Header',
            'info_content' => 'Info Content',
        ];
    }
}
