<?

/* @var $model \app\modules\todo\models\Todo */
/* @var $nestingLevel integer */

$nestingBackgrounds = [
    'info',
    'warning',
    'danger',
];

?>

</tr>
<tr class="collapse in <?= $nestingBackgrounds[$nestingLevel] ?>" id="collapse-<?= $model->id ?>">
    <td colspan="100%">
        <div class="box-body">
            <?= \app\modules\todo\widgets\grid\Grid::widget([
                'parentModel' => $model,
                'nestingLevel' => $nestingLevel + 1
            ]) ?>
        </div>
    </td>
