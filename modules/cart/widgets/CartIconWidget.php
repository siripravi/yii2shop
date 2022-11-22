<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 20.01.18
 * Time: 14:02
 */

namespace app\modules\cart\widgets;

use app\modules\cart\models\Cart;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

class CartIconWidget extends Widget
{
    public $id = 'cart-icon';

    public $options = [];

    public $urlCart = ['/bag/index'];

    public $iconOptions = ['class' => 'fas fa-cart'];

    public $linkOptions = [];

    public function run()
    {
        $cart = Cart::getCart();

        $this->registerClientScript();

        $options = [
            'id' => $this->id,
            'class' => 'cart-icon',
        ];

        $optionsClass = ArrayHelper::remove($this->options, 'class');

        $options = array_merge($options, $this->options);

        Html::addCssClass($options, $optionsClass);

        $count = 0;

        foreach ($cart as $c) {
            $count += $c;
        }

        if ($count) {
            $count = '<span class="cart-count">' . $count . '</span>';
        } else {
            return Html::tag('span', null, $options);
        }

        return Html::tag('span', Html::a(
            Html::tag('i', null,
                $this->iconOptions
            ) . $count, $this->urlCart, $this->linkOptions), $options);
    }

    private function registerClientScript()
    {
        $url = Url::to(['/bag/icon']);
        $js = <<< JS
        function reloadCartIcon() {
            $.get('{$url}', function(data) {
                $('#{$this->id}').after(data).remove();
            });
        }
        JS;
        //$this->view->registerJs($js);
    }
}