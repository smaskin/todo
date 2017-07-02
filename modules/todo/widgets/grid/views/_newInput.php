<?php

use yii\bootstrap\Html;
use yii\helpers\Url;

/* @var $parent \app\modules\todo\models\Todo */

?>
<div class="row" style="margin-bottom: 15px">
    <div class="col-lg-6">
        <?= Html::input('text', null, null, [
            'class' => 'newTask form-control',
            'data-url' => Url::to(['todo/default/create', 'parent' => $parent !== null ? $parent->id : '']),
            'placeholder' => 'Enter new task...'
        ]) ?>
    </div>
</div>
