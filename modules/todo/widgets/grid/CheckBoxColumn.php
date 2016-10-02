<?php

namespace app\modules\todo\widgets\grid;

use yii\grid\Column;

class CheckBoxColumn extends Column
{
    public $attribute = 'completed';
    public $options = ['width' => '1%'];

    public function init()
    {
        parent::init();
        $this->content = function ($model) {
            return $this->grid->render('_checkBoxColumn', ['model' => $model, 'attribute' => $this->attribute]);
        };
    }
}