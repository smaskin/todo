<?php

namespace app\modules\todo\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\modules\todo\models\Todo;

class DefaultController extends Controller
{
    public function actionCreate($parent)
    {
        if ($title = Yii::$app->request->post('title')) {
            $model = new Todo();
            $model->title = $title;
            $model->save();
            if ($parentModel = Todo::findOne($parent)) {
                $parentModel->link('children', $model);
            }
            return (int)$parent;
        }
        return false;
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $request = Yii::$app->request;
        if ($model->hasAttribute($request->post('name'))) {
            $model->{$request->post('name')} = $request->post('value');
            $model->save();
        }
        return 0;
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $parentId = $model->parent_id;
        $model->delete();
        return (int)$parentId;
    }

    private function findModel($id)
    {
        if (($model = Todo::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Not found');
    }
}
