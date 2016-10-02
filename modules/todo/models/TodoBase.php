<?php

namespace app\modules\todo\models;

use Yii;

/**
 * This is the model class for table "todo".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property boolean $completed
 */
class TodoBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'todo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['completed'], 'boolean'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'title' => Yii::t('app', 'Title'),
            'completed' => Yii::t('app', 'Completed'),
        ];
    }

    /**
     * @inheritdoc
     * @return TodoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TodoQuery(get_called_class());
    }
}
