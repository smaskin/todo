<?php

namespace app\modules\todo\widgets\grid;

use yii\grid\Column;

class InputColumn extends Column
{
    public $attribute = 'title';

    public function init()
    {
        parent::init();
        $this->content = function ($model){
            return $this->grid->render('_inputColumn', ['model' => $model, 'attribute' => $this->attribute]);
        };
    }
}