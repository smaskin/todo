<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model \app\modules\todo\models\Todo */
/* @var $attribute string */

?>

<?= Html::checkbox($attribute, $model->completed, [
    'class' => 'updateTask',
    'data-url' => Url::to(['todo/default/update', 'id' => $model->id]),
]) ?>
