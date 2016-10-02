<?php

namespace app\modules\todo\models;

use yii\db\ActiveQuery;

/**
 * @property Todo[] children
 * @property Todo parent
 */
class Todo extends TodoBase
{
    const STATUS_ACTIVE = 0;
    const STATUS_COMPLETE = 1;

    public static function getFilters()
    {
        return [
            self::STATUS_ACTIVE => 'active',
            self::STATUS_COMPLETE => 'complete'
        ];
    }

    public static function getFilterName($status)
    {
        return static::getFilters()[$status];
    }

    /**
     * @return TodoQuery|ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(static::className(), ['parent_id' => 'id']);
    }

    /**
     * @return TodoQuery|ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(static::className(), ['id' => 'parent_id']);
    }

    public function beforeDelete()
    {
        parent::beforeDelete();
        foreach ($this->children as $child) {
            $child->delete();
        }
        return true;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if (!$insert && isset($changedAttributes['completed']) && $this->completed) {
            if(($parent = $this->parent) !== null && $parent->isChildrenComplete()){
                $parent->completed = static::STATUS_COMPLETE;
                $parent->save();
            }
            $this->completeChildren();
        }
    }

    protected function isChildrenComplete()
    {
        return $this->getChildren()->count() == $this->getChildren()->withStatus(self::STATUS_COMPLETE)->count();
    }

    protected function completeChildren()
    {
        foreach ($this->getChildren()->withStatus(self::STATUS_ACTIVE)->all() as $child) {
            $child->completed = static::STATUS_COMPLETE;
            $child->save();
        }
    }
}
