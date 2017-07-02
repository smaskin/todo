<?php

use yii\helpers\Html;

/* @var $model \app\modules\todo\models\Todo */

?>
<?= Html::button('', [
    'class' => 'btn btn-xs btn-default glyphicon glyphicon-chevron-down',
    'data-toggle' => 'collapse',
    'data-target' => '#collapse-' . $model->id
]) ?>
