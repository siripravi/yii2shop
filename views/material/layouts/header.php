<header class="header f-nav">
    <div class="container">
	   <nav class="navbar navbar-expand-md bg-gradient-dark navbar-dark navbar-top">
        <div class="container px-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-top" aria-controls="navbar-top" aria-expanded="false" aria-label="Toggle navigation">
                <i></i>
                <i></i>
                <i></i>
            </button>
            <div class="collapse navbar-collapse" id="navbar-top">
                <div class="container">
                    <div class="navbar navbar-light bg-light">
                    <?php
                    /** @var Page[] $info */
                    $info = Page::find()
                        ->joinWith('translation')
                        ->leftJoin('nxt_page_parent','nxt_page.id = nxt_page_parent.page_id')
                        ->select(['name', 'slug'])
                        ->andWhere(['parent_id' => 6])
                        ->orderBy(['nxt_page.position' => SORT_ASC])
                        ->limit(5)
                        ->all();

                    $info_menu = [];

                    foreach ($info as $item) {
                        $info_menu[] = [
                            'label' => $item->name,
                            'url' => ['/info/view', 'slug' => $item->slug],
                        ];
                    }

                    $items = [
                        [
                            'label' => Yii::t('app', 'Home'),
                            'url' => ['/'],
                            'active' => in_array(Yii::$app->controller->id, ['site']) && in_array(Yii::$app->controller->action->id, ['index']),
                            /*'linkOptions' => [
                                'class' => in_array(Yii::$app->controller->id, ['site']) && in_array(Yii::$app->controller->action->id, ['index']) ? 'nav-item nav-link ml-3' : 'nav-item nav-link',
                            ],*/
                        ],
                        [
                            'label' => Yii::t('app', 'Catalog'),
                            'url' => ['/category/index'],
                            'active' => in_array(Yii::$app->controller->id, ['category', 'product']),
                        ],
                        ['label' => Yii::t('app', 'Find product'), 'url' => ['/podbor/index']],
                        ['label' => Yii::t('app', 'How to order'), 'url' => ['/site/how']],
                        ['label' => Yii::t('app', 'Questions and answers'), 'url' => ['/site/questions']],
                        [
                            'label' => Yii::t('app', 'Information for clients'),
                            'url' => ['/info/index'],
                            'items' => $info_menu,
                            'dropDownOptions' => [
                                'class' => '',
                            ],
                        ],
                        ['label' => Yii::t('app', 'Contacts'), 'url' => ['/site/contacts']],
                        ['label' => Yii::t('app', 'Reviews'), 'url' => ['/site/reviews']],
                    ];
                    echo Nav::widget([
                        'items' => $items,
                        'activeClass' => 'active bg-gradient-primary',
                        'linkOptions' => [
                            'class' => 'nav-item nav-link',
                        ],
                    ]);
                    ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </nav>
        <div class="row pb-1 pb-md-3 pt-3">
            <div class="col-auto">
                <a href="<?= Url::to(['/']) ?>"><img src="/img/light-logo.png" class="logo"></a>
            </div>
            <div class="col-1 d-none d-lg-block"></div>
            <div class="search col-10 col-md-4 py-2 mt-1 mt-md-0">
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
                        <button class="btn btn-primary" type="submit"><?= Yii::t('app', 'Find') ?></button>
                    </span>
                </form>
                <div class="pt-1 text-white-50 small d-none d-md-block" style="position: absolute;">
                    <?= Yii::t('app', 'For example') ?>: <a href="#" onclick="return $('#search').val($(this).text());">loxeal 30-23</a>
                </div>
            </div>
            <div class="col px-0 d-none d-md-block text-center my-sm-n1 my-md-2 text-nowrap">
                <?= Html::a('EN', Url::current(['lang' => 'en']), ['class' => ['mt-1 btn btn-sm', Yii::$app->language === 'en' ? 'btn-primary' : 'btn-outline-primary'], 'hreflang' => 'en-UA', 'rel' => 'nofollow']) ?>
                <?= Html::a('RU', Url::current(['lang' => 'ru']), ['class' => ['mt-1 btn btn-sm', Yii::$app->language === 'ru' ? 'btn-primary' : 'btn-outline-primary'], 'hreflang' => 'ru-UA', 'rel' => 'nofollow']) ?>
            </div>
            <div class="col col-md-auto text-right pl-1">
			    
                <div class="phones mt-2 mt-md-3">
                    <a href="tel:<?= Yii::$app->params['phone1'] ?>"><i class="fa fa-phone"></i> <?= Yii::$app->params['phone1f'] ?></a>
                </div>
            </div>
        </div>
		
    </div>
        <div class="container">
           
            <div class="progress"></div>
        </div>
    </header><!-- header-end ./ -->	
	///////////////////////side nav categories ////////////////
	 <div class="sidebar col-md-4 col-lg-3">
                <div class="row">
                    <div class="col-sm-6 col-md-12">

                        <!--?= CartWidget::widget() ?-->

                        <nav class="navbar navbar-expand-md mb-3">
                            <button class="btn btn-dark btn-block d-md-none" type="button" data-toggle="collapse" data-target="#navbar-left" aria-controls="navbar-left" aria-expanded="false" aria-label="Toggle navigation">
                                <?= Yii::t('app', 'Product catalog') ?>
                            </button>
                            <div class="collapse navbar-collapse" id="navbar-left">
                                <?php

                                /** @var $categories Category[] */
								$cache = Yii::$app->cache;
                                $categories = Category::getMain();
								!$cache->exists('_categories-' . Yii::$app->language) ? Category::getMain() : [];
                      
                                $items = [];

                                foreach ($categories as $category) {
                                    $items[$category->id] = [
                                        'label' => $category->name,
                                        'url' => (count($category->categories)) ? ['category/pod', 'slug' => $category->slug] : ['category/view', 'slug' => $category->slug],
                                        'options' => [
                                            'tag' => false,
                                        ],
                                    ];
                                }
                                echo Menu::widget([
                                    'items' => $items,
                                    'linkTemplate' => '<a class="nav-link" href="{url}">{label}</a>',
                                    'options' => [
                                        'tag' => 'div',
                                        'class' => 'nav nav-left flex-column',
                                    ],
                                ]);
                                ?>
                            </div>
                        </nav>
                    </div>
                    <div id="sidebarleft" class="col-sm-6 col-md-12">

                    </div>
                </div>
            </div>
