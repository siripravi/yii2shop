<div class="bg-light sidebar-nav" id="sidebar-wrapper">
<div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
    <i class="fas fa-user-secret me-2"></i>Nyxta Admin
</div>
      
    <?php
        echo \yii\bootstrap5\Nav::widget([
         'options' => ['class'=>'navbar-nav'],
         'encodeLabels' => false,
        'items' => [           
            [
                'label' => '<span class="me-2"><i class="ti-stats-up"></i></span><span>Categories</span>', 
                'url' => ['/admin/products/category/index'], 
                'linkOptions' => ['class' => 'nav-link px-3']
            ],
            [
                'label' => '<span class="me-2"><i class="fas fa-list"></i></span><span>Products</span>', 
                'url' => ['/admin/products/default/index'],
                'linkOptions' => ['class' => 'nav-link px-3 sidebar-link']
            ],
            [
                'label' => Yii::t('app', '<span class="me-2"><i class="fas fa-layer-group"></i></span><span>Groups</span>'), 
                'url' => ['/admin/products/complect/index'],
                'linkOptions' => ['class' => 'nav-link px-3 sidebar-link']
            ],
            /*
            [
                'label' => Yii::t('app', '<span class="me-2"><i class="fas fa-star"></i></span><span>Brands</span>'),             
                'url' => ['/admin/products/brand/index'],
                'linkOptions' => ['class' => 'nav-link px-3 sidebar-link']
            ],
            [
                'label' => Yii::t('app', '<span class="me-2"><i class="fas fa-dollar-sign"></i></span><span>Currencies</span>'), 
                'url' => ['/admin/products/currency/index'],
                'linkOptions' => ['class' => 'nav-link px-3 sidebar-link']
            ],
               
            [
                'label' => Yii::t('app', '<span class="me-2"><i class="fas fa-weight"></i></span><span>Units</span>'), 
                'url' => ['/admin/products/unit/index'],
                'linkOptions' => ['class' => 'nav-link px-3 sidebar-link']
            ],
            [
                'label' => Yii::t('app', '<span class="me-2"><i class="ti-lock"></i></span><span>Statuses</span>'), 
                'url' => ['/admin/products/product-status/index'],
                'linkOptions' => ['class' => 'nav-link px-3 sidebar-link'] 
            ],
            [
                'label' => Yii::t('app', '<span class="me-2"><i class="fas fa-users" style="color:#3d052e"></i></span><span>Users</span>'), 
                'url' => ['/admin/user/index'],
                'linkOptions' => ['class' => 'nav-link px-3 sidebar-link'] 
            ],
            [
                'label' => Yii::t('app', '<span class="me-2"><i class="ti-signal" style="color:#3d052e"></i></span><span>Buyers</span>'), 
                'url' => ['/admin/buyer/index'],
                'linkOptions' => ['class' => 'nav-link px-3 sidebar-link']
            ],

            [
                'label' => Yii::t('cart', '<span class="me-2"><i class="fas fa-truck"></i></span><span>Delivery Methods</span>'), 
                'url' => ['/admin/delivery/index'],
                'linkOptions' => ['class' => 'nav-link px-3 sidebar-link'] 
            ],
            [
                'label' => Yii::t('cart', '<span class="me-2"><i class="fas fa-credit-card"></i></span><span>Payment Methods</span>'), 
                'url' => ['/admin/payment/index'],
                'linkOptions' => ['class' => 'nav-link px-3 sidebar-link'] 
            ],
             */
            [
                'label' => Yii::t('app', '<span class="me-2"><i class="fas fa-cog"></i></span><span>Features</span>'), 
                'url' => ['/admin/products/feature/index'],
                'linkOptions' => ['class' => 'nav-link px-3 sidebar-link']
            ],
            [
                'label' => '<span class="me-2"><i class="fa fa-ravelry"></i></span><span>Login</span>', 'url' => ['site/login'], 
                'visible' => Yii::$app->user->isGuest,  
                'linkOptions' => ['class' => 'nav-link px-3 sidebar-link'],     
            ],
            [
                'label' => '<span class="me-2"><i class="fas fa-star"></i></span><span>Blog</span>',
                'linkOptions' => ['class' => 'nav-link px-3 sidebar-link'], 
                'items' => [
                    [
                    'label' => 'Categories',
                    'url' => ['/admin/page/page-category'], 
                    'linkOptions' => ['class' => 'nav-link px-3 sidebar-link']
                    ],
                    [
                        'label' => 'Pages',
                        'url' => ['/admin/page'], 
                        'linkOptions' => ['class' => 'nav-link px-3 sidebar-link']
                    ],
                    [
                        'label' => 'Comments',
                        'url' => ['/admin/page/page-comment'], 
                        'linkOptions' => ['class' => 'nav-link px-3 sidebar-link']
                    ],
                    [
                        'label' => 'Tags',
                        'url' => ['/admin/page/page-tag'], 
                        'linkOptions' => ['class' => 'nav-link px-3 sidebar-link']
                    ],
                ]
            ],                
                 
        ],
    ]);?>  
   
</div>
 