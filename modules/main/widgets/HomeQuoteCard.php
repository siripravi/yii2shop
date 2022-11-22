<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 25.03.17
 * Time: 13:27
 */

namespace app\modules\main\widgets;

use app\modules\main\models\Review;
use yii\base\Widget;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;

class HomeQuoteCard extends Widget
{
    /**
     * @var $model Product
     */
   

    public $link;

    public function init()
    {
        $this->link = Url::to($this->link);
    }

    public function run()
    {		
        $review = Review::find()
                ->where(['status' => Review::STATUS_PUBLISHED])
                ->andWhere(['product_id' => null])
                ->orderBy(['id' => SORT_DESC])
                ->limit(5)
                ->all();
		 return $this->render('homeQuotes', [
				'quote' => $review,
			   // 'images' => $items
			]);
	}

}