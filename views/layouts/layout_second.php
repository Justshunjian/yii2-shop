<?php
/**
 * layout_second.php.
 * User: Administrator
 * Date: 2017/9/27 0027
 * Time: 9:57
 * Desc:
 */
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\FontendAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;

FontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <!-- Meta -->
    <meta charset="<?= Yii::$app->charset ?>">

    <?php
        $this->registerMetaTag(['http-equiv'=>"Content-Type",'content'=>'text/html; charset=UTF-8']);
        $this->registerMetaTag(['name'=>"viewport",'content'=>'width=device-width, initial-scale=1.0, user-scalable=no']);
        $this->registerMetaTag(['name'=>"description",'content'=>'']);
        $this->registerMetaTag(['name'=>"author",'content'=>'']);
        $this->registerMetaTag(['name'=>"keywords",'content'=>'MediaCenter, Template, eCommerce']);
        $this->registerMetaTag(['name'=>"robots",'content'=>'all']);
    ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/images/favicon.ico">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrapper">
    <!-- ============================================================= TOP NAVIGATION ============================================================= -->
<!--    --><?php
//    NavBar::begin([
//        'options' => [
//            'class'=>"top-bar animate-dropdown"
//        ]
//    ]);
//    //左边
//    echo Nav::widget([
//        'options'=>['class'=>'navbar-nav navbar-left'],
//        'items'=>[
//            ['label'=>'首页', 'url'=>['/index/index']],
//            !Yii::$app->user->isGuest) ?(
//            ['label'=>'购物车', 'url'=>['/cart/index']]
//            ) : '',
//            !Yii::$app->user->isGuest) ?(
//            ['label'=>'我的订单', 'url'=>['/order/index']]
//            ) : ''
//        ]
//    ]);
//    //右边
//    echo Nav::widget([
//        'options'=>['class'=>'navbar-nav navbar-right'],
//        'items'=>[
//            Yii::$app->user->isGuest) ?(
//            ['label'=>'注册', 'url'=> ['/member/auth']]
//            ) : '',
//            Yii::$app->user->isGuest) ?(
//            ['label'=>'登录', 'url'=> ['/member/auth']]
//            ) : '',
//            !Yii::$app->user->isGuest) ?(
//                '欢迎你回来, '.Yii::$app->session['loginname'].','
//            ) : '',
//            !Yii::$app->user->isGuest) ?(
//            Html::a('退出', ['/member/logout'])
//            ) : ''
//        ]
//    ]);
//
//    NavBar::end();
//    ?>

    <nav class="top-bar animate-dropdown">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-margin">
                <ul>
                    <li><a href="/">首页</a></li>
                    <?php
                        if(!Yii::$app->user->isGuest) {
                    ?>
                        <li><a href="<?= Url::to(['cart/index']) ?>">我的购物车</a></li>
                        <li><a href="<?= Url::to(['order/index']) ?>">我的订单</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-6 no-margin">
                <ul class="right">
                    <?php
                    if(!Yii::$app->user->isGuest){
                        echo Yii::$app->user->identity->username;
                    ?>
                            ,<li><a href="<?=Url::to(['member/logout']);?>">退出</a></li>
                    <?php
                        }else {
                    ?>
                            <li><a href="<?= Url::to(['member/auth']) ?>">注册</a></li>
                            <li><a href="<?= Url::to(['member/auth']) ?>">登录</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div><!-- /.col -->
        </div><!-- /.container -->
    </nav><!-- /.top-bar -->
    <!-- ============================================================= TOP NAVIGATION : END ============================================================= -->		<!-- ============================================================= HEADER ============================================================= -->
    <header>
        <div class="container no-padding">

            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                <!-- ============================================================= LOGO ============================================================= -->
                <div class="logo">
                    <a href="/">
                        <img alt="logo" src="/images/logo.PNG" width="233" height="54"/>
                    </a>
                </div><!-- /.logo -->
                <!-- ============================================================= LOGO : END ============================================================= -->		</div><!-- /.logo-holder -->

            <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder no-margin">
                <div class="contact-row">
                    <div class="phone inline">
                        <i class="fa fa-phone"></i> (+086) 123 456 7890
                    </div>
                    <div class="contact inline">
                        <i class="fa fa-envelope"></i> contact@<span class="le-color">lvfk.com</span>
                    </div>
                </div><!-- /.contact-row -->
                <!-- ============================================================= SEARCH AREA ============================================================= -->
                <div class="search-area">
                    <?php
                        $form = ActiveForm::begin([
                            'id'=>'sid',
                            'action' => ['product/search'],
                            'method' => 'get'
                        ]);
                    ?>
                        <div class="control-group">
                            <input class="search-field" name="keyword" placeholder="搜索商品" />

                            <ul class="categories-filter animate-dropdown">
                                <li class="dropdown">

                                    <a class="dropdown-toggle"  data-toggle="dropdown" href="category-grid.html">所有分类</a>

                                    <ul class="dropdown-menu" role="menu" >
                                        <?php foreach ($this->params['menu'] as $menu):?>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=Url::to(['product/index','cateid'=>$menu['cateid']]) ?>"><?php echo $menu['title'] ?></a></li>
                                        <?php endforeach;?>
                                    </ul>
                                </li>
                            </ul>

                            <a style="padding:15px 15px 13px 12px" class="search-button" href="javascript:document.getElementById('sid').submit()" ></a>

                        </div>
                    <?php ActiveForm::end();?>
                </div><!-- /.search-area -->
                <!-- ============================================================= SEARCH AREA : END ============================================================= -->		</div><!-- /.top-search-holder -->

            <div class="col-xs-12 col-sm-12 col-md-3 top-cart-row no-margin">
                <div class="top-cart-row-container">

                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                    <div class="top-cart-holder dropdown animate-dropdown">

                        <div class="basket">

                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <div class="basket-item-count">
                                    <span class="count"><?=count($this->params['cart']['products']) ?></span>
                                    <img src="/images/icon-cart.png" alt="" />
                                </div>

                                <div class="total-price-basket">
                                    <span class="lbl">您的购物车:</span>
                                    <span class="total-price">
                        <span class="sign">￥</span><span class="value"><?=$this->params['cart']['total'] ?></span>
                    </span>
                                </div>
                            </a>

                            <ul class="dropdown-menu">
                                <?php foreach((array)$this->params['cart']['products'] as $product): ?>
                                    <li>
                                        <div class="basket-item">
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                    <div class="thumb">
                                                        <img alt="" src="<?php echo $product['cover'] ?>-picsmall" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 no-margin">
                                                    <div class="title"><?php echo $product['title'] ?></div>
                                                    <div class="price">￥ <?php echo $product['price'] ?></div>
                                                </div>
                                            </div>
                                            <a class="close-btn" href="<?php echo yii\helpers\Url::to(['cart/del', 'cartid' => $product['cartid']]) ?>"></a>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                <li class="checkout">
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <a href="<?php echo yii\helpers\Url::to(['cart/index']) ?>" class="le-button inverse">查看购物车</a>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <a href="<?php echo yii\helpers\Url::to(['cart/index']) ?>" class="le-button">去往收银台</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div><!-- /.basket -->
                    </div><!-- /.top-cart-holder -->
                </div><!-- /.top-cart-row-container -->
                <!-- ============================================================= SHOPPING CART DROPDOWN : END ============================================================= -->		</div><!-- /.top-cart-row -->

        </div><!-- /.container -->

        <!-- ========================================= NAVIGATION ========================================= -->
        <nav id="top-megamenu-nav" class="megamenu-vertical animate-dropdown">
            <div class="container">
                <div class="yamm navbar">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mc-horizontal-menu-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div><!-- /.navbar-header -->
                    <div class="collapse navbar-collapse" id="mc-horizontal-menu-collapse">
                        <ul class="nav navbar-nav">
                            <?php
                                foreach ($this->params['menu'] as $menu){
                            ?>
                            <li class="dropdown">
                                <a href="<?=Url::to(['product/index','cateid'=>$menu['cateid']]) ?>" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><?php echo $menu['title'] ?></a>
                                <ul class="dropdown-menu">
                                    <?php foreach($menu['children'] as $child): ?>
                                        <li><a href="<?php echo yii\helpers\Url::to(['product/index', 'cateid' => $child['cateid']]) ?>"><?php echo $child['title'] ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <?php }?>


                        </ul><!-- /.navbar-nav -->
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.navbar -->
            </div><!-- /.container -->
        </nav><!-- /.megamenu-vertical -->
        <!-- ========================================= NAVIGATION : END ========================================= -->
    </header>

    <!-- ============================================================= HEADER : END ============================================================= -->

    <?= $content ?>

    <!-- ============================================================= FOOTER ============================================================= -->
    <footer id="footer" class="color-bg">

    <div class="container">
        <div class="row no-margin widgets-row">
            <div class="col-xs-12  col-sm-4 no-margin-left">
                <!-- ============================================================= FEATURED PRODUCTS ============================================================= -->
                <div class="widget">
                    <h2>推荐商品</h2>
                    <div class="body">
                        <ul>
                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 no-margin">
                                        <a href="single-product.html">Netbook Acer Travel B113-E-10072</a>
                                        <div class="price">
                                            <div class="price-prev">￥2000</div>
                                            <div class="price-current">￥1873</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 no-margin">
                                        <a href="#" class="thumb-holder">
                                            <img alt="" src="/images/blank.gif" data-echo="/images/products/product-small-01.jpg" />
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 no-margin">
                                        <a href="single-product.html">PowerShot Elph 115 16MP Digital Camera</a>
                                        <div class="price">
                                            <div class="price-prev">￥2000</div>
                                            <div class="price-current">￥1873</div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 no-margin">
                                        <a href="#" class="thumb-holder">
                                            <img alt="" src="/images/blank.gif" data-echo="/images/products/product-small-02.jpg" />
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 no-margin">
                                        <a href="single-product.html">PowerShot Elph 115 16MP Digital Camera</a>
                                        <div class="price">
                                            <div class="price-prev">￥2000</div>
                                            <div class="price-current">￥1873</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 no-margin">
                                        <a href="#" class="thumb-holder">
                                            <img alt="" src="/images/blank.gif" data-echo="/images/products/product-small-03.jpg" />
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div><!-- /.body -->
                </div> <!-- /.widget -->
                <!-- ============================================================= FEATURED PRODUCTS : END ============================================================= -->            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-4 ">
                <!-- ============================================================= ON SALE PRODUCTS ============================================================= -->
                <div class="widget">
                    <h2>促销商品</h2>
                    <div class="body">
                        <ul>
                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 no-margin">
                                        <a href="single-product.html">HP Scanner 2910P</a>
                                        <div class="price">
                                            <div class="price-prev">￥2000</div>
                                            <div class="price-current">￥1873</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 no-margin">
                                        <a href="#" class="thumb-holder">
                                            <img alt="" src="/images/blank.gif" data-echo="/images/products/product-small-04.jpg" />
                                        </a>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 no-margin">
                                        <a href="single-product.html">Galaxy Tab 3 GT-P5210 16GB, Wi-Fi, 10.1in - White</a>
                                        <div class="price">
                                            <div class="price-prev">￥2000</div>
                                            <div class="price-current">￥1873</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 no-margin">
                                        <a href="#" class="thumb-holder">
                                            <img alt="" src="/images/blank.gif" data-echo="/images/products/product-small-05.jpg" />
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 no-margin">
                                        <a href="single-product.html">PowerShot Elph 115 16MP Digital Camera</a>
                                        <div class="price">
                                            <div class="price-prev">￥2000</div>
                                            <div class="price-current">￥1873</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 no-margin">
                                        <a href="#" class="thumb-holder">
                                            <img alt="" src="/images/blank.gif" data-echo="/images/products/product-small-06.jpg" />
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div><!-- /.body -->
                </div> <!-- /.widget -->
                <!-- ============================================================= ON SALE PRODUCTS : END ============================================================= -->            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-4 ">
                <!-- ============================================================= TOP RATED PRODUCTS ============================================================= -->
                <div class="widget">
                    <h2>最热商品</h2>
                    <div class="body">
                        <ul>
                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 no-margin">
                                        <a href="single-product.html">Galaxy Tab GT-P5210, 10" 16GB Wi-Fi</a>
                                        <div class="price">
                                            <div class="price-prev">￥2000</div>
                                            <div class="price-current">￥1873</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 no-margin">
                                        <a href="#" class="thumb-holder">
                                            <img alt="" src="/images/blank.gif" data-echo="/images/products/product-small-07.jpg" />
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 no-margin">
                                        <a href="single-product.html">PowerShot Elph 115 16MP Digital Camera</a>
                                        <div class="price">
                                            <div class="price-prev">￥2000</div>
                                            <div class="price-current">￥1873</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 no-margin">
                                        <a href="#" class="thumb-holder">
                                            <img alt="" src="/images/blank.gif" data-echo="/images/products/product-small-08.jpg" />
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 no-margin">
                                        <a href="single-product.html">Surface RT 64GB, Wi-Fi, 10.6in - Dark Titanium</a>
                                        <div class="price">
                                            <div class="price-prev">￥2000</div>
                                            <div class="price-current">￥1873</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 no-margin">
                                        <a href="#" class="thumb-holder">
                                            <img alt="" src="/images/blank.gif" data-echo="/images/products/product-small-09.jpg" />
                                        </a>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div><!-- /.body -->
                </div><!-- /.widget -->
                <!-- ============================================================= TOP RATED PRODUCTS : END ============================================================= -->            </div><!-- /.col -->

        </div><!-- /.widgets-row-->
    </div><!-- /.container -->

    <div class="sub-form-row">
        <!--<div class="container">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 no-padding">
                <form role="form">
                    <input placeholder="Subscribe to our newsletter">
                    <button class="le-button">Subscribe</button>
                </form>
            </div>
        </div>--><!-- /.container -->
    </div><!-- /.sub-form-row -->

    <div class="link-list-row">
        <div class="container no-padding">
            <div class="col-xs-12 col-md-4 ">
                <!-- ============================================================= CONTACT INFO ============================================================= -->
                <div class="contact-info">
                    <div class="footer-logo">
                        <img alt="logo" src="/images/logo.PNG" width="233" height="54"/>
                    </div><!-- /.footer-logo -->

                    <p class="regular-bold"> 请通过电话，电子邮件随时联系我们</p>

                    <p>
                        西城区二环到三环德胜门外大街10号TCL大厦3层(马甸桥南), 北京市西城区, 中国
                        <br>慕课网 (QQ群:416465236)
                    </p>

                    <!--<div class="social-icons">
                        <h3>Get in touch</h3>
                        <ul>
                            <li><a href="http://facebook.com/transvelo" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-pinterest"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                            <li><a href="#" class="fa fa-stumbleupon"></a></li>
                            <li><a href="#" class="fa fa-dribbble"></a></li>
                            <li><a href="#" class="fa fa-vk"></a></li>
                        </ul>
                    </div>--><!-- /.social-icons -->

                </div>
                <!-- ============================================================= CONTACT INFO : END ============================================================= -->            </div>

            <div class="col-xs-12 col-md-8 no-margin">
                <!-- ============================================================= LINKS FOOTER ============================================================= -->
                <div class="link-widget">
                    <div class="widget">
                        <h3>快速检索</h3>
                        <ul>
                            <li><a href="category-grid.html">laptops &amp; computers</a></li>
                            <li><a href="category-grid.html">Cameras &amp; Photography</a></li>
                            <li><a href="category-grid.html">Smart Phones &amp; Tablets</a></li>
                            <li><a href="category-grid.html">Video Games &amp; Consoles</a></li>
                            <li><a href="category-grid.html">TV &amp; Audio</a></li>
                            <li><a href="category-grid.html">Gadgets</a></li>
                            <li><a href="category-grid.html">Car Electronic &amp; GPS</a></li>
                            <li><a href="category-grid.html">Accesories</a></li>
                        </ul>
                    </div><!-- /.widget -->
                </div><!-- /.link-widget -->

                <div class="link-widget">
                    <div class="widget">
                        <h3>热门商品</h3>
                        <ul>
                            <li><a href="category-grid.html">Find a Store</a></li>
                            <li><a href="category-grid.html">About Us</a></li>
                            <li><a href="category-grid.html">Contact Us</a></li>
                            <li><a href="category-grid.html">Weekly Deals</a></li>
                            <li><a href="category-grid.html">Gift Cards</a></li>
                            <li><a href="category-grid.html">Recycling Program</a></li>
                            <li><a href="category-grid.html">Community</a></li>
                            <li><a href="category-grid.html">Careers</a></li>

                        </ul>
                    </div><!-- /.widget -->
                </div><!-- /.link-widget -->

                <div class="link-widget">
                    <div class="widget">
                        <h3>最近浏览</h3>
                        <ul>
                            <li><a href="category-grid.html">My Account</a></li>
                            <li><a href="category-grid.html">Order Tracking</a></li>
                            <li><a href="category-grid.html">Wish List</a></li>
                            <li><a href="category-grid.html">Customer Service</a></li>
                            <li><a href="category-grid.html">Returns / Exchange</a></li>
                            <li><a href="category-grid.html">FAQs</a></li>
                            <li><a href="category-grid.html">Product Support</a></li>
                            <li><a href="category-grid.html">Extended Service Plans</a></li>
                        </ul>
                    </div><!-- /.widget -->
                </div><!-- /.link-widget -->
                <!-- ============================================================= LINKS FOOTER : END ============================================================= -->            </div>
        </div><!-- /.container -->
    </div><!-- /.link-list-row -->

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="copyright">
                    &copy; <a href="index.html">Imooc.com</a> - all rights reserved
                </div><!-- /.copyright -->
            </div>
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="payment-methods ">
                    <ul>
                        <li><img alt="" src="/images/payments/payment-visa.png"></li>
                        <li><img alt="" src="/images/payments/payment-master.png"></li>
                        <li><img alt="" src="/images/payments/payment-paypal.png"></li>
                        <li><img alt="" src="/images/payments/payment-skrill.png"></li>
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div><!-- /.container -->
    </div><!-- /.copyright-bar -->

</footer><!-- /#footer -->
<!-- ============================================================= FOOTER : END ============================================================= -->	</div><!-- /.wrapper -->

<script>
    $("#createlink").click(function(){
        $(".billing-address").slideDown();
    });
    $("li.disabled").hide();
    $(".expressshow").hide();
    $(".express").click(function(e){
        e.preventDefault();
    });
    $(".express").hover(function(){
        var a = $(this);
        if ($(this).attr('data') != 'ok') {
            $.get('<?php echo Url::to(['order/getexpress']) ?>', {'expressno':$(this).attr('data')}, function(res) {
                var str = "";
                if (res.message = 'ok') {
                    for(var i = 0;i<res.data.length;i++) {
                        str += "<p>"+res.data[i].context+" "+res.data[i].time+" </p>";
                    }
                }
                a.find(".expressshow").html(str);
                a.attr('data', 'ok');
            }, 'json');
        }
        $(this).find(".expressshow").show();
    }, function(){
        $(this).find(".expressshow").hide();
    });


</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>