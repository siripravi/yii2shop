<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 25.03.17
 * Time: 13:27
 */

namespace app\widgets;

use app\models\Review;
use common\modules\products\models\Product;
use yii\base\Widget;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
class HomeProductCard extends Widget
{
    /**
     * @var $model Product
     */
    public $product_ids = [129,140,148];

    public $link;

    public function init()
    {
        $this->link = Url::to($this->link);
    }

    public function run()
    {
		$query = Product::find();
        $query->joinWith(['categories']);
        $query->andWhere(['nxt_product.enabled' => true]);
        $query->andWhere(['nxt_product.id' => $this->product_ids]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => [
                    'position' => SORT_DESC,
                ],
            ],
            'pagination' => [
                'forcePageParam' => false,
                'pageSizeParam' => false,
                'pageSize' => 12,
            ],
        ]);
		//$model = Product::find()->where(['id' => $this->product_ids])->all();
			
		 return $this->render('homeProducts', [
				'dataProvider' => $dataProvider,
			   // 'images' => $items
			]);
	}

}