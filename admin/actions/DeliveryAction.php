<?php

namespace admin\modules\actions;

use admin\modules\models\Delivery;
use Yii;
use yii\base\Action;

class DeliveryAction extends Action
{
    public function run()
    {
        $id = Yii::$app->request->post('id');

        if ($model = Delivery::findOne($id)) {
            return $this->controller->renderAjax('delivery', [
                'model' => $model,
            ]);
        } else {
            return null;
        }
    }
}
