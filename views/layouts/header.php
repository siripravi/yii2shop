
	   <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
		     <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbar-top"
      aria-controls="navbar-top"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="uil uil-bars"></i>
	  
    </button>
     
            <div class="collapse navbar-collapse" id="navbar-top">
               
				   <!-- Navbar brand -->
				  <a class="navbar-brand mt-2 mt-lg-0" href="#">
					<img
					  src="/img/light-logo.png""
					  height="15"
					  alt="Nyxta"
					  loading="lazy"
					/>
				  </a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                            'class' => 'nav-item',
                        ],
                    ]);
                    ?>
                       
                    </ul>
               
            </div>
			 <!-- Right elements -->
    <div class="d-flex align-items-center">
	       <?= Html::a('EN', Url::current(['lang' => 'en']), ['class' => ['mt-1 btn btn-sm', Yii::$app->language === 'en' ? 'btn-primary' : 'btn-outline-primary'], 'hreflang' => 'en-UA', 'rel' => 'nofollow']) ?>
                <?= Html::a('RU', Url::current(['lang' => 'ru']), ['class' => ['mt-1 btn btn-sm', Yii::$app->language === 'ru' ? 'btn-primary' : 'btn-outline-primary'], 'hreflang' => 'ru-UA', 'rel' => 'nofollow']) ?>
      <!-- Icon -->
      <a class="text-reset me-3" href="#">
        <i class="fas fa-shopping-cart"></i>
      </a>

      <!-- Notifications -->
      <div class="dropdown">
        <a
          class="text-reset me-3 dropdown-toggle hidden-arrow"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <i class="fas fa-bell"></i>
          <span class="badge rounded-pill badge-notification bg-danger">1</span>
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink"
        >
          <li>
            <a class="dropdown-item" href="#">Some news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Something else here</a>
          </li>
        </ul>
      </div>
      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <img
            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
            class="rounded-circle"
            height="25"
            alt="Black and White Portrait of a Man"
            loading="lazy"
          />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="#">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
	
    <!-- Right elements -->
       </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<div class="darkLight-searchBox">
				<div class="col px-0 d-none d-md-block text-center my-sm-n1 my-md-2 text-nowrap">
                
				</div>
                    <div class="dark-light">                        
                        <i class="uil uil-moon moon"></i>
                        <i class="uil uil-sun sun"></i>
                    </div>
					 <div class="searchBox">
                        <div class="searchToggle">
                            <i class="uil uil-times cancel"></i>
                            <i class="uil uil-search search"></i>
                        </div>
                        <div class="search-field">
                          <!--  <input type="text" placeholder="Search..." /-->
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
                    
                        <button class="btn btn-primary" type="submit"><i class="uil uil-search-alt"></i></button>                    
                </form>                 
                </div>
                    </div>   
                    <div class="cart-checkout">
                        <i class="uil uil-shopping-bag shopping-cart"></i>
                    </div>
                    <!-- <i class="fa-solid fa-bars open-nav"></i> -->
                </div>
            
          
   