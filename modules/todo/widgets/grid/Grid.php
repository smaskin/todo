<?php

namespace app\modules\todo\widgets\grid;

use Yii;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use app\modules\todo\models\Todo;
use yii\widgets\Pjax;

class Grid extends GridView
{
    const MAX_NESTED_LEVEL = 3;

    public $summary = false;
    public $pager = false;
    public $showHeader = false;
    public $showOnEmpty = false;
    public $nestingLevel = 0;

    /**
     * @var null|Todo
     */
    public $parentModel = null;

    public function init()
    {
        $status = [Todo::STATUS_ACTIVE, Todo::STATUS_COMPLETE];
        if(($filter = Yii::$app->request->get('filter')) !== null && in_array($filter, Todo::getFilters())){
            $status = array_search($filter, Todo::getFilters());
        }

        $this->dataProvider = $this->parentModel === null
            ? new ArrayDataProvider(['allModels' => Todo::find()->roots()->withStatus($status)->all()])
            : new ActiveDataProvider(['query' => $this->parentModel->getChildren()->withStatus($status)]);

        $this->afterRow = function ($model) {
            return $this->childAllowed()
                ? $this->render('_childRow', ['model' => $model, 'nestingLevel' => $this->nestingLevel])
                : false;
        };
        GridAsset::register($this->view);
        parent::init();
    }

    public function run()
    {
        echo $this->nestingLevel == 0 ? $this->render('_filter') : '';
        echo $this->render('_newInput', ['parent' => $this->parentModel]);
        Pjax::begin(['id' => 'todo-grid-' . ($this->parentModel !== null ? $this->parentModel->id : 0)]);
        parent::run();
        Pjax::end();
    }


    protected function initColumns()
    {
        $this->columns = [
            ['class' => InputColumn::className()],
            ['class' => CheckBoxColumn::className()],
            ['class' => DeleteColumn::className()]
        ];
        $this->childAllowed() && array_unshift($this->columns, ['class' => ParentColumn::className()]);
        parent::initColumns();
    }

    private function childAllowed()
    {
        return $this->nestingLevel < self::MAX_NESTED_LEVEL;
    }
}