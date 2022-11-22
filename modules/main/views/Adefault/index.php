<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<section class="grey">
    <div class="container">
        <div class="row">
            <div class="col-md-8 for-dashed-left">
                <div class="home-title">
                    <div class="home-title-text"><?= Yii::t('app', 'Новости дня') ?></div>
                </div>
                <div class="row project-home">
                    <div class="col-sm-4">
                        <a href="#" rel="nofollow" class="thumbnail"><i></i></a>
                    </div>
                    <div class="col-sm-8">
                        <a href="#" class="title">Дом-термос, не требующий отопления, стал реальностью для жителя Ивано-Франковска</a>
                        <div class="text">
                            Уникальный дом, который не нуждается в системе индивидуального отопления, построил житель
                            Ивано-Франковска Николай Яцинович. По словам нашего соотечественника, на возведение этого
                            «архитектурного чуда» у него ушло 10 лет, а финансовые затраты оказались вполне равноценны
                            сумме,...
                        </div>
                        <a href="#" class="btn btn-success" rel="nofollow">Подробнее</a>
                        <a href="#" class="btn btn-primary" rel="nofollow">Все новости</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 dashed-left">
                <div class="home-title">
                    <a href="#" class="btn btn-primary pull-right hidden-md" rel="nofollow">Все компании</a>
                    <div class="home-title-text"><?= Yii::t('app', 'Лидеры каталога') ?></div>
                    <hr>
                </div>
                <div class="list-group list-liders row">
                    <div class="list-group-col col-sm-6 col-md-12">
                        <a href="#" class="list-group-item">
                            <img src="http://www.stroimdom.com.ua/images/companies_logos/thumb/432.jpeg">
                            <h4 class="list-group-item-heading">Заголовок пункта списка группы</h4>
                        </a>
                    </div>
                    <div class="list-group-col col-sm-6 col-md-12">
                        <a href="#" class="list-group-item">
                            <img src="http://www.stroimdom.com.ua/images/companies_logos/thumb/432.jpeg">
                            <h4 class="list-group-item-heading">Заголовок пункта списка группы</h4>
                        </a>
                    </div>
                    <div class="list-group-col col-sm-6 col-md-12">
                        <a href="#" class="list-group-item">
                            <img src="http://www.stroimdom.com.ua/images/companies_logos/thumb/432.jpeg">
                            <h4 class="list-group-item-heading">Заголовок пункта списка группы</h4>
                        </a>
                    </div>
                    <div class="list-group-col col-sm-6 col-md-12 visible-sm">
                        <a href="#" class="list-group-item">
                            <img src="http://www.stroimdom.com.ua/images/companies_logos/thumb/432.jpeg">
                            <h4 class="list-group-item-heading">Заголовок пункта списка группы</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="green">
    <div class="container">
        <div class="home-title">
            <a href="<?= \yii\helpers\Url::to(['/page/default/index', 'slug' => 'privet']) ?>" class="btn btn-danger pull-right" rel="nofollow">Весь каталог</a>
            <div class="home-title-text"><?= Yii::t('app', 'Каталог товаров') ?></div>
        </div>
        <div class="list-group list-catalog row">
            <div class="list-group-col col-sm-6 col-md-4">
                <a href="#" class="list-group-item">
                    <span class="badge">1142</span>
                    <img src="http://www.stroimdom.com.ua/new/img/catalog/32.png">
                    <h4 class="list-group-item-heading">Инструмент электрический</h4>
                </a>
            </div>
            <div class="list-group-col col-sm-6 col-md-4">
                <a href="#" class="list-group-item">
                    <span class="badge">1142</span>
                    <img src="http://www.stroimdom.com.ua/new/img/catalog/32.png">
                    <h4 class="list-group-item-heading">Инструмент электрический электрический </h4>
                </a>
            </div>
            <div class="list-group-col col-sm-6 col-md-4">
                <a href="#" class="list-group-item">
                    <span class="badge">1142</span>
                    <img src="http://www.stroimdom.com.ua/new/img/catalog/32.png">
                    <h4 class="list-group-item-heading">Инструмент электрический</h4>
                </a>
            </div>

            <div class="list-group-col col-sm-6 col-md-4">
                <a href="#" class="list-group-item">
                    <span class="badge">1142</span>
                    <img src="http://www.stroimdom.com.ua/new/img/catalog/32.png">
                    <h4 class="list-group-item-heading">Инструмент электрический</h4>
                </a>
            </div>
            <div class="list-group-col col-sm-6 col-md-4">
                <a href="#" class="list-group-item">
                    <span class="badge">1142</span>
                    <img src="http://www.stroimdom.com.ua/new/img/catalog/32.png">
                    <h4 class="list-group-item-heading">Инструмент электрический</h4>
                </a>
            </div>
            <div class="list-group-col col-sm-6 col-md-4">
                <a href="#" class="list-group-item">
                    <span class="badge">1142</span>
                    <img src="http://www.stroimdom.com.ua/new/img/catalog/32.png">
                    <h4 class="list-group-item-heading">Инструмент электрический</h4>
                </a>
            </div>

            <div class="list-group-col col-sm-6 col-md-4 hidden-xs">
                <a href="#" class="list-group-item">
                    <span class="badge">1142</span>
                    <img src="http://www.stroimdom.com.ua/new/img/catalog/32.png">
                    <h4 class="list-group-item-heading">Инструмент электрический</h4>
                </a>
            </div>
            <div class="list-group-col col-sm-6 col-md-4 hidden-xs">
                <a href="#" class="list-group-item">
                    <span class="badge">1142</span>
                    <img src="http://www.stroimdom.com.ua/new/img/catalog/32.png">
                    <h4 class="list-group-item-heading">Инструмент электрический</h4>
                </a>
            </div>
            <div class="list-group-col col-sm-6 col-md-4 hidden-xs">
                <a href="#" class="list-group-item">
                    <span class="badge">1142</span>
                    <img src="http://www.stroimdom.com.ua/new/img/catalog/32.png">
                    <h4 class="list-group-item-heading">Инструмент электрический</h4>
                </a>
            </div>

            <div class="list-group-col col-sm-6 col-md-4 hidden-xs">
                <a href="#" class="list-group-item">
                    <span class="badge">1142</span>
                    <img src="http://www.stroimdom.com.ua/new/img/catalog/32.png">
                    <h4 class="list-group-item-heading">Инструмент электрический</h4>
                </a>
            </div>
            <div class="list-group-col col-sm-6 col-md-4 hidden-xs">
                <a href="#" class="list-group-item">
                    <span class="badge">1142</span>
                    <img src="http://www.stroimdom.com.ua/new/img/catalog/32.png">
                    <h4 class="list-group-item-heading">Инструмент электрический</h4>
                </a>
            </div>
            <div class="list-group-col col-sm-6 col-md-4 hidden-xs">
                <a href="#" class="list-group-item">
                    <span class="badge">1142</span>
                    <img src="http://www.stroimdom.com.ua/new/img/catalog/32.png">
                    <h4 class="list-group-item-heading">Инструмент электрический</h4>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="white">
    <div class="container">
        <div class="home-title">
            <a href="#" class="btn btn-primary pull-right" rel="nofollow">Все предложения</a>
            <div class="home-title-text"><?= Yii::t('app', 'Новые предложения') ?></div>
            <hr>
        </div>

    </div>
