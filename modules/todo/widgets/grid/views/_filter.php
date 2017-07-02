<?php

use app\modules\todo\models\Todo;
use yii\helpers\Html;
use yii\helpers\Url;

$filterStatus = Yii::$app->request->get('filter');

?>
<div class="row" style="margin-bottom: 15px">
    <div class="col-lg-6">
        <div class="btn-group">
            <?= Html::a('All', Url::to(['', 'filter' => null]), ['class' => 'btn btn-default btn-sm' . ($filterStatus === null ? ' active' : '')]) ?>
            <?= Html::a('Active', Url::to(['', 'filter' => Todo::getFilterName(Todo::STATUS_ACTIVE)]), ['class' => 'btn btn-default btn-sm' . ($filterStatus == Todo::getFilterName(Todo::STATUS_ACTIVE) ? ' active' : '')]) ?>
            <?= Html::a('Complete', Url::to(['', 'filter' => Todo::getFilterName(Todo::STATUS_COMPLETE)]), ['class' => 'btn btn-default btn-sm' . ($filterStatus == Todo::getFilterName(Todo::STATUS_COMPLETE) ? ' active' : '')]) ?>
        </div>
    </div>
</div>
