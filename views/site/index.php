<?php

/* @var $this yii\web\View */

$this->title = 'Todo list Application';
?>
<div class="site-index">
    <div class="body-content">
        <?php echo \app\modules\todo\widgets\grid\Grid::widget() ?>
    </div>
</div>
