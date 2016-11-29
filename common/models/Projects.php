<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $sort_order
 * @property string $complete_date
 * @property string $link
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['sort_order'], 'integer'],
            [['complete_date'], 'safe'],
            [['title'], 'string', 'max' => 50],
            [['link'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'sort_order' => 'Sort Order',
            'complete_date' => 'Complete Date',
            'link' => 'Link',
        ];
    }
}