//////////////Q & A/////////////////
<div class="card-body">
            <div class="h1 text-center"><?= Yii::t('app', 'Questions and answers') ?></div>
            <?php
            $question = Question::find()
                ->where(['status' => Question::STATUS_PUBLISHED])
                ->orderBy(['id' => SORT_DESC])
                ->limit(5)
                ->all(); 
				
            echo '<div class="question-list">';
            foreach ($question as $q) {
                echo '<div class="media">';
                echo $this->render('../site/_question_item', [
                    'model' => $q,
                ]);
                echo '</div>';
            }
            echo '</div>';
            ?>
        </div>
///////////////////////////////
$idx = ++$idx;
	$active='';
	if(isset($catTitle) && $category->slug == $catTitle){
	   $active = ' categories__item_current';	
	}
    $label = $category->getShortTitle()
        . '<span class="badge pull-right">'
        . $category->getProducts()->count()
        . '</span>';
  $catUrl = Url::to(['catalog/category', 'category' => $category->slug]);
    echo '<div class="item categories__item'.$active.'"><a href="'.$catUrl.'" title="'.$category->name.'">
			<div class="categories__item__icon">
			<span class="flaticon-006-macarons">'.Html::img($category->getIconUrl(), ['alt' => 'click']).'</span>
			<h5>'.$label.'</h5>
			</div></a>
			</div>';
////////////////SIDEBAR///////////////
<div class="row">
            <div class="col-sm-6 col-md-12">
                <div class="card border border-primary border-strong block-link mb-3">
                    <a href="<?= Url::to(['/podbor/index']) ?>">
                        <img class="card-img-top" src="/img/podbor.jpg" alt="<?= Yii::t('app', 'Find glue') ?>">
                    </a>
                    <div class="card-body text-center">
                        <a href="<?= Url::to(['/podbor/index']) ?>" class="card-text h4"><?= Yii::t('app', 'Find product') ?></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-12">
                <?php
                $item = new stdClass();;//$info[0];
				$item->name = "Hello";
				$item->slug = "Hello";
                echo Html::a('<small>' . $item->name . '</small>', ['/info/view', 'slug' => $item->slug], ['class' => 'btn btn-primary btn-lg btn-block mb-3']);
                //$item = "";//$info[1];
                echo Html::a('<small>' . $item->name . '</small>', ['/info/view', 'slug' => $item->slug], ['class' => 'btn btn-warning btn-lg btn-block mb-3']);
                ?>
            </div>
        </div>