<?php $this->beginContent('/layouts/main'); ?>
<div class="row">
    <div class="span9">
        <div id="content">
            <?php 		
			$this->widget('bootstrap.widgets.TbAlert', array(
                    'block'=>true, // display a larger alert block?
                    'fade'=>true, // use transitions?
                    'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
                    'alerts'=>array( // configurations per alert type
                        'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
                    ),
                )); ?>
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span3">
        <div id="sidebar">
            <?php //if(!Yii::app()->user->isGuest) $this->widget('UUserMenu'); ?>
            <?php if(!Yii::app()->user->isGuest) $this->widget('OperationsMenu'); ?>

            <?php $this->widget('Calendar' ); ?>

            <?php $this->widget('MonthlyArchives', array(
                'maxItems'=>Yii::app()->params['monthlyArchivesCount'],
            )); ?>

            <?php $this->widget('TagCloud', array(
                'maxTags'=>Yii::app()->params['tagCloudCount'],
            )); ?>

            <?php $this->widget('RecentPosts', array(
                'maxPosts'=>Yii::app()->params['recentPostCount'],
            )); ?>
            <?php $this->widget('RecentComments', array(
                'maxComments'=>Yii::app()->params['recentCommentCount'],
            )); ?>
            <?php $this->widget('SiteSearch'); ?>
        </div><!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>
