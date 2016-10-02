<?php

namespace app\modules\todo\widgets\grid;

use yii\web\AssetBundle;

class GridAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/todo/widgets/grid/assets';

    public $js = [
        'js/todo-grid.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}