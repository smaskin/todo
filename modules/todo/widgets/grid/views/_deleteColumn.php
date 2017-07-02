<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model \app\modules\todo\models\Todo */

?>
<?= Html::a(
    '<i class="glyphicon glyphicon-trash"></i>',
    Url::to(['todo/default/delete', 'id' => $model->id]),
    ['class' => 'deleteTask']
) ?>