</section>

<section class="grey">
    <div class="container">
        <div class="home-title">
            <a href="#" class="btn btn-primary pull-right" rel="nofollow">Все статьи</a>
            <div class="home-title-text"><?= Yii::t('app', 'Строительные статьи') ?></div>
            <hr>
        </div>
        <div class="row card-article">
            <div class="card-article-col col-sm-6 col-md-3">
                <a href="#" rel="nofollow" class="thumbnail"><i></i></a>
                <h4 class="card-article-title"><a href="#">Как выбрать кафельную плитку для кухни на стены</a></h4>
                <div class="card-article-text">
                    Подобрав долговечный, эстетичный и качественный кафель для стен, можно добиться хорошего и
                    качественный кафель для стен, можно добиться хорошего
                </div>
            </div>
            <div class="card-article-col col-sm-6 col-md-3">
                <a href="#" rel="nofollow" class="thumbnail"><i></i></a>
                <h4 class="card-article-title"><a href="#">Как выбрать кафельную плитку для кухни на стены</a></h4>
                <div class="card-article-text">
                    Подобрав долговечный, эстетичный и качественный кафель для стен, можно добиться хорошего и
                    качественный кафель для стен, можно добиться хорошего
                </div>
            </div>
            <div class="card-article-col col-sm-6 col-md-3">
                <a href="#" rel="nofollow" class="thumbnail"><i></i></a>
                <h4 class="card-article-title"><a href="#">Как выбрать кафельную плитку для кухни на стены</a></h4>
                <div class="card-article-text">
                    Подобрав долговечный, эстетичный и качественный кафель для стен, можно добиться хорошего и
                    качественный кафель для стен, можно добиться хорошего
                </div>
            </div>
            <div class="card-article-col col-sm-6 col-md-3">
                <a href="#" rel="nofollow" class="thumbnail"><i></i></a>
                <h4 class="card-article-title"><a href="#">Как выбрать кафельную плитку для кухни на стены</a></h4>
                <div class="card-article-text">
                    Подобрав долговечный, эстетичный и качественный кафель для стен, можно добиться хорошего и
                    качественный кафель для стен, можно добиться хорошего
                </div>
            </div>
        </div>
    </div>
