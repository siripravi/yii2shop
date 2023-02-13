<?php
  use yii\helpers\Url;
  use kartik\typeahead\Typeahead;
  use yii\web\JsExpression;
  use yii\bootstrap5\ActiveForm;
?>
 <form action="<?= Url::to(['/search']) ?>" class="input-group">
                    <?php
                    $template = '<a href="{{link}}">{{value}}</a>';
                    echo Typeahead::widget([
                        'id' => 'search',
                        'name' => 'query',
                        'value' => Yii::$app->request->get('query'),
                        'container' => [
                            'style' => 'flex: 1;',
                        ],
                        'options' => [
                            'placeholder' => Yii::t('app', 'Enter the name of the product'),
                            'style' => 'border-bottom-right-radius: 0; border-top-right-radius: 0; font-size: 1rem;',
                        ],
                        'pluginOptions' => [
                            'highlight' => true,
                        ],
                        'dataset' => [
                            [
                                'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
                                'display' => 'value',
                                'templates' => [
                                    'notFound' => '<div class="text-danger" style="padding:0 8px">' . Yii::t('app', 'No results were found for this request.') . '</div>',
                                    'suggestion' => new JsExpression("Handlebars.compile('{$template}')"),
                                ],
                                'remote' => [
                                    'url' => Url::to(['/search/list']) . '?q=%QUERY',
                                    'wildcard' => '%QUERY',
                                    'cache' => false,
                                ],
                                'limit' => 10
                            ]
                        ]
                    ]);
                    ?>
                    <span class="input-group-append">
                        <button class="ps-2 btn btn-outline bg-info round-circle border-2" type="submit">
                        <img src="/image/site/search.svg">
                        </button>
                    </span>
                </form>