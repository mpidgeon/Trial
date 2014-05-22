<!doctype html>
<html>
<head>
    <?php Yii::app()->controller->widget('ext.seo.widgets.SeoHead', array(
        'defaultDescription'=>Yii::app()->params['appDescription'],
        'httpEquivs'=>array('Content-Type'=>'text/html; charset=utf-8', 'Content-Language'=>'en-US'),
        'title'=>array('class'=>'ext.seo.widgets.SeoTitle', 'separator'=>' :: '),
    )); ?>
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico">
	<?php Yii::app()->bootstrap->register(); ?>
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/styles.css'); ?>
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/blog.css'); ?>
</head>

<body id="top">

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    //'type'=>'inverse',
    'brandLabel'=>TbHtml::encode(Yii::app()->name),
    'collapse'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbNav',
            'items'=>array(
                //array('label'=>Yii::t('site','Home'), 'url'=>Yii::app()->createUrl('/post/index'),
                //        'active'=>Yii::app()->controller->id === 'post' && Yii::app()->controller->action->id === 'index'),
				array('label'=>Yii::t('site','Home'), 'url'=>array('/site/index')),
                array('label'=>Yii::t('site','SVN Info'), 'url'=>array('site/page','view'=>'SVN Info')),
                array('label'=>Yii::t('site','Contact'), 'url'=>array('site/contact')),
            ),
            'htmlOptions'=>array('class'=>'pull-left'),
        ),
        array(
            'class'=>'bootstrap.widgets.TbNav',
            'items'=>array(
				array('label'=>Yii::app()->getModule('user')->t("Admin"), 'url'=>Yii::app()->getModule('user')->adminUrl, 'visible'=>Yii::app()->user->isAdmin),
				array('label'=>Yii::app()->getModule('user')->t("Login"), 'url'=>Yii::app()->getModule('user')->loginUrl,  'visible'=>Yii::app()->user->isGuest),
                array('label'=>Yii::app()->getModule('user')->t("Register"), 'url'=>Yii::app()->getModule('user')->registrationUrl, 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::app()->getModule('user')->t("Profile"), 'url'=>Yii::app()->getModule('user')->profileUrl, 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'url'=>Yii::app()->getModule('user')->logoutUrl, 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('site','Language'),'url'=>'#','items'=>array(
                    array('label'=>Yii::app()->locale->getLanguage('en'),'url'=>array('/site/selectLanguage','lc'=>'en')),
                    array('label'=>Yii::app()->locale->getLanguage('de'),'url'=>array('/site/selectLanguage','lc'=>'de')),
                )),
            ),
            'htmlOptions'=>array('class'=>'pull-right'),
        ),
    ),
)); ?>

<div class="container">

    <?php if (!empty($this->breadcrumbs)):?>
        <?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
            'links'=>$this->breadcrumbs,
        )); ?>
    <?php endif?>

    <?php echo $content; ?>

    <hr />

    <footer>

        <p class="powered">
            Powered by <?php echo TbHtml::link('Yii PHP framework', 'http://www.yiiframework.com', array('target'=>'_blank')); ?> /
            <?php echo TbHtml::link('jQuery', 'http://www.jquery.com', array('target'=>'_blank')); ?> /
            <?php echo TbHtml::link('Yiistrap', 'http://www.getyiistrap.com', array('target'=>'_blank')); ?> /
			<?php echo TbHtml::link('YiiWheels', 'http://yiiwheels.2amigos.us/', array('target'=>'_blank')); ?> /
            <?php echo TbHtml::link('Yii-SEO', 'http://www.yiiframework.com/extension/seo', array('target'=>'_blank')); ?> 
        </p>

        <p class="copy">
            <?php echo Yii::app()->params['copyrightInfo']; ?>
        </p>

    </footer>

</div>
</body>
</html>