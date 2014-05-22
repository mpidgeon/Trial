<?php
/* @var $this TaxJurisdictionController */
/* @var $model TaxJurisdiction */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'userid',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'country',array('span'=>5,'maxlength'=>16)); ?>

                    <?php echo $form->textFieldControlGroup($model,'startdate',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'enddate',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->