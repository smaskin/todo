<?

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model \app\modules\todo\models\Todo */
/* @var $attribute string */

?>

<?= Html::input('text', $attribute, $model->{$attribute}, [
    'class' => 'updateTask form-control',
    'data-url' => Url::to(['todo/default/update', 'id' => $model->id]),
]) ?>
