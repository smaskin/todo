<?php

namespace app\modules\todo\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Todo]].
 */
class TodoQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function roots()
    {
        return $this->andWhere(['parent_id' => null]);
    }

    /**
     * @param $value array|integer
     * @return $this
     */
    public function withStatus($value)
    {
        return $this->andWhere(['completed' => $value]);
    }
}
