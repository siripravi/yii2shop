<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 12.03.17
 * Time: 15:45
 */

namespace app\modules\main\widgets;
use yii;
use yii\bootstrap5\Nav;
class NavBar extends  \yii\base\Widget
{
	/**
	 * Brand the Navbar with two options: label and url
	*/
	public $brand = [];

	/**
	 * The actual navigation links
	 * Array with labe; and url
	*/
	public $links = [];

	/**
	 * Navigation Theme color
	*/
	public $theme; 


	public function init()
	{
		parent::init();

		if(!isset($this->brand['label']))
			$this->brand['label'] = Yii::$app->name;

		if(!isset($this->brand['url']))
			$this->brand['url'] = Yii::$app->homeUrl;

		if(empty($this->theme))
			$this->theme = 'default';
		else
			$this->theme = "ct-{$this->theme}";
	}

	
    public function run()
    {
    	//MainAsset::register($this->getView()); 

    	\yii\bootstrap5\NavBar::begin([
                'brandLabel' =>isset($this->brand['logo']) ? 
                        Html::img($this->brand['logo'], ['class'=>'pull-left img-responsive', 'style'=>'height:32px;padding-right:5px']).$this->brand['label'] :
                        $this->brand['label']    ,
                'brandUrl' => $this->brand['url'],
                'options' => [
                    'class' => "navbar navbar-{$this->theme} navbar-fixed",
                ],
                'innerContainerOptions'=>[
                	'tag'=>'div',
                	'class'=>'contrainer-fluid'
                ]
            ]);

    		echo Nav::widget([
			      'encodeLabels' => false,
    			'options' => ['class' => 'nav navbar-nav navbar-right'],
    			'items' => $this->links
    		]);

    	\yii\bootstrap5\NavBar::end();
    }
}