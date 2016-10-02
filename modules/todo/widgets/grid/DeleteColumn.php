<?php

namespace app\modules\todo\widgets\grid;

use yii\grid\Column;

class DeleteColumn extends Column
{
    public $options = ['width' => '1%'];

    public function init()
    {
        parent::init();
        $this->content = function ($model) {
            return $this->grid->render('_deleteColumn', ['model' => $model]);
        };
    }
}