</section>

<section class="green-light">
    <div class="container">
        <div class="home-title">
            <a href="#" class="btn btn-success pull-right" rel="nofollow">Перейти на форум</a>
            <div class="home-title-text"><?= Yii::t('app', 'Форум') ?></div>
            <hr>
        </div>
        <div class="row card-forum">
            <div class="col-sm-6 col-md-3">
                <div class="card-forum-item">
                    <a href="#" class="card-forum-title">Как выбрать кафельную плитку для кухни на стены</a>
                    <div class="card-forum-date"><i class="fa fa-calendar"></i> 5 августа</div>
                    <i class="card-forum-triangle"></i>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card-forum-item">
                    <a href="#" class="card-forum-title">Как выбрать кафельную плитку для кухни на стены</a>
                    <div class="card-forum-date"><i class="fa fa-calendar"></i> 5 августа</div>
                    <i class="card-forum-triangle"></i>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card-forum-item">
                    <a href="#" class="card-forum-title">Как выбрать кафельную плитку для кухни на стены</a>
                    <div class="card-forum-date"><i class="fa fa-calendar"></i> 5 августа</div>
                    <i class="card-forum-triangle"></i>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card-forum-item">
                    <a href="#" class="card-forum-title">Как выбрать кафельную плитку для кухни на стены</a>
                    <div class="card-forum-date"><i class="fa fa-calendar"></i> 5 августа</div>
                    <i class="card-forum-triangle"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 for-dashed-left">
                <div class="home-title">
                    <a href="#" class="btn btn-primary pull-right" rel="nofollow">Все новости</a>
                    <div class="home-title-text"><?= Yii::t('app', 'Новости') ?></div>
                    <hr>
                </div>
                <div class="news">
                    <div class="media">
                        <a class="pull-left thumbnail" href="#">
                            <img class="media-object" src="http://www.stroimdom.com.ua/images/articles/big/9063.jpeg" alt="...">
                        </a>
                        <div class="media-body">
                            <div class="media-date">7 августа</div>
                            <h4 class="media-heading"><a href="#">Заголовок медиа</a></h4>
                            REMS Кобра – чистая труба – просто и быстро. Быстрая прочистка спиралями с насадками для рабочей длины до 100 м. Эффективное...
                        </div>
                    </div>
                    <div class="media">
                        <a class="pull-left thumbnail" href="#">
                            <img class="media-object" src="http://www.stroimdom.com.ua/images/articles/big/9063.jpeg" alt="...">
                        </a>
                        <div class="media-body">
                            <div class="media-date">7 августа</div>
                            <h4 class="media-heading"><a href="#">Заголовок медиа</a></h4>
                            REMS Кобра – чистая труба – просто и быстро. Быстрая прочистка спиралями с насадками для рабочей длины до 100 м. Эффективное...
                        </div>
                    </div>
                    <div class="media">
                        <a class="pull-left thumbnail" href="#">
                            <img class="media-object" src="http://www.stroimdom.com.ua/images/articles/big/9063.jpeg" alt="...">
                        </a>
                        <div class="media-body">
                            <div class="media-date">7 августа</div>
                            <h4 class="media-heading"><a href="#">Заголовок медиа</a></h4>
                            REMS Кобра – чистая труба – просто и быстро. Быстрая прочистка спиралями с насадками для рабочей длины до 100 м. Эффективное...
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 dashed-left">
                <div class="home-title">
                    <div class="home-title-text"><?= Yii::t('app', 'Дом автора') ?></div>
                    <hr>
                </div>
                <div class="row author-home">
                    <div class="col-sm-6">
                        <ul class="list-group">
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <a href="#">Выбор участка</a></li>
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <a href="#">Проект дома</a></li>
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <a href="#">Стройматериалы</a></li>
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <a href="#">Выбор строителей</a></li>
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <a href="#">Фундамент</a></li>
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <a href="#">Подвал и первый этаж</a></li>
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <a href="#">Второй этаж</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul class="list-group">
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <a href="#">Крыша, двери</a></li>
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <a href="#">Окна и лестницы</a></li>
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <a href="#">Внутренняя лестница</a></li>
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <a href="#">Делаем пол</a></li>
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <a href="#">Электрика, отопление</a></li>
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <a href="#">Наружные работы</a></li>
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <a href="#">Внутрение работы</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>