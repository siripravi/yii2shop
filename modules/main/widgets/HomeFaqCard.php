<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 25.03.17
 * Time: 13:27
 */

namespace app\modules\main\widgets;

use app\modules\main\models\Question;
use yii\base\Widget;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;

class HomeFaqCard extends Widget
{
    /**
     * @var $model Product
     */
    public $product_ids = [121,122,123];

    public $link;

    public function init()
    {
        $this->link = Url::to($this->link);
    }

    public function run()
    {		
        $question = Question::find()
                ->where(['status' => Question::STATUS_PUBLISHED])
                ->orderBy(['id' => SORT_DESC])
                ->limit(5)
                ->all();
		 return $this->render('homeFaqs', [
				'question' => $question,
			   // 'images' => $items
			]);
	}

}